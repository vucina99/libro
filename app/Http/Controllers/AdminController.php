<?php

namespace App\Http\Controllers;
use App\Proizvodimalo;
use App\Proizvodivel;
use App\Kategorije;
use App\Podkategorije;
use App\Katalog;
use App\Bojemalo;
use App\Bojevel;
use Illuminate\Http\Request;
use Session;
use Storage;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategorije = Kategorije::all();
        $podkategorije = Podkategorije::all();
        $proizvodi = Proizvodimalo::paginate(50);
        return view('admin',compact('kategorije' , 'podkategorije','proizvodi') );
    }
    public function veliko()
    {
        $kategorije = Kategorije::all();
        $podkategorije = Podkategorije::all();
        $proizvodi = Proizvodivel::paginate(50);
        return view('dodavanjeveliko',compact('kategorije' , 'podkategorije','proizvodi'));
    }
    public function podkategorije()
    {
        $kategorije = Kategorije::all();
        $podkategorije = Podkategorije::all();
        return view('dodavanjepodkategorije' , compact('kategorije' , 'podkategorije') );
    }
    public function kategorije()
    {   $svekategorije = Kategorije::all();
        return view('dodavanjekategorije', compact('svekategorije'));
    }
    public function dodavanjekategorija(Request $request){
        $this->validate($request , [

            'naziv' => "required|min:2|unique:kategorijes"

        ]);

        Kategorije::create([
            'naziv' => ucfirst(trans($request->naziv))
        ]);

        Session::flash("kategorija" , "Uspešno je dodata kategorija");

        return back();
    }
    public function brisanjekategorije($id){
        $kategorija = Kategorije::find($id);

        $proizvodimalo = Proizvodimalo::where('kategorija_id' , $id)->get();
        for($i = 0; $i< count($proizvodimalo) ; $i++ ){
         foreach ($proizvodimalo[$i]->bojemalos as $bojamalo) {
            $bojamalo->delete();
        }  
        Storage::delete('public/images/'.$proizvodimalo[$i]->slika);
        $proizvodimalo[$i]->delete();
    }
    $proizvodivel = Proizvodivel::where('kategorija_id' , $id)->get();
    for($j = 0; $j< count($proizvodivel) ; $j++ ){
        foreach ($proizvodivel[$j]->bojevels as $bojavel) {
            $bojavel->delete();
        }
        Storage::delete('public/images/'.$proizvodivel[$i]->slika);
        $proizvodivel[$j]->delete();
    }

    $podkategorije = Podkategorije::where('kategorija_id' , $id)->get();
    for($c = 0; $c< count($podkategorije) ; $c++ ){
        $podkategorije[$c]->delete();
    }

    $kategorija->delete();
    Session::flash("deletekategorija" , "Uspešno je obrisana kategorija");
    return back();
}

public function dodavanjepodkategorija(Request $request){
    $this->validate($request , [

        'naziv' => "required|min:2|unique:podkategorijes",
        'kategorija' => "required|numeric"

    ]);
    
    

    Podkategorije::create([
        'naziv' => ucfirst(trans($request->naziv)),
        'kategorija_id' => $request->kategorija,

    ]);

    Session::flash("podkategorija" , "Uspešno je dodata podkategorija");

    return back();
}


public function brisanjepodkategorije($id){
    $podkategorija = Podkategorije::find($id);
    $proizvodimalo = Proizvodimalo::where('podkategorija_id' , $id)->get();
    for($i = 0; $i< count($proizvodimalo) ; $i++ ){
        foreach ($proizvodimalo[$i]->bojemalos as $bojamalo) {
            $bojamalo->delete();
        }            
        Storage::delete('public/images/'.$proizvodimalo[$i]->slika);
        $proizvodimalo[$i]->delete();

    }
    $proizvodivel = Proizvodivel::where('podkategorija_id' , $id)->get();
    for($j = 0; $j< count($proizvodivel) ; $j++ ){
        foreach ($proizvodivel[$j]->bojevels as $bojavel) {
            $bojavel->delete();
        }
        Storage::delete('public/images/'. $proizvodivel[$j]->slika);
        $proizvodivel[$j]->delete();
    }

    $podkategorija->delete();
    Session::flash("deletepodkategorija" , "Uspešno je obrisana podkategorija sa svim proizvodima u njoj");
    return back();
}

public function dodavanjemaloprodaje(Request $request){

    $this->validate($request , [
        'naziv' => "required|string|unique:proizvodimalos",
        'sifra' => "required|unique:proizvodimalos",
        'cena_proizvoda' => "required|numeric",
        'cena_paketa' => "required|numeric",

        'description' => "required|min:2",
        'slika' => "required"

    ]);


    if($request->hasFile('slika')){
        $filenamewithextension = $request->file('slika')->getClientOriginalName();

        
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
        //get file extension
        $extension = $request->file('slika')->getClientOriginalExtension();
        
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        $request->slika->storeAs("images" ,$filenametostore , 'public');
    }

    Proizvodimalo::create([
        'naziv' => $request->naziv,
        'sifra' => $request->sifra,
        'opis' => $request->description,
        'slika' =>  $filenametostore,
        'vrsta_id' => $request->vrsta_id,
        'cena_jedan' => $request->cena_proizvoda,
        'cena_paket' => $request->cena_paketa,
        'cena_jedan_sniz' => $request->cena_proizvoda_snizena,
        'cena_paket_sniz' => $request->cena_paketa_snizena,
        'kategorija_id' => $request->kategorija,
        'podkategorija_id' => $request->podkategorija,

    ]);
    $sveboje = explode( ',', $request->boje );
    foreach($sveboje as $boja){
        Bojemalo::create([
            'boja' => $boja,
            'proizvodimalo_id' => Proizvodimalo::latest()->first()->id
        ]);
    }

    Session::flash("dodavanjemalo" , "Uspešno je dodat proizvod u maloprodaji");

    return back();      

}

public function brisanjeproizvodamalo($id){
    $proizvod = Proizvodimalo::find($id);
    Storage::delete('public/images/'.$proizvod->slika);
    foreach($proizvod->bojemalos as $boja){
        $boja->delete();
    }
    $proizvod->delete();
    
    Session::flash("deletemalo" , "Uspešno je obrisana proizvod maloprodaje");
    return back();
}

public function brisanjeproizvodaveliko($id){
    $proizvod = Proizvodivel::find($id);
    Storage::delete('public/images/'.$proizvod->slika);
    foreach($proizvod->bojevels as $boja){
        $boja->delete();
    }
    $proizvod->delete();
    
    Session::flash("deleteveliko" , "Uspešno je obrisana proizvod veleprodaje");
    return back();
}



public function dodavanjeveleprodaje(Request $request){

    $this->validate($request , [
        'naziv' => "required|string|unique:proizvodimalos",
        'sifra' => "required|unique:proizvodimalos",
        'cena_proizvoda' => "required|numeric",
        'cena_paketa' => "required|numeric",

        'description' => "required|min:2",
        'slika' => "required"

    ]);


    if($request->hasFile('slika')){
        $filenamewithextension = $request->file('slika')->getClientOriginalName();

        
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
        //get file extension
        $extension = $request->file('slika')->getClientOriginalExtension();
        
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;

        $request->slika->storeAs("images" ,$filenametostore , 'public');
    }

    Proizvodivel::create([
        'naziv' => $request->naziv,
        'sifra' => $request->sifra,
        'opis' => $request->description,
        'slika' =>  $filenametostore,
        'vrsta_id' => $request->vrsta_id,
        'cena_jedan' => $request->cena_proizvoda,
        'cena_paket' => $request->cena_paketa,
        'cena_jedan_sniz' => $request->cena_proizvoda_snizena,
        'cena_paket_sniz' => $request->cena_paketa_snizena,
        'kategorija_id' => $request->kategorija,
        'podkategorija_id' => $request->podkategorija,

    ]);
    $sveboje = explode( ',', $request->boje );
    foreach($sveboje as $boja){
        Bojevel::create([
            'boja' => $boja,
            'proizvodivel_id' => Proizvodivel::latest()->first()->id
        ]);
    }

    Session::flash("dodavanjevel" , "Uspešno je dodat proizvod u veleprodaji");

    return back();      

}

public function katalozi()
{
    $katalozi = Katalog::all();
    return view("katalozi" , compact("katalozi"));
}

public function dodajkatalog(Request $request)
{
   $this->validate($request , [
    'naziv' => "required|string|unique:katalogs",
    'vrsta'=> "required",
    'katalog' => "required",

]);


   if($request->hasFile('katalog')){
    $filenamewithextension = $request->file('katalog')->getClientOriginalName();

    
        //get filename without extension
    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
        //get file extension
    $extension = $request->file('katalog')->getClientOriginalExtension();
    
        //filename to store
    $filenametostore = $filename.'_'.time().'.'.$extension;

    $request->katalog->storeAs("katalozi" ,$filenametostore , 'public');
}    



Katalog::create([
    'naziv' => $request->naziv,
    'vrsta' => $request->vrsta,
    'katalog' => $filenametostore

]) ;

Session::flash("kategorijas" , "Uspešno je dodat katalog");

return back();  
}


public function brisanjekataloga($id)
{
    $proizvod = Katalog::find($id);
    Storage::delete('public/katalozi/'.$proizvod->katalog);
    
    $proizvod->delete();
    
    Session::flash("deletekatalog" , "Uspešno je obrisana katalog");
    return back();
    
}



}
