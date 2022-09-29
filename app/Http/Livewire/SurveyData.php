<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Survey;
use App\Exports\SurveyDataExport;


class SurveyData extends Component
{
    use WithPagination;
    public $questionnaire;
    public $paginate = 50;
    public $search = "";
    public $company = "";
    public $selectPage = false;
    public $checked = [];


    public function mount($questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }


    public function render()
    {
        return view('livewire.survey-data', [
            'surveys' => $this->surveys->where('questionnaire_id', $this->questionnaire->id)
        ]);
    }
    
    
    public function getSurveysProperty()
    {
        return Survey::search($this->search)
            ->where('questionnaire_id', $this->questionnaire->id)
            ->get();
            // ->when($this->company, function($query) {
            //     $query->where('company', 'like', $this->company . '%');
            // })
            // ->paginate($this->paginate);
    }
    
    
    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->surveys->where('questionnaire_id', $this->questionnaire->id)->pluck('id')->toArray();
        } else {
            $this->checked = [];
        }
    }
    
    
    public function exportSelected()
    {
        return (new SurveyDataExport($this->checked))->download('SurveyData.csv');
    }
    
    
    public function isChecked($survey_id)
    {
        return in_array($survey_id, $this->checked);
    }
}
