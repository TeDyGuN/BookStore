@extends('welcome')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="card-img-top" src="{{ url('imagen/'.$l->image) }}" alt="Card image cap">
                </div>
                <div class="col-md-8">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h4>{{ $l->nombre }}</h4>
                            <p class="card-text">{{ $l->autor }}</p>
                            
                            <p class="card-text">{{ $l->descripcion }}</p>
                            <span class="badge badge-success">{{ $l->categoria->nombre }}</span>
                            <form role="form" action="{{ url('/orden') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="_id" id="_id" hidden value="{{ $l->id }}" >
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="control-label pr-5" for="number">Cant.</label>
                                    <input class="form-control" value="1" type="number" name="cant" id="cant" min="1" max="{{ $l->stock}}" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="py-1">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-shopping-cart"></i> Bs. {{ $l->precio }}  Comprar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection