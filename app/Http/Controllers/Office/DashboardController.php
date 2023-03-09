<?php

namespace App\Http\Controllers\Office;

use App\Enums\VisitorStatus;
use App\Http\Controllers\BackendController;
use App\Models\Apartment;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\PreRegister;
use App\Models\Resident;
use App\Models\VisitingDetails;
use App\Models\Visitor;


class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = 'Dashboard';

        $this->middleware(['permission:dashboard'])->only('index');
    }

    public function index()
    {
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
