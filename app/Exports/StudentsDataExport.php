<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class StudentsDataExport implements FromView
{
    public function __construct($students)
    {
        $this->students = $students;
    }


    public function view(): View 
    {
        return view('studentsDataExport', [
            'students' => $this->students
        ]);
    }
}
