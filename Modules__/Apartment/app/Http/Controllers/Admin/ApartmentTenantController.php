<?php

namespace Modules\Apartment\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apartment\app\Models\Apartment;
use Modules\Tenant\app\Models\Tenant;

class ApartmentTenantController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.tenant.list'])->only('index');
        $this->middleware(['permission:apartment.tenant.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.tenant.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.tenant.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Apartment $apartment)
    {
        $this->data['head']['title'] = __('Apartment Tenants Management') . ' &middot; ' . $apartment->name;
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.tenant.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Apartment $apartment)
    {
        $this->data['head']['title'] = 'Add Tenant';
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.tenant.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function show(Apartment $apartment, Tenant $tenant)
    {
        $this->data['head']['title'] = "{$tenant->name}";
        $this->data['tenant'] = $tenant;

        return view('apartment::admin.tenant.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function edit(Apartment $apartment, Tenant $tenant)
    {
        $this->data['head']['title'] = __('Edit') . ": {$tenant->name} &middot; {$apartment->name}";
        $this->data['apartment'] = $apartment;
        $this->data['tenant'] = $tenant;

        return view('apartment::admin.tenant.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Apartment $apartment
     * @return Renderable
     */
    public function update(Request $request, Apartment $apartment, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function destroy(Apartment $apartment, Tenant $tenant)
    {
        $tenant->delete();

        session()->flash('status', 'Apartment tenant deleted successfully.');
        return redirect(route('admin.apartment.tenant.index', ['apartment' => $apartment->id]));
    }
}
