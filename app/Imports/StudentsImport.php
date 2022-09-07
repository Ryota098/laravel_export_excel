<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Student;


class StudentsImport implements ToCollection, WithHeadingRow, WithValidation
{ 
    // public static $startRow = 2; // csvの1行目にヘッダがあるので2行目から取り込む
    
    
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'school' => 'required|string',
            'grade' => 'required|string',
            'class' => 'required|string',
            'student_num' => 'required|string',
            'email' => 'required|unique:students',
        ];
    }
    
    public function customValidationMessages()
    { 
        return [
            'name.required' => '名前が記入されていません',
            'school.required' => '学校名が記入されていません',
            'grade.required' => '学年が記入されていません',
            'class.required' => '組が記入されていません',
            'student_num.required' => '番号が記入されていません',
            'email.required' => 'メールアドレスが記入されていません',
            'email.unique' => 'メールアドレスの値は既に存在していますん',
        ];
    }
    
    public function collection(Collection $rows)
    {
        // dd($rows->toArray());
        // \Validator::make($rows->toArray(), [
        //     'name' => "required|string",
        //     'school' => "required|string",
        //     'grade' => "required|string",
        //     'class' => "required|string",
        //     'student_num' => "required|string",
        //     'email' => "unique:students", 
        // ])->validate();
        
        foreach ($rows as $row) {
            $data = [
                'name' => $row['name'],
                'school' => $row['school'],
                'grade' => $row['grade'],
                'class' => $row['class'],
                'student_num' => $row['student_num'],
                'email' => $row['email'],
            ];
            
            Student::create($data);
        }
    }
    
    // public function startRow(): int
    // {
    //     return self::$startRow;
    // }
}
