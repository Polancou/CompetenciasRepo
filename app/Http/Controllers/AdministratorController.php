<?php

namespace App\Http\Controllers;


use App\Models\Indicator;
use App\Models\Subject;
use App\Models\Competition;
use App\Models\Topic;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\Types\Integer;

class AdministratorController extends Controller
{
    public function autogeneratePDF(){
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('pruebapdf')->render());
        $dompdf->render();
        $dompdf->stream('nombre',array('Attachment'=>false));
    }

    public function vistacuatro(Request $request){
        $id = $request->session()->get('last');

    }

    public function vistatemas(Request $request){
        if ($request->ajax()){
            $ntemas = $request->numero;
            $vista = view('comp')->with(compact('ntemas'))->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function primero(Request $request){


        $periodo = $request->periodo;
        $asignatura = $request->asignatura;
        $planestudios = $request->planestudios;
        $claveasignatura = $request->claveasignatura;
        $horascre = $request->horas;
        $caracterizacion = $request->caracterizacion;
        $intencion = $request->caracterizacion;
        $competencia = $request->competencia;

        $Subject = new Subject();
        $Subject->periodo = $periodo;
        $Subject->nombre = $asignatura;
        $Subject->planestudios = $planestudios;
        $Subject->clave = $claveasignatura;
        $Subject->horas = $horascre;
        $Subject->caracterizacion = $caracterizacion;
        $Subject->intencion = $intencion;
        $Subject->competencia = $competencia;
        $Subject->save();

        $last = $Subject->id;

        $subject = $Subject->where('id','=',$last)->first();
        $competitions = (new \App\Models\Competition)->where('asignatura', '=', $last)->get();
        return view('comp')->with(compact('subject'))->with(compact('competitions'));

    }

    public function comdetails(Request $request){
        $id = $request->id;
        $competition = (new \App\Models\Competition)->where('id','=',$id)->first();
        $topics = (new \App\Models\Topic)->where('competencia','=',$id)->get();
        $indicators = (new \App\Models\Indicator)->where('competencia','=',$id)->get();
        $evaluations = (new \App\Models\Evaluation)->where('competencia','=',$id)->get();
        $performances = (new \App\Models\Performance)->where('competencia','=',$id)->get();
        return view('detalles')
            ->with(compact('competition'))
            ->with(compact('topics'))
            ->with(compact('indicators'))
            ->with(compact('evaluations'))
            ->with(compact('performances'))
            ;
    }

    public function addcomp(Request $request){
        if ($request->ajax()){
            $descripcion = $request->descripcion;
            $nombre = $request->nombre;
            $id = $request->asignatura;

            $Competition = new Competition();
            $Competition->asignatura = $id;
            $Competition->nombre = $nombre;
            $Competition->descripcion = $descripcion;
            $Competition->save();

            $competitions = (new \App\Models\Competition)->where('asignatura', '=', $id)->get();

            $vista = view('ajax.competitiontable')->with(compact('competitions'))->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function addtema(Request $request){
        if ($request->ajax()){
            $identificador = $request->competencia;
            $tema = $request->tema;
            $activ_apren = $request->activ_apren;
            $activ_ene = $request->activ_ene;
            $desarrollo_com = $request->desarrollo_com;
            $horas = $request->horas;

            $Topic = new Topic();
            $Topic->competencia = $identificador;
            $Topic->tema = $tema;
            $Topic->activ_apren = $activ_apren;
            $Topic->activ_ene = $activ_ene;
            $Topic->desarrollo_com = $desarrollo_com;
            $Topic->horas = $horas;
            $Topic->save();

            $topics = (new \App\Models\Topic())->where('competencia', '=', $identificador)->get();


            $vista = view('ajax.temas')->with(compact('topics'))->render();

        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function addindicador(Request $request){
        if ($request->ajax()){
            $competencia = $request->competencia;
            $indicador = $request->indicador;
            $valor = $request->valor;

            $Indicator = new Indicator();
            $Indicator->competencia = $competencia;
            $Indicator->indicador = $indicador;
            $Indicator->valor = $valor;
            $Indicator->save();

            $indicators = (new \App\Models\Indicator)->where('competencia','=',$competencia)->get();
            $vista = view('ajax.indicadores')->with(compact('indicators'))->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function backcomp(Request $request){
        $id = $request->id;
        $subject = (new Subject)->where('id','=',$id)->first();
        $competitions = (new \App\Models\Competition)->where('asignatura', '=', $id)->get();

        return view('comp')->with(compact('subject'))->with(compact('competitions'));
    }
}
