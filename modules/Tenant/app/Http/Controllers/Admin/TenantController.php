<?php

namespace Modules\Tenant\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tenant\app\Models\Tenant;

class TenantController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title']    = __('Tenants Management');

        return view('tenant::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title']    = __('Create Tenant');

        return view('tenant::admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Tenant $tenant
     * @return Renderable
     */
    public function show(Tenant $tenant)
    {
        return view('tenant::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Tenant $tenant
     * @return Renderable
     */
    public function edit(Tenant $tenant)
    {
        return view('tenant::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Tenant $tenant
     * @return Renderable
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Tenant $tenant
     * @return Renderable
     */
    public function destroy(Tenant $tenant)
    {

        // Room: change status to pending if tenant is the only tenant.
        if ($tenant->room and !$tenant->room->tenants->except([$tenant->id])->count()) {
            $tenant->room->update(['status_code' => 1]);
        }

        // Apartment: change status to pending if tenant is the only tenant.
        if (!$tenant->apartment->tenants->except([$tenant->id])->count()) {
            $tenant->apartment->update(['status_code' => 1]);
        }

        $tenant->delete();

        session()->flash('status', 'Tenant deleted successfully.');
        return back();
    }
}
