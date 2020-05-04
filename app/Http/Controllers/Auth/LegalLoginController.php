<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Katalog;
class LegalLoginController extends Controller
{
	public function __construct(){
		$this->middleware("guest:legal");
        $this->middleware("guest");
	}


    public function showLoginForm(){
        $katalozi = Katalog::all();
    	return view("auth/legalLogin", compact("katalozi"));
    }
    public function login(Request $request){
    	$this->validate($request , [
    		'email' => 'required|email',
    		'password' => 'required|min:8'
    	]);

    	if(Auth::guard("legal")->attempt(['email' => $request->email , 'password' => $request->password ], $request->remember)){

    		return redirect()->intended(route('pocetna'));

    	}
    	return back()->with("nemadalje" , "POGREŠAN E-MAIL ILI LOZINKA, PROBAJTE PONOVO");


    }

 
}
