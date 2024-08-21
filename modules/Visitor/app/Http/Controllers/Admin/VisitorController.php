<?php

namespace Modules\Visitor\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Visitor\app\Models\Visitor;

class VisitorController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:visitor.index'])->only('index');
        $this->middleware(['permission:visitor.create'])->only('create', 'store');
        $this->middleware(['permission:visitor.edit'])->only('edit', 'update');
        $this->middleware(['permission:visitor.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = __('Visitor Management');

        return view('visitor::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('visitor::admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Visitor $visitor)
    {
        return view('visitor::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Visitor $visitor)
    {
        return view('visitor::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
