<?php

namespace App\Http\Controllers;

use App\Radni;
use App\User;
use Illuminate\Http\Request;

class PotvrdaController extends Controller
{

	public function index(){
		return view("welcome");
	}
    public function potvrdaformefiz($id){
       $osoba = User::where('verifikacija' , $id)->first();

      if($osoba){
            $osoba->verifikacija = NULL;
            $osoba->save();
         return redirect("/login")->with("potvrda" , "Uspešno ste obavili verficikaciju");           
     
        }else{
             return redirect("/login");
        }
    }

        public function potvrdaforme($id){
       $osoba = Radni::where('verifikacija' , $id)->first();

      if($osoba){
            $osoba->verifikacija = NULL;
            $osoba->save();
         return redirect("/legal/login")->with("potvrda" , "Uspešno ste obavili verficikaciju");           
     
        }else{
             return redirect("/login");
        }
    }
}
