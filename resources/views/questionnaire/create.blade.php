@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:px-6">
    <div class="max-w-2xl mx-auto mt-12">

        @include('layouts.alert')

        <form action="{{ route('questionnaire.store') }}" method="POST" class="mb-20">
            @csrf
            
            <div class="flex items-center gap-6">
                <h1 class="text-xl font-bold">テーブルを作成</h1>
            </div>
            
            <div class="flex flex-col gap-2 font-bold mt-8 mb-3">
                <label for="table_name" class="text-sm">テーブル名</label>
                <input type="text" name="table_name" placeholder="例）【サポーター向け】進路相談直後アンケート（回答）" value="{{ old('table_name') }}"
                    class="bg-white border border-gray-200 rounded-sm focus:outline-none block w-full p-2.5 @error('table_name') border-red-500 @enderror"
                >
                
                @error('table_name')
                    <p class="text-red-500 text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            
            <div class="text-right">
                <button class="bg-blue-500 focus:outline-none rounded-sm py-2.5 px-8 text-white font-bold hover:bg-opacity-75">
                    作成
                </button>
            </div>
            
        </form>

        @if ($questionnaires->count())
            @foreach ($questionnaires as $key=> $questionnaire)
                <div class="flex items-center justify-between gap-2 mb-5 bg-white border border-gray-200 px-4 py-2 rounded-sm">
                    <div class="font-bold flex flex-col gap-2">
                        <a href="{{ route('questionnaire.show', $questionnaire) }}" class="text-blue-500 hover:underline">
                            {{ $key + 1 }} 、{{ $questionnaire->table_name }}
                        </a>
                    </div>
                    <form action="{{ route('questionnaire.delete', $questionnaire) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button onclick="return confirm('削除しすか？')" class="inline-block py-2 px-3 whitespace-nowrap bg-red-500 text-white font-bold text-sm rounded-sm hover:opacity-80 transition-all">
                            削除
                        </button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
    
</main>
@endsection