@extends('layout.master')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 text-center">

                    <h1>Arma tu mancha y gana</h1>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h2 class="text-left">1. Elige tu beneficio</h2>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="#" data-value="descuento" class="btn btn-generico2 descuento">Descuento en equipos</a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="#"  data-value="bono" class="btn btn-generico2 bono">
                                bono en gigas
                            </a>
                        </div>

                        <div class="col-sm-10 text-left">

                            <form id="fr-mancha">
                                <input type="hidden" name="_method" value="POST">
                                @csrf
                                <input type="hidden" name="beneficio" id="beneficio">
                                <div class="form-group">
                                    <label >Nombre de la mancha</label>
                                    <input  type="text" name="nombre" id="nombre" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Lider de la mancha</label>
                                    <div class="form-inline">
                                        <input type="text" name="lideralias" placeholder="Alias"  class="form-control mb-3">
                                        <input type="text" name="lidertelefono"  placeholder="Teléfono" class="form-control  mb-3">
                                        <input type="text" name="lideremail" placeholder="Email" class="form-control  mb-3">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Pata #1</label>
                                        <div class="form-inline">
                                            <input type="text" name="pataalias[]" placeholder="Alias"  class="form-control mb-3">
                                            <input type="text" name="patatelefono[]"  placeholder="Teléfono" class="form-control  mb-3">
                                            <input type="text" name="pataemail[]" placeholder="Email" class="form-control  mb-3">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Pata #2</label>
                                        <div class="form-inline">
                                            <input type="text" name="pataalias[]" placeholder="Alias"  class="form-control mb-3">
                                            <input type="text" name="patatelefono[]"  placeholder="Teléfono" class="form-control  mb-3">
                                            <input type="text" name="pataemail[]" placeholder="Email" class="form-control  mb-3">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label>Pata #3</label>
                                        <div class="form-inline">
                                            <input type="text" name="pataalias[]" placeholder="Alias"  class="form-control mb-3">
                                            <input type="text" name="patatelefono[]"  placeholder="Teléfono" class="form-control  mb-3">
                                            <input type="text" name="pataemail[]" placeholder="Email" class="form-control  mb-3">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="publicidad" type="checkbox" id="publicidad" value="1" checked>
                                                <label class="form-check-label" >Autorizo a Claro para el envio de contenido publicitario</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn-send-grupo btn btn-primary">Registrar</a>
                                </div>
                            </form>

                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
