@extends('adminlte::page')

@section('title', 'Especialidades')

@section('content_header')
    <h2 class="text-center"><b>Agregar nueva categoria</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{-- {{route('admin.categorias.store')}} --}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre de la categoría</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                            <span class="text-danger">
                                <span>*{{$message}}</span>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="crear especialidad" class="btn btn-primary">
                    <a href="{{route('admin.categorias.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop
