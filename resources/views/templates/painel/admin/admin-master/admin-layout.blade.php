@extends('templates.painel.admin.layout')

@section('aside')
  @include('templates.painel.admin.admin-master.aside')
@endsection

@section('content')
    @yield('content-admin')
@endsection
