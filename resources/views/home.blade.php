@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:pt-10" id="top">
    <div class="w-full sm:px-6 pb-20">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="mt-2 mb-10 font-bold text-2xl">
            合計生徒数
            {{ $totalStudents->count() }}
            人
        </div>
        
        <!--<div class="flex items-center justify-between my-6">-->
        <!--    <form action="" class="flex items-center gap-4">-->
        <!--        @csrf-->
        <!--        <input type="file" name="student_file" accept=".xlsx, .xls, .csv" required><br>-->
        <!--        <input type="submit" value="アップロード" class="bg-green-500 text-white py-3 px-5 font-bold hover:bg-opacity-75 cursor-pointer">   -->
        <!--    </form>-->
            
        <!--    <a href="/export" class="inline-block bg-red-700 text-white py-3 px-5 font-bold hover:bg-opacity-75" onclick="return confirm('xlsxファイルをダウンロードしますか？')">-->
        <!--        Export-->
        <!--    </a>-->
        <!--</div>-->

        <livewire:student-table />

    </div>
</main>
@endsection

<script>
    window.addEventListener('scroll-top', event => {
        document.getElementById('top').scrollIntoView(true);
    })
</script>
