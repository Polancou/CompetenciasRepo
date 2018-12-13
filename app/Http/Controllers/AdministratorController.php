<?php

namespace App\Http\Controllers;


use App\Models\Evaluation;
use App\Models\Indicator;
use App\Models\News;
use App\Models\Performance;
use App\Models\Subject;
use App\Models\Competition;
use App\Models\Topic;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\Types\Integer;

class AdministratorController extends Controller
{


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
        $performance = (new \App\Models\Performance)->where('competencia','=',$id)->first();
        $information = (new News)->where('competencias','=',$id)->first();

        return view('detalles')
            ->with(compact('competition'))
            ->with(compact('topics'))
            ->with(compact('indicators'))
            ->with(compact('evaluations'))
            ->with(compact('performance'))
            ->with(compact('information'));
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

    public function addniveles(Request $request){
        if ($request->ajax()){
            $excelente = $request->excelente;
            $valoracionex = $request->valoracionex;
            $notable = $request->notable;
            $valoracionnot =  $request->valoracionnot;
            $bueno = $request->bueno;
            $valoracionb= $request->valoracionb;
            $suficiente = $request->suficiente;
            $valoracionsuf = $request->valoracionsuf;
            $insuficiente = $request->insuficiente;
            $valoracioninsuf = $request->valoracioninsuf;
            $competencia = $request->competencia;

            $Performace = new Performance();
            $Performace->competencia = $competencia;
            $Performace->excelente = $excelente;
            $Performace->valorex = $valoracionex;
            $Performace->notable = $notable;
            $Performace->valornot = $valoracionnot;
            $Performace->bueno = $bueno;
            $Performace->valorb = $valoracionb;
            $Performace->suficiente = $suficiente;
            $Performace->valorsuf = $valoracionsuf;
            $Performace->insuficiente = $insuficiente;
            $Performace->valorinsuf = $valoracioninsuf;
            $Performace->save();

            $performance = (new Performance)->where('competencia','=',$competencia)->first();
            $vista = view('ajax.niveles')->with(compact('performance'))->render();

        }
        return response()->json(array('success' => true, 'html'=>$vista));

    }

    public function addevidencia(Request $request){
        if ($request->ajax()){
            $evidencia = $request->evaluacion;
            $porcentaje = $request->porcentaje;
            $indiceA = $request->indiceA;
            $indiceB = $request->indiceB;
            $indiceC = $request->indiceC;
            $indiceD = $request->indiceD;
            $indiceE = $request->indiceE;
            $indiceF = $request->indiceF;
            $evaluacionf = $request->evaluacionf;
            $competencia = $request->competencia;

            $Evaluation = new Evaluation();
            $Evaluation->competencia = $competencia;
            $Evaluation->evidencia = $evidencia;
            $Evaluation->porcentaje = $porcentaje;
            $Evaluation->a = $indiceA;
            $Evaluation->b = $indiceB;
            $Evaluation->c = $indiceC;
            $Evaluation->d = $indiceD;
            $Evaluation->e = $indiceE;
            $Evaluation->f = $indiceF;
            $Evaluation->evaluacion = $evaluacionf;
            $Evaluation->save();

            $evaluations = (new Evaluation)->where('competencia','=',$competencia)->get();
            $vista = view('ajax.evaluations')->with(compact('evaluations'))->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));
    }

    public function addnews(Request $request){
        if ($request->ajax()){
            $fuentes = $request->fuentes;
            $apoyos = $request->apoyos;
            $competencia = $request->competencia;

            $News = new News();
            $News->competencias = $competencia;
            $News->fuentes = $fuentes;
            $News->apoyos = $apoyos;
            $News->save();

            $information = (new News)->where('competencias','=',$competencia)->first();
            $vista = view('ajax.information')->with(compact('information'))->render();
        }
        return response()->json(array('success' => true, 'html'=>$vista));

    }

    public function autogeneratePDF(Request $request){
        $id = $request->id;
        $subject = (new Subject)->where('id','=',$id)->first();
        $competitions = (new Competition)->where('asignatura','=',$id)->get();
        $fecha = Carbon::now();

        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4','landscape');
        $dompdf->loadHtml(view('pdf.plantilla')->with(compact('subject'))->with(compact('competitions'))->with
        (compact('fecha'))
            ->render());
        $dompdf->render();
        $dompdf->stream('nombre',array('Attachment'=>true));
    }

    public function asignaturas(Request $request){
        $subjects = (new Subject)->get();
        return view('ajax.asignaturas')->with(compact('subjects'));
    }

    public function detalleasignatura(Request $request){
        $id = $request->id;
        $subject = (new Subject)->where('id','=',$id)->first();
        $competitions = (new \App\Models\Competition)->where('asignatura', '=', $id)->get();
        return view('comp')->with(compact('subject'))->with(compact('competitions'));
    }
}
