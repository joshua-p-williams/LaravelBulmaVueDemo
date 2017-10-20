@extends('layouts.app')

@section('content')
    <div v-if="currentPage === 'contact'">
        @include('landing.partials.contact')
    </div>
    <div v-if="currentPage === 'theme'">
        @include('landing.partials.theme')
    </div>
    <div v-if="currentPage === 'confirm'">
        @include('landing.partials.confirm')
    </div>
    <div v-if="currentPage === 'done'">
        @include('landing.partials.done')
    </div>
@endsection
