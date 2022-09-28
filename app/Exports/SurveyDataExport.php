<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Survey;


class SurveyDataExport implements FromQuery
{
    use Exportable;
    protected $surveys;
    
    public function __construct($surveys)
    {
        $this->surveys = $surveys;
    }

    public function query()
    {
        return Survey::query()->whereKey($this->surveys);
    }
}