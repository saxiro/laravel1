@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('content')
<h1>Adição de Tarefas</h1>

@if($errors->any())

    <x-alert>

        @foreach($errors->all() as $error)
        {{$error}}
        @endforeach

    </x-alert>

@endif

<form action="" method="POST">
    @csrf

    <label for="">Título: </label><br />
    <input type="text" name="titulo">
    <input type="submit" value="Adicionar" />
</form>
@endsection