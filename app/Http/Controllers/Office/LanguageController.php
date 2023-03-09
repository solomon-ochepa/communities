<?php

namespace App\Http\Controllers\Office;

use App\Enums\Status;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\LanguageRequest;
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\BackendController;

class LanguageController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['title']      = 'Language';
        $this->middleware(['permission:language']);
    }

    public function index()
    {
        return view('office.language.index');
    }


    public function create()
    {
        return view('office.language.create');
    }

    public function store(LanguageRequest $request)
    {

        $flag = null;
        $countries = Countries::all();
        foreach ($countries as  $countrie) {
            if (strtolower($countrie['iso_a2']) == strtolower($request->code)) {
                $flag = $countrie['extra']['emoji'];
            }
        }
        $language            = new Language;
        $language->name      = $request->name;
        $language->code      = strtolower($request->code);
        $language->flag_icon = $flag;
        $language->status    = $request->status;
        $language->save();
        return redirect()->route('office.language.index')->withSuccess('Language created successfully');
    }

    public function edit($id)
    {
        $this->data['language']  = Language::findOrFail($id);
        return view('office.language.edit', $this->data);
    }

    public function update(LanguageRequest $request, Language $language)
    {
        $flag = null;
        $countries = Countries::all();
        foreach ($countries as  $countrie) {
            if (strtolower($countrie['iso_a2']) == strtolower($request->code)) {
                $flag = $countrie['extra']['emoji'];
            }
        }

        $language->name      = $request->name;
        $language->code      = $request->code;
        $language->flag_icon = $flag;
        $language->status    = $request->status;
        $language->save();
        return redirect()->route('office.language.index')->withSuccess('Language Updated successfully');
    }

    public function destroy($id)
    {
        Language::findOrFail($id)->delete();
        return redirect(route('office.language.index'))->withSuccess('The Data Deleted Successfully');
    }

    public function changeStatus($id, $status)
    {
        $language         = Language::findOrFail($id);
        $language->status = $status;
        $language->save();
        return redirect()->route('office.language.index')->withSuccess('The Status Change successfully!');
    }

    public function getLanguage(Request $request)
    {
        $laguages = Language::all();
        $i            = 1;
        $laguageArray = [];
        if (!blank($laguages)) {
            foreach ($laguages as $laguage) {
                $laguageArray[$i]          = $laguage;
                $laguageArray[$i]['setID'] = $i;
                $i++;
            }
        }
        return Datatables::of($laguageArray)
            ->addColumn('action', function ($laguage) {
                $retAction = '';

                if (auth()->user()->can('language.edit')) {
                    $retAction .= '<a href="' . route('office.language.edit', $laguage) . '" class="btn btn-sm btn-icon float-left btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>';
                }

                if (auth()->user()->can('language.delete')) {
                    $retAction .= '<form class="float-left pl-2" action="' . route('office.language.destroy', $laguage) . '" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></form>';
                }
                return $retAction;
            })
            ->editColumn('name', function ($language) {
                return $language->name;
            })
            ->editColumn('flag', function ($language) {

                return $language->flag_icon == null ? '🇬🇧' : $language->flag_icon;
            })
            ->editColumn('code', function ($language) {
                return strtoupper($language->code);
            })

            ->editColumn('status', function ($language) {
                $drop = '';
                $activeStatus = 'Change Status';
                foreach (trans("statuses") as $key => $status) {
                    if ($language->status == $key) {
                        $activeStatus = $status;
                        $drop .= '';
                    } else {
                        $drop .= '<a class="dropdown-item" href="' . route('office.language.change-status', [$language->id, $key]) . '">' . $status . '</a>';
                    }
                }
                return '<div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                    . $activeStatus
                    . '</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' . $drop . '</div></div>';
            })

            ->editColumn('id', function ($language) {
                return $language->setID;
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
