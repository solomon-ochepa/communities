<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Apartment\app\Models\Apartment;
use Modules\Tenant\app\Models\Tenant;

class ApartmentTenantController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.tenant.index'])->only('index');
        $this->middleware(['permission:apartment.tenant.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.tenant.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.tenant.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {
        $this->data['head']['title']    = __('Tenants') . " - " . $apartment->name;
        $this->data['apartment']        = $apartment;

        return view('apartment::admin.tenant.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        $this->data['head']['title']    = __('Create Tenant') . " - " . $apartment->name;
        $this->data['apartment']        = $apartment;

        return view('apartment::admin.tenant.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment, Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment, Tenant $tenant)
    {
        //
    }
}
