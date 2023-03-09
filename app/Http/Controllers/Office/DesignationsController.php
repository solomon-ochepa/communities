<?php

namespace App\Http\Controllers\Office;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\DesignationsRequest;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class DesignationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'Designations';

        $this->middleware(['permission:designation'])->only('index');
        $this->middleware(['permission:designation.create'])->only('create', 'store');
        $this->middleware(['permission:designation.edit'])->only('edit', 'update');
        $this->middleware(['permission:designation.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('office.designation.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office.designation.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DesignationsRequest $request)
    {
        $input = $request->all();
        Designation::create($input);

        return redirect()->route('office.designation.index')->with('success', 'Designations created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $this->data['designation']  = Designation::findOrFail($id);
        return view('office.designation.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, ['name' => 'required|string|max:255|unique:designations,name,' . $id]);
        $input = $request->all();
        $designation = Designation::findOrFail($id);
        $designation->update($input);
        return redirect(route('office.designation.index'))->withSuccess('The Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Designation::findOrFail($id)->delete();
        return redirect(route('office.designation.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function getDesignations(Request $request)
    {

        $designations = Designation::orderBy('id', 'desc')->get();

        $i         = 1;
        $designationArray = [];
        if (!blank($designations)) {
            foreach ($designations as $designation) {
                $designationArray[$i]          = $designation;
                $designationArray[$i]['name']  = Str::limit($designation->name, 100);
                $designationArray[$i]['setID'] = $i;
                $i++;
            }
        }
        return Datatables::of($designationArray)
            ->addColumn('action', function ($designation) {
                $retAction = '';

                if (auth()->user()->can('designation.edit')) {
                    $retAction .= '<a href="' . route('office.designation.edit', $designation) . '" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>';
                }

                if (auth()->user()->can('designation.delete')) {
                    $retAction .= '<form class="float-left pl-2" action="' . route('office.designation.destroy', $designation) . '" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></form>';
                }
                return $retAction;
            })

            ->editColumn('status', function ($designation) {
                return ($designation->status == 5 ? trans('statuses.' . Status::ACTIVE) : trans('statuses.' . Status::INACTIVE));
            })
            ->editColumn('id', function ($designation) {
                return $designation->setID;
            })
            ->make(true);
    }
}
