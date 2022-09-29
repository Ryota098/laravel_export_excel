<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SurveyDataImport;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Questionnaire;
use App\Models\Survey;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function create()
    {
        $questionnaires = Questionnaire::all();
        
        return view('questionnaire.create', compact('questionnaires'));
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'table_name' => 'required|unique:questionnaires,table_name'
        ]);
        
        Questionnaire::create([
            'uuid'=>(string) Str::uuid(),
            'table_name' => $request->table_name
        ]);
        
        return redirect()->back()->with('status', 'テーブルを作成しました！');
    }
    
    
    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaire.survey-data', compact('questionnaire'));
    }


    public function importSurveyFile(Request $request)
    {
        if($request->file('survey_file')->getClientMimeType() ==='text/csv') {
            $file = $request->file('survey_file');

            // ファイル読み込み
            $input = file_get_contents($file);
    
            // 一時ファイルに書き込む
            $tmp = tmpfile();
            fwrite($tmp, $input);

            // 一時ファイルから読み込み
            $meta = stream_get_meta_data($tmp);
            $csv = new \SplFileObject($meta['uri']);
    
            // CSVとしてファイルを読み込ませる
            $csv->setFlags(
                \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
            );
    
            // 書き出し用のCSVファイル
            $output = new \SplFileObject($file, 'w');
    
            foreach ($csv as $row) {
                $row[0] = $request->questionnaire_id;

                // 書き出し
                $output->fputcsv($row);
            }
            // ファイルを閉じる
            $csv    = null;
            $output = null;

            Excel::import(new SurveyDataImport, $file);
            return redirect()->back()->with('status', 'ファイルをインポートしました');
        } else {
            return redirect()->back()->with('error', 'ファイルの拡張子を確認してください');
        }
    }
    
    
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        
        return redirect()->back()->with('status', '削除しました');
    }
}
