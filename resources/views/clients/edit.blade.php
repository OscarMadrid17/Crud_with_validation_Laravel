@extends('layouts.home')

@section('title','Editar usuario')

@section('content')
    <h1>Editar informacion de clientes</h1>

    <form action="{{route('client.update', $client->id)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nombre</label>
    <input type="text"  value="{{$client->name}}"  name="name" id="name">
    <br>
    @error('name')
    <br>
        <span>*{{ $message }}</span>
    <br>
    @enderror

    <label for="email">Email</label>
    <input type="text"  value="{{$client->email}}"  name="email"    id="email">
    <br>
    @error('email')
    <br>
        <span>*{{ $message }}</span>
    <br>
    @enderror

    <label for="password">Password</label>
    <input type="password"  value="{{$client->password}}"  name="password" id="password">
    <br>
    @error('password')
    <br>
        <span>*{{ $message }}</span>
    <br>
    @enderror

    <button type="submit">Guardar cambios</button>

    </form>

    <a href="{{route('index')}}">Regresar a Inicio</a>
@endsection
