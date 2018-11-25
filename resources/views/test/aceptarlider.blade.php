@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INGRESAR CODIGO SMS ACEPTAR LIDER</div>

            </div>

                <div class="card">
                        <form class="form" action="{{ action('front\HomeController@validarasignacion') }}"  method="POST" id="fr-data" >

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
