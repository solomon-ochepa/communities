<?php

namespace Modules\Checkpoint\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Checkpoint\app\Models\Checkpoint;

class CheckpointController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:checkpoint.index'])->only('index');
        $this->middleware(['permission:checkpoint.show'])->only('show');
        $this->middleware(['permission:checkpoint.create'])->only('create', 'store');
        $this->middleware(['permission:checkpoint.edit'])->only('edit', 'update');
        $this->middleware(['permission:checkpoint.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Checkpoint Management';

        return response(view('checkpoint::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new Checkpoint';

        return response(view('checkpoint::create', $this->data));
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
    public function show(Checkpoint $checkpoint): Response
    {
        $this->data['head']['title'] = '';

        return response(view('checkpoint::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkpoint $checkpoint): Response
    {
        $this->data['head']['title'] = 'Edit: Checkpoint';

        return response(view('checkpoint::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkpoint $checkpoint): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkpoint $checkpoint): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');
        return redirect(route('dashboard'));
    }
}
