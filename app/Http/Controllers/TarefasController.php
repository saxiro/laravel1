<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list(){

        $list = Tarefa::all();

        $data = ['list' => $list];

        return view('tarefas.list', $data);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');
        print_r($titulo);
        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.list');

    }

    public function edit($id){
        $data = Tarefa::find($id);
        //print_r($data);

        if($data){
            return view('tarefas.edit', ['data'=>$data]);
        } else {
            return redirect()->route('tarefas.list');
        }

        return view('tarefas.edit');
    }

    public function editAction(Request $request, $id){

        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');

        Tarefa::find($id)->update(['titulo'=>$titulo]); //Deve-se colocar protected fillable na model para permitir alteração em massa

        return redirect()->route('tarefas.list');
        
    }

    public function del($id){

        Tarefa::find($id)->delete();
        
        return redirect()->route('tarefas.list');
    }

    public function done($id){

        $t = Tarefa::find($id);
        if($t){
            $t->resolvido = (1 - $t->resolvido);
            $t->save(); 
        }

        return redirect()->route('tarefas.list');
        
    }
}
