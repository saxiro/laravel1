@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

    <h1>Configurações...</h1>


    <x-alert>
        O conteúdo que eu quiser
    </x-alert>
    

    @lang('messages.test');

    <form method="POST">
        @csrf
        Nome: <br />
    <input type="text" name="nome" value="{{$nome}}" /><br />

        Idade:<br />
    <input type="text" name="idade" value="{{$idade}}" /><br />

        Estado:<br />
        <input type="text" name="estado" /><br />

        <input type="submit" value="Enviar" />
    </form>

@endsection