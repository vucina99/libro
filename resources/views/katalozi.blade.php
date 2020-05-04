@extends('contentadmin')

@section('content')
<main class="samodole">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-12"></div>
      <div class="col-lg-8 col-md-12"> 
        <h3 class="text-center">DODAVANJE KATALOGA</h3><hr><br>
        <form action="/dodajkatalog" method="POST" enctype="multipart/form-data">
          @csrf
          @if( Session::has( 'kategorijas' ))
          <div class="alert alert-dark alert-dismissible fade show " role="alert">
           <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'kategorijas' ) }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="form-group row">
          <label for="naziv" class="col-md-4 col-form-label text-md-right">NAZIV KATALOGA</label>

          <div class="col-md-6">
            <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv') }}" required autocomplete="naziv" autofocus>


          </div>
        </div>
        <div class="form-group row">
          <label for="kategorija" class="col-md-4 col-form-label text-md-right">VRSTA</label>

          <div class="col-md-6">
           <select name="vrsta" id="vrsta" class="form-control @error('vrsta') is-invalid @enderror" value="{{ old('vrsta') }}" required autocomplete="vrsta" autofocus >
            
            <option value="1">KATALOG MALOPRODAJE</option>
            <option value="2">KATALOG VELEPRODAJE</option>
            
            
          </select>

          
        </div>
      </div>
      <div class="form-group row">
        <label for="katalog" class="col-md-4 col-form-label text-md-right">FAJL</label>

        <div class="col-md-6">
          <input type="file" name="katalog" id="katalog" >

          
        </div>
      </div>
      
      <br><br>
      <div class="text-center"><input type="submit" class="btn btn-danger w-100" value="DODAJ PODKATEGORIJU"></div>
      
    </form>
  </div>
  <div class="col-lg-8 col-md-12"></div>
</div>
</div>
<br><br><br><br><br><br>



<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <h3 class="text-center">BRISANJE VELEPRODAJA</h3><hr><br>
      <input id="myInput" type="text" class="form-control"  placeholder="PRETRAGA" >
      <br><br>
      @if( Session::has( 'deletekatalog' ))
      <div class="alert alert-dark alert-dismissible fade show " role="alert">
       <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'deletekatalog' ) }}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif 
    <table class="table table-dark text-center">
      <thead>
        <tr>
          <th scope="col">Naziv</th>
          <th scope="col"> <i class="fas fa-trash"></i></th>
          
        </tr>
      </thead>
      <tbody id="myTable">
       @foreach($katalozi as $p)
       <tr>
        
        <td class="pt-3">{{$p->naziv}}</td>
        <td>
          <form action="/brisanjekataloga/{{$p->id}}" method="POST">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button> 
          </form>
        </td>

      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
</div>
</div>


<!--  -->
</main>
@endsection