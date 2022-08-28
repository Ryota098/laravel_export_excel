<div class="w-full">
    <div class="flex flex-wrap items-center justify-between gap-y-6">
        <div class="flex items-end gap-x-4">
            <div class="w-40"> 
                <label for="grade" class="block text-sm font-bold mb-2">
                    表示人数
                </label>
                <div class="w-full flex items-center">
                    <select wire:model="paginate" class="form-select w-full outline-none text-sm sm:text-base border rounded-md">
                        <option value="100">全て</option>
                        <option value="10">10人</option>
                        <option value="30">30人</option>
                        <option value="60">60人</option>
                    </select>
                </div>
            </div>
    
            <div class="w-40"> 
                <label for="grade" class="block text-sm font-bold mb-2">
                    学年
                </label>
                <div class="w-full flex items-center">
                    <select name="grade" id="grade" wire:model="grade" class="form-select w-full outline-none text-sm sm:text-base border rounded-md">
                        <option value="" selected>全て</option>
                        <option value="1 年">1 年</ option>
                        <option value="2 年">2 年</ option>
                        <option value="3 年">3 年</ option>
                    </select>
                </div>
            </div>
    
            <div class="w-40">
                <label for="class" class="block text-sm font-bold mb-2">
                    組
                </label>
                <select name="class" id="class" wire:model="class" class="form-select w-full outline-none text-sm sm:text-base border rounded-md">
                    <option value="" selected>全て</option>
                    <option value="1 組">1 組</option>
                    <option value="2 組">2 組</option>
                    <option value="3 組">3 組</option>
                    <option value="4 組">4 組</option>
                    <option value="5 組">5 組</option>
                    <option value="6 組">6 組</option>
                    <option value="7 組">7 組</option>
                    <option value="8 組">8 組</option>
                    <option value="9 組">9 組</option>
                    <option value="10 組">10 組</option>
                </select>
            </div>
        </div>

        @if ($checked)
            <div>   
                <button type="button" onclick="confirm('選択中のデータをエクスポートしますか？') || event.stopImmediatePropagation()"
                        wire:click="exportSelected()" class="inline-block outline-none bg-red-700 text-white py-3 px-5 font-bold hover:bg-opacity-75">
                    エクスポート 
                </button> 
            </div>
        @endif
    </div>
    
    @if ($checked)
        @php
            $totalStudents = DB::table('students')->get();
        @endphp
        <div class="font-bold mt-10">   
            生徒数 {{ $totalStudents->count() }}人中 {{ count($checked) }}人を選択しています
        </div>
    @endif
        
    <div class="overflow-x-auto my-10">
        <table class="table w-full text-left">
            <thead>
                <tr>
                    <td class="p-4 md:pl-8 py-5 bg-gray-200"><input type="checkbox" wire:model="selectPage"></td>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">名前</th>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">学校名</th>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">学年</th>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">組</th>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">番号</th>
                    <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">メールアドレス</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student) 
                    <tr class="bg-white @if ($this->isChecked($student->id)) bg-blue-100 @endif">

                        <td class="p-4 border-b border-gray-100 md:pl-8">
                            <input type="checkbox" value="{{ $student->id }}" wire:model="checked">
                        </td>

                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                           {{ $student->name }}
                        </td>
                        
                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                            {{ $student->school }}
                        </td>

                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                            {{ $student->grade }}
                        </td>

                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                            {{ $student->class }}
                        </td>

                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                            {{ $student->student_num }}
                        </td>
                        
                        <td class="text-sm sm:text-base p-4 border-b border-gray-100 text-[15px]">
                            {{ $student->email }}
                        </td>

                    </tr>
                @endforeach 
            </tbody>

        </table>
    </div>
    
    <div class="mt-16"> 
        {{ $students->links() }}
    </div>
</div>
