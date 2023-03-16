<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\BackendController;
use App\Http\Requests\AdminUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class UserController extends BackendController
{
    public function __construct()
    {
        $this->data['title'] = 'Manage Users';

        $this->middleware(['permission:user'])->only('index');
        $this->middleware(['permission:user.create'])->only('create', 'store');
        $this->middleware(['permission:user.edit'])->only('edit', 'update');
        $this->middleware(['permission:user.delete'])->only('destroy');
        $this->middleware(['permission:user.show'])->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Manage Users';
        $this->data['users']    = User::latest()->get();

        return view('office.user.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['roles'] = Role::whereNotIn('id', [2])->get();

        return view('office.user.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        $user             = new User;

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username ?? $this->username($request->email);
        $user->password   = Hash::make(request('password'));
        $user->phone      = $request->phone;
        $user->address    = $request->address;
        $user->status     = $request->status;

        $user->save();

        if (request()->file('image')) {
            $user->addMedia(request()->file('image'))->toMediaCollection('user');
        }

        $role = Role::find($request->role_id);
        $user->assignRole($role->name);

        return redirect(route('office.user.index'))->withSuccess('The Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('office.user.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->data['roles'] = Role::whereNotIn('id', [2])->get();
        $this->data['user'] = $user;
        return view('office.user.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->username   = $request->username ?? $this->username($request->email);

        if ($request->password) {
            $user->password = Hash::make(request('password'));
        }

        $user->phone   = $request->phone;
        $user->address = $request->address;

        if ($user->id == 1) {
            $user->status = $request->status;
            $role = Role::find(1);
            $user->assignRole($role->name);
        } else {
            $user->status = $request->status;
            $role = Role::find($request->role_id);
            $user->assignRole($role->name);
        }
        $user->save();

        if (request()->file('image')) {
            $user->media()->delete();
            $user->addMedia(request()->file('image'))->toMediaCollection('user');
        }


        return redirect(route('office.user.index'))->withSuccess('The Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (($user->id != 1) && (auth()->id() == 1)) {
            $user->delete();
            return redirect(route('office.user.index'))->withSuccess('The Data Deleted Successfully');
        }
    }

    private function username($email)
    {
        $emails = explode('@', $email);
        return $emails[0] . mt_rand();
    }
}
