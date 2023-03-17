<?php

namespace App\Http\Controllers\Office;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['title'] = 'Apartments';

        $this->middleware('auth');
        $this->middleware(['permission:apartment.list'])->only('index');
        $this->middleware(['permission:apartment.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('office.apartment.index', ['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = 'Create Apartment';

        return view('office.apartment.create', ['data' => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $this->data['head']['title']    = "{$apartment->name}";
        $this->data['apartment']        = $apartment;

        return view('office.apartment.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $this->data['title'] = 'Edit Apartment';

        return view('office.apartment.edit', [
            'data' => $this->data,
            'apartment' => $apartment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        session()->flash('status', 'Record deleted successfully.');
        return redirect(route('office.apartment.index'));
    }
}
