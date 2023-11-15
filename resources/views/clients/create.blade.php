@extends('layouts.home')

@section('title','Crear usuario')

@section('content')
    <h1>Creacion de clientes</h1>


    <form action="{{route('client.store')}}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text"  value="{{old('name')}}" name="name" id="name">
        <br>
        @error('name')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <label for="email">Email</label>
        <input type="text"  value="{{old('email')}}"  name="email"    id="email">
        <br>
        @error('email')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <label for="password">Password</label>
        <input type="password"  value="{{old('password')}}"  name="password" id="password">
        <br>
        @error('password')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

        <button type="submit">Crear</button>

    </form>
@endsection
