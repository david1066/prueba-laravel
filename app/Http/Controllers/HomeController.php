<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('emailvalidation');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role==1 && \Request::ip()=='127.0.0.1'){
            session(['origin_sesion ' => '127.0.0.1']);
        }
        $cookie= \Request::session()->all();
        session(['fecha' => Carbon::now()]);
       
        if(Carbon::now()->diffInYears($cookie['fecha'])>1){
                return view('sesiones');
        }else{
            return view('home');
        }
       
       
    }
}
