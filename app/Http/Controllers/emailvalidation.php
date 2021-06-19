<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NextApps\VerificationCode\VerificationCode;

class emailvalidation extends Controller
{
    //

    public function index()
    {
        if(Auth::user()->email_verified_at != null){
            return redirect('home');
        }else{
            VerificationCode::send(Auth::user()->email);
            return view('verification');
        }
      
    }

    public function validatecode(Request $request){

        $respuesta =VerificationCode::verify($request->get('code'), Auth::user()->email);
        if($respuesta){
             $update=User::where('id',Auth::user()->id)->update(['email_verified_at'=>Carbon::now()]);
            if($update){
               return view('home');
        }
        }
        else {
            return view('verification');
        }
       
    }
}
