<?php

namespace App\Http\Controllers;
use App\Http\Resources\Proizvodimalo as ProizvodimaloResource;
use App\Http\Resources\Proizvodivel as ProizvodivelResource;
use App\Kategorije;
use App\Mail\Kontakt;
use App\Mail\Narudzbina;
use App\Mail\NarudzbinaVele;
use App\Proizvodimalo;
use App\Proizvodivel;
use App\Katalog;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\Storage;
class LibroController extends Controller
{
    public function __construct(){
        $this->middleware("verifikacija");
        
    }
    public function ponovi()
    {
        $katalozi = Katalog::all();
        return view("content" , compact("katalozi"));
    }
    public function index()
    {
     return view("index");
 }
 public function potvrda(){
     $katalozi = Katalog::all();
    return view("potvrda", compact("katalozi"));
}
public function prikaz()
{   $katalozi = Katalog::all();
   return view("asortiman", compact("katalozi"));
}

function json(){
    return  ProizvodimaloResource::collection(Proizvodimalo::all());
}
function kontakt(){
     $katalozi = Katalog::all();
    return view("contant", compact("katalozi"));
}

function jsons(){
    return  ProizvodivelResource::collection(Proizvodivel::all());
}
public function snizenjemalo()
{
     $katalozi = Katalog::all();
    $kategorijemalo = Kategorije::all();
    $proizvodi = Proizvodimalo::whereNotNull('cena_jedan_sniz')->get();
    return view("prvastranamaloprodaja",compact('kategorijemalo' , 'proizvodi','katalozi'));
}
public function snizenjevel()
{
     $katalozi = Katalog::all();
    $kategorijevel = Kategorije::all();
    $proizvodi = Proizvodivel::whereNotNull('cena_jedan_sniz')->get();
    return view("prvastranaveleprodaja",compact('kategorijevel', 'proizvodi','katalozi'));
}
public function korpa()
{
     $katalozi = Katalog::all();
 return view("cart", compact("katalozi"));
}
public function prikazveleprodaja($id,$slug){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodivel::where('podkategorija_id' , $id)->latest()->paginate(12);
    $kategorijevel = Kategorije::all();
    return view("asortimanvel" , compact("proizvodi","kategorijevel","katalozi"));
}
public function prikazmaloprodaja($id){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodimalo::where('podkategorija_id' , $id)->latest()->paginate(12);
    $kategorijemale = Kategorije::all();
    return view("asortimanmalo" , compact("proizvodi","kategorijemale","katalozi"));
}
public function prikazkatmaloprodaja($id,$slug){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodimalo::where('kategorija_id' , $id)->latest()->paginate(12);
    $kategorijemale = Kategorije::all();
    return view("asortimankategorijemalo" , compact("proizvodi","kategorijemale","katalozi"));
}
public function prikazkatveleprodaja($id,$slug){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodivel::where('kategorija_id' , $id)->latest()->paginate(12);
    $kategorijevel = Kategorije::all();
    return view("asortimankategorijevel" , compact("proizvodi","kategorijevel","katalozi"));
}
public function prikazjednogvele($id,$slug){
     $katalozi = Katalog::all();
    $proizvod = Proizvodivel::find($id);
    return view("proizvodveleprodaja" , compact("proizvod","katalozi"));
}
public function prikazjednogmalo($id,$slug){
     $katalozi = Katalog::all();
    $proizvod = Proizvodimalo::find($id);
    return view("proizvodmaloprodaja" , compact("proizvod","katalozi"));
}
public function naruci(Request $request){
    if(Auth::user()){
        if(empty($request->maleno)){
           return redirect("/korpa");
       }else{
           $obican = [
            'name' => Auth::user()->name,
            'city' => Auth::user()->city,
            'street' => Auth::user()->street,
            'number' => Auth::user()->number,
            'object' => Auth::user()->object,
            'phone' => Auth::user()->phone,
            'email' => Auth::user()->email,
            'promena' => $request->promena,
            'maleno' => $request->maleno,
            'konacnacena' => $request->konacnacena,
        ];
        Mail::to('vukzdravkovic69@gmail.com')->send(new Narudzbina($obican));
        Mail::to( $obican['email'])->send(new Narudzbina($obican));
        Session::flash("status1" , "USPEŠNO");
        return redirect("/"); 
    }

}else if(Auth::guard("legal")->user()){
   if(empty($request->maleno) && empty($request->velimir)){
    return redirect("/korpa");
}else{
    $obican = [
        'name' => Auth::guard("legal")->user()->name,
        'city' => Auth::guard("legal")->user()->city,
        'pib' => Auth::guard("legal")->user()->pib,
        'maticni_broj' => Auth::guard("legal")->user()->maticni_broj,
        'street' => Auth::guard("legal")->user()->street,
        'number' => Auth::guard("legal")->user()->number,
        'object' => Auth::guard("legal")->user()->object,
        'phone' => Auth::guard("legal")->user()->phone,
        'fix' => Auth::guard("legal")->user()->fix,
        'email' => Auth::guard("legal")->user()->email,
        'promena' => $request->promena,
        'maleno' => $request->maleno,
        'velimir' => $request->velimir,
        'konacnacena' => $request->konacnacena,
    ];   
    Mail::to('vukzdravkovic69@gmail.com')->send(new NarudzbinaVele($obican)) ;
    Mail::to( $obican['email'])->send(new NarudzbinaVele($obican)) ;
    Session::flash("status1" , "USPEŠNO");
    return redirect("/"); 
}

}
}

public function pretragamaloprodaje(Request $request){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodimalo::where('naziv' , 'like' , '%'.$request->pretraga.'%')->paginate(12);
    $kategorijemale = Kategorije::all();
    return view("asortimanmalo" , compact("proizvodi","kategorijemale","katalozi"));  
}





public function pretragaveleprodaje(Request $request){
     $katalozi = Katalog::all();
    $proizvodi = Proizvodivel::where('naziv' , 'like' , '%'.$request->pretraga.'%')->paginate(12);
    $kategorijevel = Kategorije::all();
    return view("asortimanvel" , compact("proizvodi","kategorijevel","katalozi"));
}

public function slanjeporuke(Request $request){
    $this->validate($request,[
        'name' => 'required|max:40|min:2',
        'email' => 'required|email|max:255',
        'question' => 'required|max:1500|min:2',
    ]);
    $sve = [
        'name' => $request->name,
        'email' => $request->email,
        'question' => $request->question
    ];
    Mail::to("vukzdravkovic69@gmail.com")->send(new Kontakt($sve));

    return back()->with("kontak" , "Uspešno ste poslali poruku");
}
public function preuzimanjekataloga($id)
{
    $katalogs = Katalog::find($id);
    $proizvod = $katalogs->katalog;

    return Storage::download('public/katalozi/'. $proizvod);
}







}
