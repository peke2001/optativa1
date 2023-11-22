@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content_header')
    <h1> EDITAR PRODUCTO  {{$productos->nombre}} </h1>

@stop

@section('content')
@if (session('mensaje'))
<div class ="alert alert-success">
    <strong> {{session('mensaje')}}</strong>
</div> @endif
<form action="" method="post">
@csrf
@method('put')
<div class="card">
    <div class="card-body">

        {!! Form::model(['route' => ['productos.update',$productos->id ], $productos, 'method' => 'put']) !!}
        <div class="form-group">
          {!! Form::label('nombre', 'Nombre') !!}
          {!! Form::text('nombre',null, ['class'=> 'form-control','placeholder'=> 'Nombre del producto']) !!}
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
    </div>
    <div class="form-group">
        {!! Form::label('precio', 'Precio') !!}
        {!! Form::number('precio',null, ['class'=> 'form-control','placeholder'=> 'Precio del producto']) !!}
        @error('precio')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
  <div class="form-group">
    {!! Form::label('categoria', 'Categoria') !!}
    {!! Form::text('categoria',null, ['class'=> 'form-control','placeholder'=> 'Categoria del producto']) !!}
    @error('categoria')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

</form>

{!! Form::submit('Actualizar Producto',['class'=> 'btn btn-primary']) !!}
     {!! Form::close() !!}

    </div>
</div>

@stop


