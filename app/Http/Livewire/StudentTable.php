<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Exports\StudentsDataExport;


class StudentTable extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $grade = "";
    public $class = "";
    public $selectPage = false;
    public $checked = [];
    
    
    public function render()
    {
        $this->dispatchBrowserEvent('scroll-top');
        
        return view('livewire.student-table', [
            'students' => $this->students
        ]);
    }
    
    
    public function getStudentsProperty()
    {
        $grade = 'CAST(grade AS DECIMAL) ASC';
        $class = 'CAST(class AS DECIMAL) ASC';
        $num = 'CAST(student_num AS DECIMAL) ASC';
        return Student::when($this->grade, function($query) {
                $query->where('grade', $this->grade);
            })
            ->when($this->class, function($query) {
                $query->where('class', $this->class);
            })
            ->orderByRaw($grade)
            ->orderByRaw($class)
            ->orderByRaw($num)
            ->paginate($this->paginate);
    }
    
    
    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->students->pluck('id')->toArray();
        } else {
            $this->checked = [];
        }
    }
    
    
    public function exportSelected()
    {
        return (new StudentsDataExport($this->checked))->download('studentsData.xlsx');
    }
    
    
    public function isChecked($student_id)
    {
        return in_array($student_id, $this->checked);
    }
}
