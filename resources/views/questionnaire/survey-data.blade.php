@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto pt-8">
    <div class="w-full sm:px-6 pb-20">

        @include('layouts.alert')

        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('questionnaire.create') }}" class="flex items-center justify-center w-9 h-9 bg-gray-200 rounded-full inline-block text-xl hover:opacity-80 transition-all">
                <i class="fas fa-angle-double-left"></i> 
            </a> 
            <div class="font-bold text-2xl">
                {{ $questionnaire->table_name }}
            </div>
        </div>

        <livewire:survey-data :questionnaire="$questionnaire" />

    </div>
</main>
@endsection


