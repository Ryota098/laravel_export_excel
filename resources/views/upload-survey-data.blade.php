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
                <form action="{{ route('upload-survey-file') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
                    @csrf
                    <input type="file" name="survey_file" accept=".csv" required><br>
                    <button type="submit" class="bg-green-500 text-white py-3 px-5 font-bold hover:bg-opacity-75 cursor-pointer">
                        インポート
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
                <table class="table-fixed w-full text-left">
                    <thead>
                        <tr>
                            <td class="p-4 py-5 border-r bg-gray-200 w-20"></td>
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
                        @php
                            $i = 0;
                        @endphp
    
                        @forelse ($surveys as $survey) 
                            <tr class="bg-white">
                                <td class="p-4 border-b border-r border-gray-100 md:pl-8">
                                    {{ ++$i }}
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
                        @empty
                            <div class="font-bold mb-6 text-red-600">データがありません</div>
                        @endforelse
                    </tbody>
        
                </table>
            </div>
    
        </div>
    </main>
@endsection
