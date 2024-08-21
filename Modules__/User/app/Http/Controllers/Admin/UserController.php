<?php

namespace Modules\User\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\app\Models\User;
use stdClass;

class UserController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware(['permission:user.list'])->only('index');
        $this->middleware(['permission:user.show'])->only('show');
        $this->middleware(['permission:user.create'])->only('create', 'store');
        $this->middleware(['permission:user.edit'])->only('edit', 'update');
        $this->middleware(['permission:user.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Users Management';

        return response(view('user::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = 'Create Apartment';

        return response(view('user::admin.create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // livewire
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $this->data['head']['title']    = $user->name;

        return response(view('user::admin.show', $this->data));
    }

    /**
     * Display the specified resource.
     */
    public function get(User $user): JsonResponse
    {
        $json = new stdClass;
        $json->status = "ok";
        $json->message = "success";
        $json->data = $user;

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $this->data['head']['title']    = "Edit: {$user->name}";
        $this->data['user']        = $user;

        return response(view('user::admin.edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //
    }

    /**
     * Trash the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // User Tenancies
        if ($user->tenancies) {
            $user->tenancies->each(fn ($tenancy) => $tenancy->delete());
        }

        // User account
        $user->delete();

        session()->flash('status', 'User trashed successfully.');
        return redirect(route('admin.user.index'));
    }

    /**
     * Restore the specified resource to the storage.
     */
    public function restore($user): RedirectResponse
    {
        // Get user object
        $user = User::withTrashed()->find($user);

        // User Tenancies
        if ($user->tenancies()->withTrashed()->count()) {
            $user->tenancies()->withTrashed()->each(fn ($tenancy) => $tenancy->restore());
        }

        // more relationships

        $user->restore();

        session()->flash('status', 'User has been restored successfully.');
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage permanently.
     */
    public function permanent($user): RedirectResponse
    {
        $user = User::withTrashed()->find($user);

        // User Tenancies
        if ($user->tenancies()->withTrashed()->count()) {
            $user->tenancies()->withTrashed()->each(fn ($tenancy) => $tenancy->forceDelete());
        }

        // // Medias
        // if ($user->media) {
        //     foreach ($user->media->unique() as $media) {
        //         dd($user->mediables);
        //     }
        //     dd('hi');
        // }

        // dd('...wait!');

        // more relationships

        // User account
        $user->forceDelete();

        session()->flash('status', 'User has been deleted permanently from the system.');
        return redirect(route('admin.user.index'));
    }
}
