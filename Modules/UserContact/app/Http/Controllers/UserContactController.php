<?php

namespace Modules\UserContact\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\UserContact\app\Models\UserContact;

class UserContactController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:usercontact.list'])->only('index');
        $this->middleware(['permission:usercontact.show'])->only('show');
        $this->middleware(['permission:usercontact.create'])->only('create', 'store');
        $this->middleware(['permission:usercontact.edit'])->only('edit', 'update');
        $this->middleware(['permission:usercontact.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('usercontact::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('usercontact::create', $this->data));
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
    public function show(UserContact $usercontact): Response
    {
        $this->data['head']['title'] = '';

        return response(view('usercontact::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserContact $usercontact): Response
    {
        $this->data['head']['title'] = '';

        return response(view('usercontact::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserContact $usercontact): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserContact $usercontact): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');
        return redirect(route('dashboard'));
    }
}
