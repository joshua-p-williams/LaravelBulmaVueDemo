@extends('layouts.app')

@section('content')
    <h1 class="title">
    Hello World
    </h1>
    <p class="subtitle">
    My first website with <strong>Bulma</strong>!
    </p>

    <div v-if="currentPage === 'contact'">
        @include('landing.partials.contact')
    </div>
    <div v-if="currentPage === 'theme'">
        @include('landing.partials.theme')
    </div>
    <div v-if="currentPage === 'done'">
        @include('landing.partials.done')
    </div>
@endsection
