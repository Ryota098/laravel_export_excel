@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-12">
    <div class="w-full sm:px-6 pb-20">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="flex items-center justify-between my-6">
            <form action="" class="flex items-center gap-4">
                @csrf
                <input type="file" name="student_file" accept=".xlsx, .xls, .csv" required><br>
                <input type="submit" value="Upload" class="bg-green-500 text-white py-3 px-5 font-bold hover:bg-opacity-75 cursor-pointer">   
            </form>
            
            <a href="/export" class="inline-block bg-red-700 text-white py-3 px-5 font-bold hover:bg-opacity-75" onclick="return confirm('xlsxファイルをダウンロードしますか？')">
                Export
            </a>
        </div>

        <div class="w-full">
            <div class="overflow-x-auto text-left">
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
                                <td class="py-4 bg-white border-b border-gray-100 md:px-6"></td>
        
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
        </div>

    </div>
</main>
@endsection
