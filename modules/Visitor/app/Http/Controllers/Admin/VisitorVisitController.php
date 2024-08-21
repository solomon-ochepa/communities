<?php

namespace Modules\Visitor\app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Visitor\app\Models\Visitor;

class VisitorVisitController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:visitor.visit.index'])->only('index');
        $this->middleware(['permission:visitor.visit.create'])->only('create', 'store');
        $this->middleware(['permission:visitor.visit.edit'])->only('edit', 'update');
        $this->middleware(['permission:visitor.visit.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Visitor $visitor)
    {
        $this->data['head']['title'] = __($visitor->user->name.'\'s Visits');
        $this->data['visitor'] = $visitor;

        return view('visitor::visit.admin.index', $this->data);
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Visitor $visitor)
    {
        return view('visitor::visit.admin.show', $this->data);
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
