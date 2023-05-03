<?php

namespace Modules\Vehicle\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vehicle\app\Models\Vehicle;

class VehicleController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:admin.vehicle.index'])->only('index');
        $this->middleware(['permission:admin.vehicle.show'])->only('show');
        $this->middleware(['permission:admin.vehicle.create'])->only('create', 'store');
        $this->middleware(['permission:admin.vehicle.edit'])->only('edit', 'update');
        $this->middleware(['permission:admin.vehicle.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::admin.create', $this->data));
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

        return response(view('vehicle::admin.show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle): Response
    {
        $this->data['head']['title'] = '';

        return response(view('vehicle::admin.edit', $this->data));
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
