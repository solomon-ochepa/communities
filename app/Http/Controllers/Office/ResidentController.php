<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = __('resident.residents');

        $this->middleware('auth');
        $this->middleware(['permission:resident'])->only('index');
        $this->middleware(['permission:resident.create'])->only('create', 'store');
        $this->middleware(['permission:resident.edit'])->only('edit', 'update');
        $this->middleware(['permission:resident.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = __('resident.residents');

        return view('office.resident.index', ['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = __('resident.add') . " - " . $apartment->name;

        return view('office.apartment.resident.create', [
            'data' => $this->data,
            'apartment' => $apartment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        //
    }
}
