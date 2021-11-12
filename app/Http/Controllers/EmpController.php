<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class EmpController extends Controller
{
    //
    public function getOrdersReport(){
        $employees= Employees::all();
        return view('employee', compact('employees'));
    }
    public function donwloadPDF(){
        $employees = EmployeeController::all();
        $pdf = PDF::loadView('employee',compact('employees'));
        return $pdf->download('employees.pdf');
    }
}
