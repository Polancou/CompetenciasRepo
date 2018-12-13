@extends('template')
@section('body')
    <!-- Page Content
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="mt-5">INSTRUMENTACIÓN DIDÁCTICA PARA LA FORMACIÓN Y DESARROLLO DE COMPETENCIA</h4>
            </div>
        </div>
    </div>-->
    <form class="col s12" method="post" action="{{ route('first') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12 m12">
                <div class="row center ">
                    <div class="row col s12 m9">
                        <blockquote>
                            <h4 class="left-align ">INSTRUMENTACIÓN DIDÁCTICA PARA LA FORMACIÓN Y DESARROLLO DE
                                COMPETENCIAS</h4>
                        </blockquote>
                    </div>
                </div>
                <a class="btn" href="{{ route('asignaturas') }}">Ver asignaturas</a>
                <div style="margin: auto; ">

                        <div class="card col s12 m12" >
                            <div class="row col s12 m12">
                                <div class="input-field col s12 m12">
                                    <input type="text"  name="periodo" id="periodo" value="" />
                                    <label  for="periodo">Periodo</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <input type="text" id="asignatura"
                                           value="" name="asignatura">
                                    <label for="asignatura">Nombre de asignatura</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <input type="text" id="planestudios"
                                           value="" name="planestudios">
                                    <label for="planestudios">Plan de estudios</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <input type="text" id="claveasignatura"
                                           value="" name="claveasignatura">
                                    <label for="claveasignatura">Clave de la asignatura</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <input type="text" id="horas"
                                           value="" name="horas">
                                    <label for="horas">Horas teoría - Horas prácita - Créditos</label>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="card col s12 m12">
                    <div class="input-field col s12">
                        <h5>1. Caracterización de la asignatura</h5>
                        <input type="text" id="caracterizacion" name="caracterizacion" class="materialize-textarea"/>
                    </div>

                </div>

                <div class="card col s12 m12">
                    <div class="input-field col s12">
                        <h5>2. Intención Didáctica</h5>
                        <input type="text" id="intencion" name="intencion" class="materialize-textarea"/>
                    </div>
                </div>

                <div class="card col s12 m12">

                    <div class="input-field col s12">
                        <h5>3. Competencia de la asignatura</h5>
                        <input type="text" id="competencia" name="competencia" class="materialize-textarea"/>
                    </div>
                </div>



                <button class="btn" type="submit" name="action">Continuar
                    <i class="material-icons right">send</i>
                </button>


            </div>
        </div>
    </form>





@endsection