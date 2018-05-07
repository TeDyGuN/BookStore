@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Crear Categoria</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Crear Categoria</h3>
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
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="{{ url('categoria/save') }}">
                             {{ csrf_field() }}
                             <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Nombre</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     @if ($errors->has('tittle'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('tittle') }}</strong>
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

                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Crear Categoria
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     {{$success = Session::get('success')}}
                     @if ($success)
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong>Se creo la categoria Correctamente <br><br>
                         </div>
                     @endif
                </div>
           </div>
       </div>
@endsection