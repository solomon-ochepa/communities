<?php

namespace Modules\Vehicle\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vehicle\app\Models\Vehicle;

class VehicleModelController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:vehicle.model.list'])->only('index');
        $this->middleware(['permission:vehicle.model.show'])->only('show');
        $this->middleware(['permission:vehicle.model.create'])->only('create', 'store');
        $this->middleware(['permission:vehicle.model.edit'])->only('edit', 'update');
        $this->middleware(['permission:vehicle.model.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::model.admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::model.admin.create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        session()->flash('status', 'Record created successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::model.admin.show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::model.admin.edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
