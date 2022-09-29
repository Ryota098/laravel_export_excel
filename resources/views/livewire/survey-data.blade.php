<div class="w-full">
    <div class="flex flex-wrap items-center justify-between">
        <div class="flex items-center gap-10">
            <div class="font-bold text-xl">
                データ数
                {{ $surveys->count() }}
                件
            </div>
            <div class="w-80"> 
                <div class="w-full flex items-center">
                    <input type="search" name="search" id="search" wire:model.debounce.500ms="search" 
                        class="form-input rounded-sm w-full outline-none text-sm sm:text-base border"
                        placeholder="会社名を入力"
                    />
                </div>
            </div>
        </div>

        <form action="{{ route('import-survey-file') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">
            <input type="file" name="survey_file" accept=".csv" required><br>
            <button type="submit" class="bg-green-500 text-white py-3 w-36 font-bold hover:bg-opacity-75 cursor-pointer">
                インポート
            </button>   
        </form>
    </div>
    
    @if ($checked)
        @php
            $totalData = DB::table('surveys')
                ->where('questionnaire_id', $this->questionnaire->id)
                ->get();
        @endphp
        <div class="mt-10 flex items-center justify-between">
            <div class="font-bold">   
                データ数 {{ $totalData->count() }}中 <span class="text-red-600">{{ count($checked) }} </span>件を選択しています
            </div>
            @if ($checked)
                <div>   
                    <button type="button" onclick="confirm('選択中のデータをエクスポートしますか？') || event.stopImmediatePropagation()"
                        wire:click="exportSelected()" class="inline-block outline-none bg-blue-500 text-white py-3 w-36 font-bold hover:bg-opacity-75">
                        エクスポート 
                    </button> 
                </div>
            @endif
        </div>
    @endif
        
    <div class="overflow-x-auto my-10 h-screen">
        <table class="table-fixed w-full text-left">
            <thead class="sticky top-0">
                <tr class="">  
                    <td class="px-4 py-3 md:pl-8 border-r border-gray-100 w-20 py-5 bg-gray-200">
                        <input type="checkbox" wire:model="selectPage">
                    </td>

                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200">
                        名前
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200">
                        会社名
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200 w-auto lg:w-34 leading-4">
                        会社について生徒に伝えることができたと思いますか？
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200 w-auto lg:w-34 leading-4">
                        自分の生き方について生徒に伝えることはできたと思いますか？
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200 w-auto lg:w-34 leading-4">
                        コーチングやファシリテーションを活用できたと思いますか？
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200 w-auto lg:w-48 leading-4">
                        今回の進路相談を通して、学んだこと気づいたことを教えてください。
                    </th>
                    <th class="text-sm border-r border-gray-100 px-4 py-3 bg-gray-200 w-auto lg:w-44 leading-4">
                        生徒からの困った質問や意見などありましたら教えてください。
                    </th>
                    <th class="text-sm px-4 py-3 bg-gray-200 w-auto lg:w-48 leading-4">
                        その他
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($surveys as $survey) 
                    <tr class="bg-white @if ($this->isChecked($survey->id)) bg-blue-100 @endif">

                        <td class="px-4 py-2 border-b border-r w-20 border-gray-100 md:pl-8">
                            <input type="checkbox" value="{{ $survey->id }}" wire:model="checked">
                        </td>

                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->name }}
                        </td>
                        
                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->company }}
                        </td>

                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_company }}
                        </td>

                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_lifestyle }}
                        </td>

                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_coaching }}
                        </td>
                        
                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->noticed }}
                        </td>
                        
                        <td class="text-sm px-4 py-2 border-b border-r border-gray-100 leading-5">
                            {{ $survey->feedback }}
                        </td>
                        
                        <td class="text-sm px-4 py-2 border-b border-gray-100 leading-5">
                            {{ $survey->etc }}
                        </td>

                    </tr>
                @endforeach 
            </tbody>

        </table>
    </div>
    
    {{-- <div class="mt-16"> 
        {{ $surveys->links() }}
    </div> --}}
</div>
