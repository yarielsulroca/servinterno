<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index (Request $request)
    {
        $anno = $request->get('anno');
        $mes = $request->get('mes');
        $datos=User::join('roles', 'roles.id', '=', 'users.role_id')
            ->join('medidas', 'medidas.controlador', '=', 'users.id')
            ->join('estados_medidas', 'estados_medidas.id', '=', 'medidas.estado_id')
            ->where('fecha', 'LIKE', "$anno-%")->where('fecha', 'LIKE', "%-$mes-%")
            ->join('deficiencias','deficiencias.id','=','medidas.def_id')
            ->select(
                'medidas.numero',
                'medidas.id as med_id',
                'medidas.descrip as medida',
                'medidas.contenido',
                'medidas.controlador',
                'medidas.ejecutor',
                'medidas.fecha',
                'estados_medidas.tipo',
                'deficiencias.descrip as deficiencia',
                'deficiencias.numero as munero_def',
                'deficiencias.id as def_id'
            )
            ->orderBy('medidas.fecha', 'asc')
            ->paginate(10);
        $solicitadas=0;
        $cumplidas=0;
        $incumplidas=0;
        foreach ($datos as $dat)
        {
            if ($dat->tipo == "solicitada")
            {
                $solicitadas++;
            }
            elseif ($dat->tipo == "cumplida")
            {
                $cumplidas++;
            }
            else{
                $incumplidas++;
            }
        }
        return view('sistema.reportes.sistema.index')
            ->with('datos',$datos)
            ->with('solicitadas',$solicitadas)
            ->with('cumplidas',$cumplidas)
            ->with('incumplidas',$incumplidas);
    }
    public function filtraUsuario(Request $request)
    {
        if($request->controlador == 0 && $request->ejecutor > 0 ){
        $datos = User::join('medidas','medidas.ejecutor','=','users.id')
            ->join('estados_medidas','estados_medidas.id','=','medidas.estado_id')
            ->join('deficiencias','deficiencias.id','=','medidas.def_id')
            ->where('users.id',$request->get('ejecutor'))
            ->select(
                'deficiencias.numero as numero_def',
                'deficiencias.descrip as deficiencia'
                ,'medidas.numero as numero_med',
                'medidas.descrip as medida',
                'medidas.controlador',
                'medidas.ejecutor',
                'medidas.fecha',
                'estados_medidas.tipo',
                'medidas.contenido')
            ->orderBy('medidas.fecha', 'asc')
            ->get();
        return view('sistema.reporte.directivo.Index')->with('datos',$datos);
        }
        else{
            $datos = User::join('medidas','medidas.ejecutor','=','users.id')
                ->join('estados_medidas','estados_medidas.id','=','medidas.estado_id')
                ->join('deficiencias','deficiencias.id','=','medidas.def_id')
                ->where('users.id',$request->get('ejecutor'))
                ->select(
                    'deficiencias.numero as numero_def',
                    'deficiencias.descrip as deficiencia'
                    ,'medidas.numero as numero_med',
                    'medidas.descrip as medida',
                    'medidas.controlador',
                    'medidas.ejecutor',
                    'medidas.fecha',
                    'estados_medidas.tipo',
                    'medidas.contenido')
                ->orderBy('medidas.fecha', 'asc')
                ->get();
            return view('sistema.reporte.directivo.Index')->with('datos',$datos);
        }

    }


}
