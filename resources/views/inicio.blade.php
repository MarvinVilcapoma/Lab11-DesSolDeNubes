@extends('plantilla')

@section('content')

    <div class="row">
        <div class="col-md-7">
            <table class="table">
                <tr>
                    
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
                @foreach($contactos as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->correo}}</td>
                        <td>
                            <a href="{{route('editar',$item->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar',$item->id)}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if (session('eliminar'))
                <div class="alert alert-success mt-4">
                    {{session('eliminar')}}
                </div>
            @endif
            {{$contactos->links()}}
        </div>

        <div class="col-md-5">
            <h3 class="text-center mb-4">Agregar Contacto</h3>

             <form action="{{route('store')}}" method="POST">
                @csrf
            
                <div class="form-group">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre del contacto" required>
                </div>
                @error('nombre')
                    <div class="alert alert-danger">El nombre es necesario</div>
                @enderror

                <div class="form-group">
                    <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}" placeholder="Apellido del contacto" required>
                </div>
                @error('apellido')
                <div class="alert alert-danger">El apellido es necesario</div>
                 @enderror

                
                <div class="form-group">
                    <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}" placeholder="contacto@gmail.com" required>
                </div>
                @error('correo')
                <div class="alert alert-danger">El correo es necesario</div>
                 @enderror


                <button type="submit" class="btn btn-success btn-block">Agregar Contacto</button>
            </form>

            @if (session('agregar'))
                <div class="alert alert-success mt-4">
                    {{session('agregar')}}
                </div>
            @endif

        </div>
    </div>


@endsection