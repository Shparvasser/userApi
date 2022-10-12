@extends('layouts.main')

@section('nav-bar')
    @include('layouts.nav-bar')
@endsection

@section('content')
    <router-view></router-view>
@endsection
