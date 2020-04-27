<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LegalLoginController extends Controller
{
	public function __construct(){
		$this->middleware("guest:legal");
        $this->middleware("guest");
	}


    public function showLoginForm(){
    	return view("auth/legalLogin");
    }
    public function login(Request $request){
    	$this->validate($request , [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if(Auth::guard("legal")->attempt(['email' => $request->email , 'password' => $request->password ], $request->remember)){

    		return redirect()->intended(route('pocetna'));

    	}
    	return back();


    }

 
}
