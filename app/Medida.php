<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Medida extends Model
{
    protected $fillable = [
        'numero','descrip','contenido','fecha','ejecutor','controlador','estado_id','def_id'
    ];
    protected $table = 'medidas';

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deficiencia(){
        return $this->belongsTo(Deficiencia::class,'def_id');
    }
    public function estado(){
        return $this->belongsTo(Deficiencia::class,'estado_id');
    }

    /**
     * @param $id
     * @return string
     */
    public function idEstado($id){
        if(Estado::find($id))
        {
            $estado= Estado::find($id);
            return $estado->tipo;
        }
        else return "No existe este Estado";
    }

    /**
     * @param $medida
     * @return string
     */
    public function findNumDef($medida){
        if(Deficiencia::find($medida->def_id))
        {
            $deficiencia= Deficiencia::find($medida->def_id);
            return $deficiencia->numero;
        }
        return "No hay ninguna deficiencia que contenga esta Medida";
    }

    /**
     * @param $def
     * @return bool
     */
    public function hasDeficiencia($def){
        if($this->deficiencia()->get()->contains($def)){
            return true;
        }
        return false;
    }

    /**
     * @param $defs
     * @return bool
     */
    public function hasAnyDeficiencia($defs){
        if(is_array($defs))
        {
            foreach ($defs as $def)
            {   if ($this->hasRole($def))
                return true;
            }
        }
        else
        {
            if ($this->hasDeficiencia())
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $query
     * @param $descrip
     */
    public function scopeDescrip($query,$descrip)
    {
        if(trim($descrip))
        {
            $query->where('descrip',"LIKE","%$descrip%");
        }
    }
}
