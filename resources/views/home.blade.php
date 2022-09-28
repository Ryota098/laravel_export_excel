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
            合計データ数
            {{ $totalSurveyData->count() }}
            件
        </div>
        
        {{-- <livewire:student-table /> --}}
        <livewire:survey-data />

    </div>
</main>
@endsection

<script>
    window.addEventListener('scroll-top', event => {
        document.getElementById('top').scrollIntoView(true);
    })
</script>
