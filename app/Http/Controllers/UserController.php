<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('Admin.ModificarU', compact('users'));
    }
    public function save()
    {
    }
    public function create($kardex, $email)
    {
    }
    public function store()
    {
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update($id)
    {
    }
    public function destroy($id)
    {
        $flight = User::find($id);
        $flight->delete();
        $message = 'Se Elimino al Usuario de nuestros registros';
        return $message;
    }
}