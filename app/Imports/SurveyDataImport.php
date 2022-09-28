<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Survey;


class SurveyDataImport implements ToCollection, WithHeadingRow//, WithValidation
{
    // public function rules(): array
    // {
    //     return [
    //         'name' => 'required|string',
    //         'company' => 'required|string',
    //         'about_company' => 'required|string',
    //         'about_lifestyle' => 'required|string',
    //         'about_coaching' => 'required|string',
    //         'noticed' => 'required|string',
    //     ];
    // }
    
    // public function customValidationMessages()
    // { 
    //     return [
    //         'name.required' => '名前が記入されていません',
    //         'company.required' => '会社名が記入されていません',
    //         'about_company.required' => '会社についてが記入されていません',
    //         'about_lifestyle.required' => '自分についてが記入されていません',
    //         'about_coaching.required' => 'コーチングについてが記入されていません',
    //         'noticed.required' => '学んだこと、気づいたことが記入されていません',
    //     ];
    // }
    
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'name' => $row['名前'],
                'company' => $row['会社名'],
                'about_company' => $row['会社について生徒に伝えることができたと思いますか？'],
                'about_lifestyle' => $row['自分の生き方について生徒に伝えることはできたと思いますか？'],
                'about_coaching' => $row['コーチングやファシリテーションを活用できたと思いますか？'],
                'noticed' => $row['今回の進路相談を通して、学んだこと気づいたことを教えてください。'],
                'feedback' => $row['生徒からの困った質問や意見などありましたら教えてください。'],
                'etc' => $row['その他'],
            ];
            
            Survey::create($data);
        }
    }
}