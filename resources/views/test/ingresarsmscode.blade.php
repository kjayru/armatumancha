@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INGRESAR CODIGO SMS PARA VALIDAR A TU PATA</div>

            </div>

                <div class="card">
                        <form class="form" action="{{ action('front\HomeController@aceptoParticipacion')}}"  method="POST" id="fr-data2">
                         @csrf
                        <div class="form-group">
                            <input type="text" name="code" class="form">
                        </div>

                            <button type="submit">Consultar</button>
                        </form>
                </div>
        </div>
    </div>
</div>

@endsection
