<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\potvrdaLegal;
use App\Radni;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class LegalRegisterController extends Controller
{
     

   
    public function __construct()
    {
        $this->middleware("guest:legal");
        $this->middleware("guest");

    }

    public function showLoginForm(){
    	return view("auth/legalRegister");
    }


    public function registracija(Request $request){
         
        $this->validate($request , [

            'name' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|max:255|unique:radnis',
            'city' => 'required|string|min:2|max:50',
            'street' => 'required|string|min:2|max:50',
            'object' => 'required|string|max:6',
            'phone' => 'required|numeric|unique:radnis|digits_between:9,10',
            'number' => 'required|numeric|digits_between:1,15',
            'pib' => 'required|numeric|digits:9',
            'maticni_broj' => 'required|numeric|digits:8',
            'password' => 'required|string|min:8|confirmed',
            'fix' => 'numeric|digits_between:4,20',



        ]);
        $verfi = rand(1,10000000000000).$request->email;
        Radni::create([


            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'street' => $request->street,
            'object' => $request->object,
            'maticni_broj' => $request->maticni_broj,
            'pib' => $request->pib,
            'fix' => $request->fix,
            'phone' => $request->phone,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'verifikacija' => $verfi,



        ]);
        $podaci = [
            'verifikacija' => $verfi,
            'name' => $request->name,
        ];
        if(Auth::guard("legal")->attempt(['email' => $request->email , 'password' => $request->password ], $request->remember)){
            $novi = Mail::to($request->email)->send(new potvrdaLegal($podaci));
            return redirect()->intended(route('pocetna'));

        }
        return back();
    }
    

}
