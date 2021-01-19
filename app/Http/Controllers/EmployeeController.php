<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Excel;

class EmployeeController extends Controller
{
    //
    public function addEmployee(){
        $employees = [
            ["name" => "yumi", "email" => "dongyumi@gmail.com", "phone" => "09799429100", "salary" => "20000", "department" => "Accounting"],
            ["name" => "ben", "email" => "ben@gmail.com", "phone" => "09799429100", "salary" => "22000", "department" => "IT"],
            ["name" => "bu", "email" => "bu@gmail.com", "phone" => "0979429100", "salary" => "21000", "department" => "Dev"],
            ["name" => "kieu", "email" => "kieu@gmail.com", "phone" => "09799429100", "salary" => "33000", "department" => "Worker"],
            ["name" => "be", "email" => "be@gmail.com", "phone" => "09799429100", "salary" => "350000", "department" => "Biker"],
        ];

        Employee::insert($employees);

        return "Record are created";
    }

    public function exportIntoExcel(){
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    }
    public function exportIntoCSV(){
        return Excel::download(new EmployeeExport, 'employeelist.csv');
    }

    public function importForm(){
        return view('import-form');
    }

    public function import(Request $request){
        Excel::import(new EmployeeImport, $request->file);
        return "Record are imported successfully";
    }
}
