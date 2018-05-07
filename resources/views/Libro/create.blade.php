@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Crear Video</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Subir Video</h3>
               </div>
               <div class="panel-body">
                     @if (count($errors) > 0)
                         <div class="alert alert-danger">
                             <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="{{ url('libro/save') }}">
                             {{ csrf_field() }}
                             <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Titulo</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     @if ($errors->has('tittle'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('tittle') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                            <div class="form-group {{ $errors->has('autor') ? ' has-error' : '' }}">
                                    <label for="autor" class="col-md-4 control-label">Autor</label>
   
                                    <div class="col-md-6">
                                        <input id="autor" type="text" class="form-control" name="autor" required>
                                        @if ($errors->has('autor'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('autor') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                             <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                 <label for="description" class="col-md-4 control-label">Descripción</label>
                                 <div class="col-md-6">
                                     <textarea class="form-control" rows="6" name="description" style="overflow:hidden"></textarea>

                                     @if ($errors->has('description'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group {{ $errors->has('mini') ? ' has-error' : '' }}">
                                 <label for="mini" class="col-md-4 control-label">Miniatura</label>

                                 <div class="col-md-6">
                                     <input id="mini" type="file" class="form-control" name="mini" required>
                                     @if ($errors->has('mini'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('mini') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="c_estado" class="col-md-4 control-label">Categoria </label>

                                 <div class="col-md-6">
                                   <select class="form-control" name="categoria">
                                      @foreach ($cat as $c)
                                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                      @endforeach

                                   </select>
                                 </div>
                             </div>
                            <div class="form-group {{ $errors->has('precio') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Precio</label>

                                 <div class="col-md-5">
                                     <input id="precio" type="text" class="form-control" name="precio" required>
                                     @if ($errors->has('precio'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('precio') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                                 <div class="col-md-1">
                                   <span>BOB.</span>
                                 </div>
                            </div>
                            <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                                <label for="stock" class="col-md-4 control-label">Stock</label>

                                <div class="col-md-5">
                                    <input id="stock" type="number" class="form-control" name="stock" required>
                                    @if ($errors->has('stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-1">
                                    <span>Unidades</span>
                                </div>
                            </div>
                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Crear Libro
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     {{$success = Session::get('success')}}
                     @if ($success)
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong>Se Creo el Libro Correctamente <br><br>
                         </div>
                     @endif
                </div>
           </div>
       </div>
@endsection