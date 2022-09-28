@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:pt-10" id="top">
    <div class="w-full sm:px-6 pb-20">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex items-center justify-between my-6">
            <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
                @csrf
                <input type="file" name="student_file" accept=".xlsx, .xls, .csv" required><br>
                <button type="submit" class="bg-green-500 text-white py-3 px-5 font-bold hover:bg-opacity-75 cursor-pointer">
                    アップロード
                </button>   
            </form>
        </div>
        
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm fomt-bold text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="overflow-x-auto my-10">
            <table class="table w-full text-left">
                <thead>
                    <tr>
                        <td class="p-4 py-5 bg-gray-200"></td>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">名前</th>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">学校名</th>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">学年</th>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">組</th>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">番号</th>
                        <th class="text-sm sm:text-base p-4 py-5 bg-gray-200">メールアドレス</th>
                    </tr>
                </thead>
    
                <tbody>
                    @php
                        $i = 0;
                    @endphp

                    @forelse ($students as $student) 
                        <tr class="bg-white">
                            <td class="p-4 border-b border-gray-100 md:pl-8">
                                {{ ++$i }}
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
                    @empty
                        <div class="font-bold mb-6 text-red-600">データがありません</div>
                    @endforelse
                </tbody>
    
            </table>
        </div>

    </div>
</main>
@endsection

