@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INSERTA TU NUMERO DE CELULAR</div>

            </div>

                <div class="card">
                        <form class="form" action="{{ action('front\HomeController@mostrarcodigo') }}"  method="POST" id="fr-data" >

                                @csrf
                        <div class="form-group">
                            <input type="text" name="codigo" class="form">
                        </div>

                            <button type="submit">Consultar</button>
                        </form>
                </div>
        </div>
    </div>
</div>

@endsection
