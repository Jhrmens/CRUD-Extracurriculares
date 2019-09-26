<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    //
    protected $fillable = [
        'cooperado_id',
        'extracurricular_id',
        'extracurricular_id2',
        'extracurricular_id3',
        'extracurricular_id4',
        'extracurricular_id5',
        'dependente',
        'serie',
        'integral'
      ];
}
