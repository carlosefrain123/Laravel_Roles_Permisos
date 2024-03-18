@extends('adminlte::page')

@section('title', 'Especialidades')

@section('content_header')
    <h2 class="text-center"><b>Agregar nueva categoria</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categorias.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>"Ingrese el nombre"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>"Ingrese el slug"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
