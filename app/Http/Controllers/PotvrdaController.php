<?php

namespace App\Http\Controllers;

use App\Radni;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\potvrdaFizicko;
use App\Mail\potvrdaLegal;

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

    public function ponovnoslanjekodafiz(Request $request)
    {
       $podaci = [
            'verifikacija' => $request->verifikacija ,
            'name' =>  $request->name,

            
        ];
        $novi = Mail::to($request->email)->send(new potvrdaFizicko($podaci));
        return back()->with("uspeh" , "KOD ZA VERIFIKACIJU JE USPEŠNO POSLAT");
    }

    public function ponovnoslanjekodalegal(Request $request)
    {
       $podaci = [
            'verifikacija' => $request->verifikacija ,
            'name' =>  $request->name,

            
        ];
        Mail::to($request->email)->send(new potvrdaLegal($podaci));
        return back()->with("uspeh" , "KOD ZA VERIFIKACIJU JE USPEŠNO POSLAT");
    }




}
