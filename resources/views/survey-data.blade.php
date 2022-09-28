@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:pt-10">
    <div class="w-full sm:px-6 pb-20">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <livewire:survey-data  />

    </div>
</main>
@endsection


