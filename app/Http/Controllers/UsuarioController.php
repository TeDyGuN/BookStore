<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
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
class UsuarioController extends Controller{
	public function viewRegistro(){
		return view('Usuarios/registro');
	}
	public function saveRegistro(Request $request){
		$user = new User();
		$user->nombre = $request->nombres;
		$user->paterno  = $request->paterno;
		$user->cargo = $request->cargo;
		$user->username  = $request->username;
		$user->email   = $request->email;
		$user->img   = $request->img;
		$user->password  = bcrypt($request->password);
		$user->ROLE      = $request->rol;
		$user->save();
		return Redirect::back()->with(['success' => ' ']);
	}
	public function viewModificar()
	{
		$users = User::paginate();
		return view('Usuarios/modificar', compact('users'));
	}
	public function viewModificarUsuario(Request $request){
		$user = User::find($request->_idUser);
		return view('Usuarios/modificarUsuario', compact('user'));
	}
	public function saveModificar(Request $request){
		$user = new User();
		$user->name = $request->name;
		$user->email   = $request->email;
		$user->password  = bcrypt($request->password);
		$user->save();
		return Redirect::back()->with(['success' => ' ']);
	}
	public function modificar(Request $request){
		$user = User::find($request->id);
		$user->name = $request->nombres;
		$user->email        = $request->email;
		$user->save();
		return redirect('panel');
	}
}