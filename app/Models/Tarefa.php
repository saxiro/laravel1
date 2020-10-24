<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // protected $table        = 'tarefas';       // valor já presumido
    // protected $primaryKey   = 'id'     ;      // valor já presumido
    // public    $incrementing = true     ;     // valor já presumido
    // protected $keyType      = 'string' ;    // valor não presumido
    protected $fillable = ['titulo'];


    public    $timestamps   = false    ;   // para não gravar created_at e updated_at

}
