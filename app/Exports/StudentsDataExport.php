<?php

namespace App\Exports;

// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Student;


class StudentsDataExport implements FromQuery
{
    use Exportable;
    protected $students;
    
    public function __construct($students)
    {
        $this->students = $students;
    }

    public function query()
    {
        $grade = 'CAST(grade AS DECIMAL) ASC';
        $class = 'CAST(class AS DECIMAL) ASC';
        $num = 'CAST(student_num AS DECIMAL) ASC';
        return Student::query()
            ->orderByRaw($grade)
            ->orderByRaw($class)
            ->orderByRaw($num)
            ->whereKey($this->students);
    }
}


// class StudentsDataExport implements FromView
// {
//     public function __construct($students)
//     {
//         $this->students = $students;
//     }


//     public function view(): View 
//     {
//         return view('studentsDataExport', [
//             'students' => $this->students
//         ]);
//     }
// }
