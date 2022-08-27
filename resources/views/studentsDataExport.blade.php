<div class="w-full text-left">
    <table class="table w-full">
        <thead>
            <tr>
                <td class="py-4 bg-gray-200"></td>
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
                <tr>
                    <td class="py-4 bg-white border-b border-gray-100 px-6"></td>

                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                       {{ $student->name }}
                    </td>
                    
                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                        {{ $student->school }}
                    </td>

                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                        {{ $student->grade }}
                    </td>

                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                        {{ $student->class }}
                    </td>

                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                        {{ $student->student_num }}
                    </td>
                    
                    <td class="text-sm sm:text-base p-4 bg-white border-b border-gray-100 text-[15px]">
                        {{ $student->email }}
                    </td>

                </tr>
            @endforeach 
        </tbody>

    </table>
</div>