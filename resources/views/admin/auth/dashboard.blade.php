@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    @include('app.nav')
    <div class="container-fluid py-3">
        @include('app.alert')
    </div>
@endsection
