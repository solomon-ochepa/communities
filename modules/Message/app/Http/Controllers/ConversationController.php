<?php

namespace Modules\Message\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Message\app\Models\Message;

class ConversationController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:message.list'])->only('index');
        $this->middleware(['permission:message.show'])->only('show');
        $this->middleware(['permission:message.create'])->only('create', 'store');
        $this->middleware(['permission:message.edit'])->only('edit', 'update');
        $this->middleware(['permission:message.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('message::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('message::create', $this->data));
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
    public function show(Message $message): Response
    {
        $this->data['head']['title'] = '';

        return response(view('message::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message): Response
    {
        $this->data['head']['title'] = '';

        return response(view('message::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
