<?php

namespace Modules\Menu\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\app\Models\Menu;

class MenuController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:menu.index'])->only('index');
        $this->middleware(['permission:menu.create'])->only('create', 'store');
        $this->middleware(['permission:menu.edit'])->only('edit', 'update');
        $this->middleware(['permission:menu.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = 'Menus Management';

        return view('menu::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = 'Create Menu';

        return view('menu::admin.create', $this->data);
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
     * @param Menu $menu
     * @return Renderable
     */
    public function show(Menu $menu)
    {
        $this->data['head']['title'] = $menu->name;

        return view('menu::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Menu $menu
     * @return Renderable
     */
    public function edit(Menu $menu)
    {
        $this->data['head']['title'] = 'Edit: ' . $menu->name;

        $this->data['menu'] = $menu;

        return view('menu::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Menu $menu
     * @return Renderable
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Menu $menu
     * @return Renderable
     */
    public function destroy(Menu $menu)
    {
        if ($menu->child->count()) {
            session()->flash('status', 'You cannot delete a parent menu with sub-menus.');
        }

        $menu->delete();

        session()->flash('status', 'Menu deleted successfully.');
        return redirect(route('admin.menu.index'));
    }
}
