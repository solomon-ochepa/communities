<?php

namespace Modules\GatepassRequest\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\GatepassRequest\app\Models\GatepassRequest;

class GatepassRequestController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:gatepassrequest.index'])->only('index');
        $this->middleware(['permission:gatepassrequest.show'])->only('show');
        $this->middleware(['permission:gatepassrequest.create'])->only('create', 'store');
        $this->middleware(['permission:gatepassrequest.edit'])->only('edit', 'update');
        $this->middleware(['permission:gatepassrequest.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'GatepassRequest Management';

        return response(view('gatepassrequest::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new GatepassRequest';

        return response(view('gatepassrequest::create', $this->data));
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
    public function show(GatepassRequest $gatepassrequest): Response
    {
        $this->data['head']['title'] = '';

        return response(view('gatepassrequest::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GatepassRequest $gatepassrequest): Response
    {
        $this->data['head']['title'] = 'Edit: GatepassRequest';

        return response(view('gatepassrequest::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GatepassRequest $gatepassrequest): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GatepassRequest $gatepassrequest): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');
        return redirect(route('dashboard'));
    }
}
