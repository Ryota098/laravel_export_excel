<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsDataExport;
use App\Models\Student;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $grade = 'CAST(grade AS DECIMAL) ASC';
        $class = 'CAST(class AS DECIMAL) ASC';
        $num = 'CAST(student_num AS DECIMAL) ASC';
        $students = Student::orderByRaw($grade)
            ->orderByRaw($class)
            ->orderByRaw($num)
            ->get(); 
        
        return view('home', compact('students'));
    }
    
    
    public function export()
    {
        $students = Student::all();
        
        return Excel::download(new StudentsDataExport($students), 'studentsData.xlsx');
    }
}
