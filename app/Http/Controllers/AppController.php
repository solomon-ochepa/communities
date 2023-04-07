<?php

namespace App\Http\Controllers;

// use App\Models\Apartment;
// use App\Models\Attendance;
// use App\Models\Employee;
// use App\Models\PreRegister;
// use App\Models\Resident;
// use App\Models\VisitingDetails;
// use Illuminate\Support\Facades\Auth;

use Modules\Apartment\app\Models\Apartment;
use Modules\Tenant\app\Models\Tenant;
use Modules\User\app\Models\User;

class AppController extends Controller
{
    public $data = [];

    public function __construct()
    {
        // $this->middleware(['permission:dashboard'])->only('dashboard');
    }

    public function dashboard()
    {
        $this->data['title'] = 'Dashboard';

        $user = User::find(auth()->user()->id);

        // admin [], employee [], tenant [], visitor [visitors, drivers, ext. workers, ]

        if ($user->hasRole('employee')) {
            // $visitors       = VisitingDetails::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            // $preregister    = PreRegister::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            // $totalEmployees = 0;
        } else {
            // $visitors       = VisitingDetails::orderBy('id', 'desc')->get();
            // $preregister    = PreRegister::orderBy('id', 'desc')->get();
            // $employees      = Employee::orderBy('id', 'desc')->get();
            // $totalEmployees = count($employees);
        }

        // $attendance = Attendance::where(['user_id' => auth()->user()->id, 'date' => date('Y-m-d')])->first();

        // switch dashboards.
        if ($user->hasrole('visitor')) {
            // visitors
            return view('visitor.dashboard', $this->data);
        } else {
            // Tenants
            $this->data['total_apartments']     = Apartment::count();
            $this->data['total_tenants']        = Tenant::count();
            // $this->data['attendance']    = $attendance;
            // $this->data['totalVisitor']    = count($visitors);
            // $this->data['totalEmployees'] = $totalEmployees;
            // $this->data['totalPrerigister']     = count($preregister);
            // $this->data['visitors']  = $visitors;

            return view('dashboard', $this->data);
        }
    }
}
