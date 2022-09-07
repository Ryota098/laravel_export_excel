<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsDataExport;
use App\Imports\StudentsImport;
use App\Models\Student;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $totalStudents = Student::all();
        
        return view('home', compact('totalStudents'));
    }
    
    
    public function upload()
    {
        $students = Student::all();
        
        return view('upload-data', compact('students'));
    }
    
    
    public function uploadExcelFile(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('student_file'));
        
        return redirect()->back();
    }
    
    
    // public function export()
    // {
    //     $grade = 'CAST(grade AS DECIMAL) ASC';
    //     $class = 'CAST(class AS DECIMAL) ASC';
    //     $num = 'CAST(student_num AS DECIMAL) ASC';
    //     $students = Student::orderByRaw($grade)
    //         ->orderByRaw($class)
    //         ->orderByRaw($num)
    //         ->get();
        
    //     return Excel::download(new StudentsDataExport($students), 'studentsData.xlsx');
    // }
}
