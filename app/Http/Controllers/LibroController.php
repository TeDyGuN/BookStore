<?php
namespace App\Http\Controllers;
use App\Libro;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF;
use Validator;
use Illuminate\Support\Facades\File;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF;
class LibroController extends Controller
{
    public function createLibro(){
      $cat = Categoria::all();
      return view('Libro.create', compact('cat'));
    }
    
    public function saveLibro(Request $request){
      $libro = new Libro();
      //subida Miniatura
      $image = $request->file('mini');
      if($image)
      {
        $image_path = time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $libro->image = $image_path;
      }
      $libro->id_categoria = $request->categoria;
      $libro->nombre = $request->tittle;
      $libro->descripcion = $request->description;
      $libro->autor = $request->autor;
      $libro->precio = $request->precio;
      $libro->stock = $request->stock;
      $libro->save();
      return Redirect::back()->with(['success' => ' ']);
    }
    public function getImage($filename){
      $file = \Storage::disk('images')->get($filename);
      return \Response($file, 200);
    }
    public function getDescription($id){
      $l = Libro::find($id);
      $categorias = Categoria::get();
      return view('Libro.detalle', compact('l', 'categorias'));
    }
    public function orden(Request $request) {
      $id = $request->_id;
      $number = $request->cant;
      $categorias = Categoria::get();
      $l = Libro::find($id);
      return view('ordenCompra', compact('l', 'number', 'categorias'));
    }
    public function crearOrden(Request $request){ 
      //$docentes = Instituto::get();
      $id = $request->_id;
      $number = $request->_n;
      $l = Libro::find($id);
      $view =  \View::make('reporteCompra', compact('l', 'number'))->render();
      $pdf = \App::make('dompdf.wrapper'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $pdf->loadHTML($view)->setPaper('letter');
      $carbon = new Carbon();
      return $pdf->download('Reporte_Docentes_'.$carbon->now(new \DateTimeZone('America/La_Paz'))->toDateTimeString().'.pdf');
    }
    /*
    public function listar(){
      $videos = Video::paginate(10);
      return view('Video.listar', compact('videos'));
    }
    public function modificar($id)
    {
        $video = Video::find($id);
        return view('Video.modificar', compact('video'));
    }
    public function update(Request $request){
      $video = Video::find($request->id);
      $video->tittle = $request->titulo;
      $video->description = $request->description;
      $video->duration = $request->duration;
      $video->save();
      return Redirect::back()->with(['success' => ' ']);
    }
    public function search($key = null)
    {
      if(is_null($key)){
        $search = \Request::get('key');
        return redirect()->route('videoSearch', array('key' => $search));
      }
      $videos = Video::where('tittle', 'LIKE', '%'.$key.'%')
              ->get();
      $categorias = Categoria::get();
      return view('welcome', compact('videos', 'categorias', 'key'));
    } */
    public function categoria($id)
    {
      
      $libros= Libro::where('id_categoria', $id)
                ->get();
      $categorias = Categoria::get();
      $key = 1;
      return view('Libro.listado', compact('libros', 'categorias', 'key'));
    }
}
