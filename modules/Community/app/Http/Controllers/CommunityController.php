<?php

namespace Modules\Community\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Community\app\Models\Community;

class CommunityController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:communities.index'])->only('index');
        $this->middleware(['permission:communities.show'])->only('show');
        $this->middleware(['permission:communities.create'])->only('create', 'store');
        $this->middleware(['permission:communities.edit'])->only('edit', 'update');
        $this->middleware(['permission:communities.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Community Management';

        return response(view('community::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new Community';

        return response(view('community::create', $this->data));
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
    public function show(Community $community): Response
    {
        $this->data['head']['title'] = '';

        return response(view('community::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community): Response
    {
        $this->data['head']['title'] = 'Edit: Community';

        return response(view('community::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
