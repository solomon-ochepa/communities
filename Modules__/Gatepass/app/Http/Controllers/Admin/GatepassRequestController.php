<?php

namespace Modules\Gatepass\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gatepass\app\Models\Gatepass;
use Modules\Gatepass\app\Models\GatepassRequest;

class GatepassRequestController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:gatepass.request.index'])->only('index');
        $this->middleware(['permission:gatepass.request.show'])->only('show');
        $this->middleware(['permission:gatepass.request.create'])->only('create', 'store');
        $this->middleware(['permission:gatepass.request.edit'])->only('edit', 'update');
        $this->middleware(['permission:gatepass.request.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Gatepass $gatepass): Response
    {
        $this->data['head']['title'] = $gatepass->user->name . "'s " . 'Gatepass Requests';
        $this->data['gatepass'] = $gatepass;

        return response(view('gatepass::request.admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new GatepassRequest';

        return response(view('gatepass::request.admin.create', $this->data));
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
    public function show(Gatepass $gatepass, GatepassRequest $gatepassrequest): Response
    {
        $this->data['head']['title'] = '';

        return response(view('gatepass::request.admin.show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gatepass $gatepass, GatepassRequest $gatepassrequest): Response
    {
        $this->data['head']['title'] = 'Edit: GatepassRequest';

        return response(view('gatepass::request.admin.edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Gatepass $gatepass, Request $request, GatepassRequest $gatepassrequest): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gatepass $gatepass, GatepassRequest $gatepassrequest): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');
        return redirect(route('dashboard'));
    }
}
