<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request){


        if($request->missing('nome') == NULL || $request->missing('nome')){
            $nome = "Saxiro";
        }
        else
        {
            $nome = $request->post('nome');
        }
       
        if($request->missing('idade') == NULL || $request->missing('idade')){
            $idade = 38;
        }
        else{
            $idade = $request->post('idade');
        }
        
        $lista = [
            'farinha',
            'ovo', 
            'achocolatado em pó', 
            'café solúvel'
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'lista' => $lista
        ];

        return view('Admin.config', $data);
    }

    public function info(){
        echo 'Configurações INFO 3';
    }

    public function permissoes(){
        echo 'Configurações PERMISSÕES 3';
    }
}
