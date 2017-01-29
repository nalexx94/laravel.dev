@extends('layouts.app')

@section('title')
    Cabinet
@endsection

@section('breadcrumbs')
    @include('layouts.breadcrumbs')
@endsection

@section('content')
    @include('auth.cabinet.cabinet-menu')

    @yield('cabinet-content')

@endsection