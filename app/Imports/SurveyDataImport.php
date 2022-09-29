<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Survey;


class SurveyDataImport implements ToCollection, WithStartRow //, WithValidation
{   
    public static $startRow = 2; // csvの1行目にヘッダがあるので2行目から取り込む

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'questionnaire_id' => $row[0],
                'name' => $row[1],
                'company' => $row[2],
                'about_company' => $row[3],
                'about_lifestyle' => $row[4],
                'about_coaching' => $row[5],
                'noticed' => $row[6],
                'feedback' => $row[7],
                'etc' => $row[8],
            ];
            Survey::create($data);
        }
        // foreach ($rows as $row) {

        //     $data = [
        //         // 'questionnaire_id' => $this->questionnaire->id,
        //         'name' => $row['名前'],
        //         'company' => $row['会社名'],
        //         'about_company' => $row['会社について生徒に伝えることができたと思いますか？'],
        //         'about_lifestyle' => $row['自分の生き方について生徒に伝えることはできたと思いますか？'],
        //         'about_coaching' => $row['コーチングやファシリテーションを活用できたと思いますか？'],
        //         'noticed' => $row['今回の進路相談を通して、学んだこと気づいたことを教えてください。'],
        //         'feedback' => $row['生徒からの困った質問や意見などありましたら教えてください。'],
        //         'etc' => $row['その他'],
        //     ];
        //     Survey::create($data);
        // }
    }

    public function startRow(): int
    {
        return self::$startRow;
    }
}
