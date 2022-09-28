<div class="w-full">
    <div class="flex flex-wrap items-center justify-between gap-y-6">
        <div class="flex items-end gap-x-4">
            <div class="w-40"> 
                <label for="grade" class="block text-sm font-bold mb-2">
                    表示人数
                </label>
                <div class="w-full flex items-center">
                    <select wire:model="paginate" class="form-select w-full outline-none text-sm sm:text-base border rounded-md">
                        <option value="50">50件</option>
                        <option value="100">100件</option>
                        <option value="150">150件</option>
                        <option value="200">200件</option>
                    </select>
                </div>
            </div>
    
            <div class="w-80"> 
                <label for="search" class="block text-sm font-bold mb-2">
                    会社名
                </label>
                <div class="w-full flex items-center">
                    <input type="search" name="search" id="search" wire:model.debounce.500ms="search" 
                        class="form-input w-full outline-none text-sm sm:text-base border rounded-md"
                    />
                </div>
            </div>
        </div>

        @if ($checked)
            <div>   
                <button type="button" onclick="confirm('選択中のデータをエクスポートしますか？') || event.stopImmediatePropagation()"
                        wire:click="exportSelected()" class="inline-block outline-none bg-green-500 text-white py-3 px-5 font-bold hover:bg-opacity-75">
                    エクスポート 
                </button> 
            </div>
        @endif
    </div>
    
    @if ($checked)
        @php
            $totalData = DB::table('surveys')->get();
        @endphp
        <div class="font-bold mt-10">   
            データ数 {{ $totalData->count() }}中 <span class="text-blue-700">{{ count($checked) }}</span>件を選択しています
        </div>
    @endif
        
    <div class="overflow-x-auto my-10">
        <table class="table-fixed w-full text-left">
            <thead>
                <tr>
                    <td class="p-4 md:pl-8 border-r w-20 py-5 bg-gray-200"><input type="checkbox" wire:model="selectPage"></td>

                    <th class="text-sm border-r p-4 py-5 bg-gray-200">
                        名前
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200">
                        会社名
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200 w-auto lg:w-34 leading-4">
                        会社について生徒に伝えることができたと思いますか？
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200 w-auto lg:w-34 leading-4">
                        自分の生き方について生徒に伝えることはできたと思いますか？
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200 w-auto lg:w-34 leading-4">
                        コーチングやファシリテーションを活用できたと思いますか？
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200 w-auto lg:w-48 leading-4">
                        今回の進路相談を通して、学んだこと気づいたことを教えてください。
                    </th>
                    <th class="text-sm border-r p-4 py-5 bg-gray-200 w-auto lg:w-44 leading-4">
                        生徒からの困った質問や意見などありましたら教えてください。
                    </th>
                    <th class="text-sm p-4 py-5 bg-gray-200 w-auto lg:w-48 leading-4">
                        その他
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($surveys as $survey) 
                    <tr class="bg-white @if ($this->isChecked($survey->id)) bg-blue-100 @endif">

                        <td class="p-4 border-b border-r w-20 border-gray-100 md:pl-8">
                            <input type="checkbox" value="{{ $survey->id }}" wire:model="checked">
                        </td>

                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->name }}
                        </td>
                        
                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->company }}
                        </td>

                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_company }}
                        </td>

                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_lifestyle }}
                        </td>

                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->about_coaching }}
                        </td>
                        
                        <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->noticed }}
                        </td>
                        
                         <td class="text-sm p-4 border-b border-r border-gray-100 leading-5">
                            {{ $survey->feedback }}
                        </td>
                        
                         <td class="text-sm p-4 border-b border-gray-100 leading-5">
                            {{ $survey->etc }}
                        </td>

                    </tr>
                @endforeach 
            </tbody>

        </table>
    </div>
    
    <div class="mt-16"> 
        {{ $surveys->links() }}
    </div>
</div>
