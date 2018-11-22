@extends('layout.master')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 text-center">
                    <h1>¿Estás listo para formar tu mancha?</h1>
                    <div class="row justify-content-center">
                        <div class="col-sm-3 text-center">
                            <a href="/arma-tu-mancha" class="btn btn-generico armatumancha">Arma tu mancha</a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a href="/consulta-tu-mancha" class="btn btn-generico consultatumancha">
                                Consulta quiénes forman <br>parte de tu mancha
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
