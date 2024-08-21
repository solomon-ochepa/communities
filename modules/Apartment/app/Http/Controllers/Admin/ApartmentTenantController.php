<?php

namespace Modules\Apartment\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apartment\app\Models\Apartment;
use Modules\Occupant\App\Models\Occupant;

class ApartmentOccupantController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.occupant.list'])->only('index');
        $this->middleware(['permission:apartment.occupant.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.occupant.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.occupant.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Apartment $apartment)
    {
        $this->data['head']['title'] = __('Apartment Occupants Management').' &middot; '.$apartment->name;
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.occupant.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(Apartment $apartment)
    {
        $this->data['head']['title'] = 'Add Occupant';
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.occupant.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Apartment $apartment, Occupant $occupant)
    {
        $this->data['head']['title'] = "{$occupant->name}";
        $this->data['occupant'] = $occupant;

        return view('apartment::admin.occupant.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Apartment $apartment, Occupant $occupant)
    {
        $this->data['head']['title'] = __('Edit').": {$occupant->name} &middot; {$apartment->name}";
        $this->data['apartment'] = $apartment;
        $this->data['occupant'] = $occupant;

        return view('apartment::admin.occupant.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Apartment $apartment, Occupant $occupant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Apartment $apartment, Occupant $occupant)
    {
        $occupant->delete();

        session()->flash('status', 'Apartment occupant deleted successfully.');

        return redirect(route('admin.apartment.occupant.index', ['apartment' => $apartment->id]));
    }
}
