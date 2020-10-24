@extends('layouts.admin')

@section('title', 'Lista de Tarefas')

@section('content')
<a href="{{ route('tarefas.add') }}">Adicionar Nova Tarefa</a>
<hr>
<h1>Lista de Tarefas</h1>
@if(count($list) > 0)
    <ul>
        @foreach($list as $item)
            @if($item->resolvido === 0)
                <li>
                <a href="{{ route('tarefas.done', ['id'=> $item->id]) }}">
                        [
                            @if($item->resolvido === 1)
                                desmarcar
                                @else 
                                marcar
                            @endif
                        ]</a>
                    {{$item->titulo}}
                    <a href="{{ route('tarefas.edit', ['id'=> $item->id]) }}">[ editar ]</a>
                    <a href="{{ route('tarefas.del', ['id'=> $item->id]) }}" onclick="return confirm('Tem certeza que deseja excluir?')">[ excluir ]</a>
                </li>
            @endif
        @endforeach
    </ul>
    
@else
<br /><br />
<x-alert>
    Não há itens a serem listados.
</x-alert>
<br /><br />
@endif

<hr>

<h1>Lista de Tarefas Feitas</h1>
@if(count($list) > 0)
    <ul>
        @foreach($list as $item)
            @if($item->resolvido === 1)
                <li>
                    <a href="{{ route('tarefas.done', ['id'=> $item->id]) }}">
                            [
                                @if($item->resolvido === 1)
                                    desmarcar
                                    @else 
                                    marcar
                                @endif
                            ]</a>
                        {{$item->titulo}}
                        <a href="{{ route('tarefas.edit', ['id'=> $item->id]) }}">[ editar ]</a>
                        <a href="{{ route('tarefas.del', ['id'=> $item->id]) }}">[ excluir ]</a>
                    </li>
            @endif
                

            @endforeach
    </ul>
    
@else
<br /><br />
<x-alert>
    Não há itens a serem listados.
</x-alert>
<br /><br />
@endif
@endsection