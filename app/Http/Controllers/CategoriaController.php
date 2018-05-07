<?php
namespace App\Http\Controllers;
use App\User;
use App\Categoria;
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
use Illuminate\Support\Facades\Storage;
class CategoriaController extends Controller
{
    public function index(){
      return view('categoria');
    }
    public function save(Request $request){
      $cat = new Categoria();
      $cat->nombre = $request->tittle;
      $cat->descripcion = $request->description;
      $cat->save();
      return Redirect::back()->with(['success' => ' ']);
    }
}