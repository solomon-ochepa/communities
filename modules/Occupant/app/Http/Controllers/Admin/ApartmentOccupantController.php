<?php

namespace Modules\Occupant\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Apartment\app\Models\Apartment;
use Modules\Occupant\App\Models\Occupant;

class ApartmentOccupantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.occupant.index'])->only('index');
        $this->middleware(['permission:apartment.occupant.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.occupant.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.occupant.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Apartment $apartment)
    {
        $data['head']['title'] = __('Occupants').' - '.$apartment->name;
        $data['apartment'] = $apartment;

        return view('apartment::admin.occupant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Apartment $apartment)
    {
        $data['head']['title'] = __('Create Occupant').' - '.$apartment->name;
        $data['apartment'] = $apartment;

        return view('apartment::admin.occupant.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment, Occupant $occupant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment, Occupant $occupant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment, Occupant $occupant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment, Occupant $occupant)
    {
        //
    }
}
