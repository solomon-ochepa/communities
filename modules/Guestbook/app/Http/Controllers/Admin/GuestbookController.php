<?php

namespace Modules\Guestbook\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Guestbook\app\Models\Guestbook;

class GuestbookController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:admin.guestbook.index'])->only('index');
        $this->middleware(['permission:admin.guestbook.show'])->only('show');
        $this->middleware(['permission:admin.guestbook.create'])->only('create', 'store');
        $this->middleware(['permission:admin.guestbook.edit'])->only('edit', 'update');
        $this->middleware(['permission:admin.guestbook.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Guestbook Management';

        return response(view('guestbook::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Add a new Guestbook';

        return response(view('guestbook::admin.create', $this->data));
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
    public function show(Guestbook $guestbook): Response
    {
        $this->data['head']['title'] = '';

        return response(view('guestbook::admin.show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guestbook $guestbook): Response
    {
        $this->data['head']['title'] = 'Edit: Guestbook';

        return response(view('guestbook::admin.edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guestbook $guestbook): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guestbook $guestbook): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
