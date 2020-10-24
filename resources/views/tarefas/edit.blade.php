@extends('layouts.admin')

@section('title', 'Editar Tarefa')

@section('content')
<h1>Edição de Tarefas</h1>

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
<input type="text" name="titulo" value="{{$data->titulo}}">
    <input type="submit" value="Salvar" />
</form>
@endsection