<?php

namespace Modules\Apartment\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apartment\app\Models\Apartment;

class ApartmentController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.list'])->only('index');
        $this->middleware(['permission:apartment.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('apartment::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = 'Create Apartment';

        return view('apartment::admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function show(Apartment $apartment)
    {
        $this->data['head']['title']    = "{$apartment->name}";
        $this->data['apartment']        = $apartment;

        return view('apartment::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function edit(Apartment $apartment)
    {
        $this->data['head']['title']    = "Edit: {$apartment->name}";
        $this->data['apartment']        = $apartment;

        return view('apartment::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Apartment $apartment
     * @return Renderable
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        session()->flash('status', 'Apartment deleted successfully.');
        return redirect(route('admin.apartment.index'));
    }
}
