@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.publications.create') }}" class="btn btn-success btn-sm float-right"> Agregar Post</a>
    <h1>Lista de Posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
