<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medida;
class Deficiencia extends Model
{
 protected $fillable = [
     'numero','descrip'
 ];
 protected $table = 'deficiencias';

 public $timestamps = false;
    /**
     **Medidas que pertenecen a esta deficiencia
     */
    public function medidas(){
        return $this->hasMany(Medida::class);
    }
    public function findMedidas($id)
    {
        $medidas= Medida::all();
        for ($contador=0; $contador < count(Medida::all());$contador++)
        {
            if($medidas[$contador]->def_id != $id)
            {
                unset($medidas[$contador]);
            }

        }
        return $medidas;
    }
}
