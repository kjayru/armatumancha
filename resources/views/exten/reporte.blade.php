@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reporte usuario Excel') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('front.reporte') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="key" class="col-sm-4 col-form-label text-md-right">{{ __('Ingrese el key') }}</label>

                            <div class="col-md-6">
                                <input id="key" type="password" class="form-control{{ $errors->has('key') ? ' is-invalid' : '' }}" name="key" value="{{ old('key') }}" required autofocus>

                                @if ($errors->has('key'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('key') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
