<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\PreRegister;
use App\Models\Resident;
use App\Models\Visit;
use App\Models\VisitingDetails;

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

        if (auth()->user()->getrole->name == 'Employee') {
            $visitors       = VisitingDetails::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $preregister    = PreRegister::where(['employee_id' => auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $totalEmployees = 0;
        } else {
            $visitors       = VisitingDetails::orderBy('id', 'desc')->get();
            $preregister    = PreRegister::orderBy('id', 'desc')->get();
            $employees      = Employee::orderBy('id', 'desc')->get();
            $totalEmployees = count($employees);
        }

        $attendance = Attendance::where(['user_id' => auth()->user()->id, 'date' => date('Y-m-d')])->first();

        $this->data['apartment_count']  = Apartment::count();
        $this->data['resident_count']   = Resident::count();
        $this->data['attendance']    = $attendance;
        $this->data['totalVisitor']    = count($visitors);
        $this->data['totalEmployees'] = $totalEmployees;
        $this->data['totalPrerigister']     = count($preregister);
        $this->data['visitors']  = $visitors;

        return view('office.dashboard', $this->data);
    }
}
