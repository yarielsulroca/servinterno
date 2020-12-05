<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'tipo'
    ];
    protected $table = 'estados_medidas';

    public $timestamps = false;

    /**
     * todas las medidas que tienen este estado.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medidas(){
        return $this->hasMany(Medida::class);
    }

    /**
     * @param $id
     * se le pasa como parametro el id del la medida, buscando que estado_id tiene esa medida
     * y retorna el tipo o nombre que tiene ese estado. Por ejemplo Rechazado=(id)3
     * @return string
     */
    static function idTipo($id){
        if(Medida::where('estado_id',$id)->get())
        {
            $medida= Medida::where('estado_id',$id)->get();
            $estado_id=$medida->estado_id;
            $estado=Estado::where('id','$estado_id')->get();
            return $estado->tipo;
        }
        return "No existe este estado de Medida";
    }
}
