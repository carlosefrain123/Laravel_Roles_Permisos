@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Posts</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-danger">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
<div class="card">
    <div class="card-header">
        <a href="{{-- {{ route('admin.tags.create') }} --}}" class="btn btn-success"> Agregar Post</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td width="10px">
                            <a href="{{ route('admin.tags.edit', $post) }}"
                                class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.tags.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
