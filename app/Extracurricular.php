<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cadastro;

class Extracurricular extends Model
{
    //
    protected $fillable = [
        'aula',
        'vagas'
      ];

      public function getCadastrosCountAttribute(){
        return Cadastro::where('extracurricular_id', $this->id)
                         ->orWhere('extracurricular_id2', $this->id)
                         ->orWhere('extracurricular_id3', $this->id)
                         ->orWhere('extracurricular_id4', $this->id)
                         ->orWhere('extracurricular_id5', $this->id)
                         ->count();
    }
}

