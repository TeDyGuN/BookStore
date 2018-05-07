@extends('welcome')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <table class="table table-bordered" >
                    <thead class="table-primary">
                        <tr>
                            <th>Id</th> 
                            <th>Imagen</th> 
                            <th>Producto</th> 
                            <th>Cantidad</th> 
                            <th>Precio</th> 
                            <th>Total</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <th>
                                <img style="width: 100px;" src="{{ url('imagen/'.$l->image) }}">
                            </th> 
                            <td>{{ $l->nombre}}</td>
                            <td>{{ $number }}</td>
                            <td>Bs. {{ $l->precio }}</td>
                            <td>Bs. {{ $number * $l->precio}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class=" float-right" style="width:100%;">
                    <div class="btn-group">

                        @if($number >= 40)
                            <button type="button" id="ppagos" class="btn btn-info">Comprar con Plan de Pagos</button>
                        @endif  
                        <form role="form" action="{{ url('/ordenCompra') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="_id" id="_id" hidden value="{{ $l->id }}" >
                            <input type="text" name="_n" id="_n" hidden value="{{ $number }}" >
                            <button type="submit" class="btn btn-primary">Comprar</button>
                           
                        </form>
                    </div>
                </div>
                <div class="py-5" style="display:none;" id="pppagos">
                    @if($number >= 40)
                
                        <div class="card border-secondary mb-3" style="max-width: 30rem;">
                            <div class="card-header">Pagar a Plazos</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Bs. {{ (($number * $l->precio) / 3) .', Fecha Limite de Pago - '. \Carbon\Carbon::now()->addMonths(1)->format('d/m/Y') }} </li>
                                <li class="list-group-item">Bs. {{ (($number * $l->precio) / 3) .', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(2)->format('d/m/Y') }}</li>
                                <li class="list-group-item">Bs. {{ (($number * $l->precio) / 3) .', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(3)->format('d/m/Y') }}</li>
                            </ul>
                        </div>
    
                    @endif  
                </div>
                              
            </div>
        </div>
    </div>
@endsection
@section('addscripts')
<script>
    $(document).ready(function() {
        $("#ppagos").click(function(){
            $("#pppagos").toggle();
        }); 
    });
</script>
@endsection