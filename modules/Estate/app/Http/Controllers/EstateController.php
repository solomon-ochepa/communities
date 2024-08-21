<?php

namespace Modules\Estate\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Estate\app\Models\Estate;

class EstateController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:estate.index'])->only('index');
        $this->middleware(['permission:estate.show'])->only('show');
        $this->middleware(['permission:estate.create'])->only('create', 'store');
        $this->middleware(['permission:estate.edit'])->only('edit', 'update');
        $this->middleware(['permission:estate.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Estate Management';

        return response(view('estate::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new Estate';

        return response(view('estate::create', $this->data));
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
    public function show(Estate $estate): Response
    {
        $this->data['head']['title'] = '';

        return response(view('estate::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estate $estate): Response
    {
        $this->data['head']['title'] = 'Edit: Estate';

        return response(view('estate::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estate $estate): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estate $estate): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
