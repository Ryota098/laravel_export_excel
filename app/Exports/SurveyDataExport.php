<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Survey;


class SurveyDataExport implements FromQuery, WithHeadings
{
    use Exportable;
    protected $surveys;

    public function __construct($surveys)
    {
        $this->surveys = $surveys;
    }

    public function query()
    {
        return Survey::query()->whereKey($this->surveys)->select('name', 'company', 'about_company', 'about_lifestyle', 'about_coaching', 'noticed', 'feedback', 'etc');
    }

    public function headings(): array
    {
        return [
            '名前',
            '会社名',
            '会社について生徒に伝えることができたと思いますか？',
            '自分の生き方について生徒に伝えることはできたと思いますか？',
            'コーチングやファシリテーションを活用できたと思いますか？',
            '今回の進路相談を通して、学んだこと気づいたことを教えてください。',
            '生徒からの困った質問や意見などありましたら教えてください。',
            'その他'
        ];
    }
}
