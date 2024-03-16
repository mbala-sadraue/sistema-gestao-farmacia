@extends('errors::minimal')

@section('title', __('Não é autorizado'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Não é autorizado'))
