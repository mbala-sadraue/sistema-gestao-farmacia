@extends('errors::minimal')

@section('title', __('Erro no servidor '))
@section('code', '500')
@section('message', __('O servidor encontrou uma situação que não sabe como lidar. '))
