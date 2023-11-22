@extends('adminlte::page')

@section('title', 'Listas de Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
@if (session('mensaje'))
<div class ="alert alert-success">
    <strong> {{session('mensaje')}}</strong>
</div> @endif
<div class="card-header">
    <a href="{{route('productos.create')}}" class="btn btn-primary"> ADICIONAR PRODUCTO</a>
</div>
<div class ="card">
    <div class= "card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CATEGORIA</th>
                    <th>PRECIO</th>

                    <th colspan ="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto-> id}}</td>
                    <td>{{$producto-> nombre}}</td>
                    <td>{{$producto-> categoria}}</td>
                    <td>{{$producto-> precio}}</td>
                    <td>{{$producto-> cantidad}}</td>

                    <td width ="15px"><a href ="{{route('productos.edit', $producto->id )}} "class="btn-primary btn-sm">EDIT</td>
                    <td width ="15px">
                   <form action ="{{route('productos.destroy', $producto-> id)}} "method = "post">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="ELIMINAR" class="btn btn-danger btn-sm">
                   </form>
                 </tr>

                @endforeach

            </tbody>
        </table>
</div>
@stop


