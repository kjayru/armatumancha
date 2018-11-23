@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                     <form action="#" id="fr-data">
                         @csrf
                        <input type="text" id="mancha" name="nombres" placeholder="mancha">
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mancha").on('blur',function(){
        var valor = $(this).val();


        var token = $("#fr-data input[name='_token']").val();

         var sendata = {'_token':token,'_method':'POST','nombres':valor};
        $.ajax({
            url:'/disponibilidad-mancha',
            type:'POST',
            data:sendata,
            dataType:'json',
            success:function(response){
                console.log(response);
            }
        });
    });
</script>
@endsection
