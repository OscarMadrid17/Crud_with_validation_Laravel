@extends('layouts.home')

@section('title','Home')

@if(Session::has('message'))

    {{Session::get('message')}}

@endif

@section('content')
    <h1>Bienvenido a la pagina principal</h1>

    <a href="{{route('client.create')}}">Registrar un nuevo usuario</a>

    <table class="table table-light">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>

                    <td>
                        <form action="{{route('client.destroy', $client->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit"    onclick="return confirm('Confirmar')" value="delete">
                        </form>
                    </td>
                    <td>
                        <a href="{{route('client.edit', $client->id)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
