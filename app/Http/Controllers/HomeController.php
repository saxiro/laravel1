<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function __invoke(){
        
        $t = Tarefa::where('resolvido', 0)->get();
        echo "<ul>";
        foreach($t as $item){
            echo "<li>".$item->titulo."</li>";
        }
        echo "</ul>";



        
        //return view('welcome');
    }
}
