@extends('adminlte::page')

@section('title', 'Tag')

@section('content_header')
    <h2 class="text-center"><b>Editar Tag</b></h2>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag,['route' => ['admin.categorias.update',$tag],'method'=>'put']) !!}
                @include('admin.tags.partials.form')
                {!! Form::submit('Editar Etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
