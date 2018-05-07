<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libro;
use App\Categoria;
class IndexController extends Controller
{
    public function index()
    {
        $libros = Libro::get();
        $categorias = Categoria::get();
        $key = null;
        return view('Libro.listado', compact('libros', 'categorias', 'key'));
    }
}