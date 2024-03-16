@extends('errors::minimal')

@section('title', __('Erro no servidor'))
@section('code', '503')
@section('message', __('O servidor não está pronto para lidar com a solicitação'))
