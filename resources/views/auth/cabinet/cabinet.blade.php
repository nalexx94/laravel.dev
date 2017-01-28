@extends('layouts.app')

@section('title')
    ABOUT
@endsection

@section('breadcrumbs')
    @include('layouts.breadcrumbs')
@endsection

@section('content')
    @include('auth.cabinet.cabinet-menu')

    @yield('cabinet-content')

@endsection