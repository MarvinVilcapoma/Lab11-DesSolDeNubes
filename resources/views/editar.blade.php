@extends('plantilla')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="center-block">
            <h3 class="text-center mb-4 pt-3">Editar Contacto {{$contactoActualizar->id}}</h3>
            <form action="{{route('update',$contactoActualizar->id)}}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <input type="text" name="nombre" id="nombre" value="{{$contactoActualizar -> nombre}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="apellido" id="apellido" value="{{$contactoActualizar -> apellido}}" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="correo" id="correo" value="{{$contactoActualizar -> correo}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning btn-block">Editar Contacto</button>
        </form>

            @if(session('update'))
            <div class="alert alert-success mt-4">
            {{session('update')}}
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-7">

        <img src="https://static8.depositphotos.com/1292351/803/v/450/depositphotos_8032984-stock-illustration-cartoon-office-worker-on-the.jpg" width="100%" height="100%" alt="" loading="lazy">

    </div>
    
 
</div>
@endsection