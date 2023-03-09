<?php

namespace App\Http\Controllers\Office;

use Setting;
use App\Enums\Status;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\PreRegister;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PreRegisterRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Services\PreRegister\PreRegisterService;

class PreRegisterController extends Controller
{
    protected $preRegisterService;

    public function __construct(PreRegisterService $preRegisterService)
    {
        $this->preRegisterService = $preRegisterService;

        $this->middleware('auth');
        $this->data['title'] = 'Pre-registers';
        $this->middleware(['permission:pre-register'])->only('index');
        $this->middleware(['permission:pre-register.create'])->only('create', 'store');
        $this->middleware(['permission:pre-register.edit'])->only('edit', 'update');
        $this->middleware(['permission:pre-register.delete'])->only('destroy');
        $this->middleware(['permission:pre-register.show'])->only('show');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('office.pre-register.index');
    }

    public function create(Request $request)
    {
        if (auth()->user()->getrole->name == 'Employee') {
            $this->data['employees'] = Employee::where(['status' => Status::ACTIVE, 'id' => auth()->user()->employee->id])->get();
        } else {
            $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        }

        return view('office.pre-register.create', $this->data);
    }

    public function store(PreRegisterRequest $request)
    {
        $preRegister = $this->preRegisterService->make($request);

        if (setting('whatsapp_message')) {
            return redirect()->route('office.pre-registers.show', $preRegister->id);
        }
        return redirect()->route('office.pre-registers.index')->withSuccess('The data inserted successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $this->data['preregister'] = $this->preRegisterService->find($id);
        if ($this->data['preregister']) {
            return view('office.pre-register.show', $this->data);
        } else {
            return redirect()->route('office.pre-registers.index');
        }
    }

    public function edit($id)
    {
        if (auth()->user()->getrole->name == 'Employee') {
            $this->data['employees'] = Employee::where(['status' => Status::ACTIVE, 'id' => auth()->user()->employee->id])->get();
        } else {
            $this->data['employees'] = Employee::where('status', Status::ACTIVE)->get();
        }
        $this->data['preregister'] = $this->preRegisterService->find($id);
        if ($this->data['preregister']) {
            return view('office.pre-register.edit', $this->data);
        } else {
            return redirect()->route('office.pre-registers.index');
        }
    }

    public function update(PreRegisterRequest $request, PreRegister $preRegister)
    {
        $this->preRegisterService->update($request, $preRegister->id);
        return redirect()->route('office.pre-registers.index')->withSuccess('The data updated successfully!');
    }

    public function destroy($id)
    {
        $this->preRegisterService->delete($id);
        return redirect()->route('office.pre-registers.index')->withSuccess('The data delete successfully!');
    }


    public function getPreRegister(Request $request)
    {
        $pre_registers = $this->preRegisterService->all($request);
        $i            = 1;
        $pre_registerArray = [];
        if (!blank($pre_registers)) {
            foreach ($pre_registers as $pre_register) {
                $pre_registerArray[$i]          = $pre_register;
                $pre_registerArray[$i]['setID'] = $i;
                $i++;
            }
        }
        return Datatables::of($pre_registerArray)
            ->addColumn('action', function ($pre_register) {
                $retAction = '';

                if (auth()->user()->can('pre-register.show')) {
                    $retAction .= '<a href="' . route('office.pre-registers.show', $pre_register) . '" class="btn btn-sm btn-icon mr-2  float-left btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a>';
                }

                if (auth()->user()->can('pre-register.edit')) {
                    $retAction .= '<a href="' . route('office.pre-registers.edit', $pre_register) . '" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="far fa-edit"></i></a>';
                }


                if (auth()->user()->can('pre-register.delete')) {
                    $retAction .= '<form class="float-left pl-2" action="' . route('office.pre-registers.destroy', $pre_register) . '" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger" onclick="return confirmDelete()" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash"></i></button></form>';
                }

                return $retAction;
            })

            ->editColumn('name', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->name, 50);
            })
            ->editColumn('email', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->email, 50);
            })
            ->editColumn('phone', function ($pre_register) {
                return Str::limit(optional($pre_register->visitor)->phone, 50);
            })
            ->editColumn('employee_id', function ($pre_register) {
                return optional($pre_register->employee->user)->name;
            })
            ->editColumn('expected_date', function ($pre_register) {
                if (optional($pre_register->visitor)->is_pre_register == 1) {
                    $date = '<p class="text-danger">' . $pre_register->expected_date . '</p>';
                } else {
                    $date = '<p>' . $pre_register->expected_date . '</p>';
                }
                return $date;
            })
            ->editColumn('expected_time', function ($pre_register) {
                if (optional($pre_register->visitor)->is_pre_register == 1) {
                    $time = '<p class="text-danger">' . date('h:i A', strtotime($pre_register->expected_time)) . '</p>';
                } else {
                    $time = '<p>' . date('h:i A', strtotime($pre_register->expected_time)) . '</p>';
                }
                return $time;
            })
            ->editColumn('id', function ($pre_register) {
                return $pre_register->setID;
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
