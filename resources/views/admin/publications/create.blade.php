@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h2 class="text-center"><b>Agregar Post</b></h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model(null, ['route' => ['admin.publications.store'], 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug', 'readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria') !!}
                {!! Form::select('categoria_id',$categorias, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label for="" class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{$tag->name}}
                    </label>
                @endforeach
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label>
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <lbel>
                    {!! Form::radio('status', 2) !!}
                    Publicado
                </lbel>
            </div>
            <div class="form-group">
                {!! Form::label('extract', 'Extracto:') !!}
                {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del post:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection
