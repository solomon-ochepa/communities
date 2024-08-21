<?php

namespace Modules\AccessLog\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\AccessLog\app\Models\AccessLog;

class AccessLogController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:accesslog.index'])->only('index');
        $this->middleware(['permission:accesslog.show'])->only('show');
        $this->middleware(['permission:accesslog.create'])->only('create', 'store');
        $this->middleware(['permission:accesslog.edit'])->only('edit', 'update');
        $this->middleware(['permission:accesslog.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'AccessLog Management';

        return response(view('accesslog::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new AccessLog';

        return response(view('accesslog::create', $this->data));
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
    public function show(AccessLog $accesslog): Response
    {
        $this->data['head']['title'] = '';

        return response(view('accesslog::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessLog $accesslog): Response
    {
        $this->data['head']['title'] = 'Edit: AccessLog';

        return response(view('accesslog::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessLog $accesslog): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessLog $accesslog): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
