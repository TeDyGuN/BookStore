<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function plantilla()
  	{
        // $re = Recibidos::where('id_user_destino')
        //       ->get();
        // $num = count($re);
  		  // return view('home', compact('num'));
        return view('home');
  	}
}
