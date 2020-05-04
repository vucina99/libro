@extends('contentadmin')

@section('content')
<main class="samodole">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 col-md-12">
        <h3 class="text-center">DODAVANJE VELEPRODAJA</h3><hr><br>
        <form action="/dodavanjeveleprodaje" method="POST" enctype="multipart/form-data">
          @csrf
          @if( Session::has( 'dodavanjevel' ))
          <div class="alert alert-dark alert-dismissible fade show " role="alert">
           <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'dodavanjevel' ) }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif   
        <div class="form-group row">
          <label for="naziv" class="col-md-4 col-form-label text-md-right">NAZIV PROIZVODA</label>

          <div class="col-md-6">
            <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv') }}" required autocomplete="naziv" autofocus>

            @error('naziv')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="sifra" class="col-md-4 col-form-label text-md-right">SIFRA PROIZVODA</label>

          <div class="col-md-6">
            <input id="sifra" type="text" class="form-control @error('sifra') is-invalid @enderror" name="sifra" value="{{ old('sifra') }}" required autocomplete="sifra" autofocus>

            @error('sifra')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="cena_proizvoda" class="col-md-4 col-form-label text-md-right">CENA PROIZVODA</label>

          <div class="col-md-6">
            <input id="cena_proizvoda" type="number" class="form-control @error('cena_proizvoda') is-invalid @enderror" name="cena_proizvoda" value="{{ old('cena_proizvoda') }}" required autocomplete="cena_proizvoda" autofocus>

            @error('cena_proizvoda')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="cena_paketa" class="col-md-4 col-form-label text-md-right">CENA PAKETA</label>

          <div class="col-md-6">
            <input id="cena_paketa" type="number" class="form-control @error('cena_paketa') is-invalid @enderror" name="cena_paketa" value="{{ old('cena_paketa') }}" required autocomplete="cena_paketa" autofocus>

            @error('cena_paketa')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="cena_paketa_snizena" class="col-md-4 col-form-label text-md-right">SNIZENA PAKETA</label>

          <div class="col-md-6">
            <input id="cena_paketa_snizena" type="number" class="form-control @error('cena_paketa_snizena') is-invalid @enderror" name="cena_paketa_snizena" value="{{ old('cena_paketa_snizena') }}"  autocomplete="cena_paketa_snizena" autofocus>

            @error('cena_paketa_snizena')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="cena_proizvoda_snizena" class="col-md-4 col-form-label text-md-right">SNIZENA PROIZVODA</label>

          <div class="col-md-6">
            <input id="cena_proizvoda_snizena" type="number" class="form-control @error('cena_proizvoda_snizena') is-invalid @enderror" name="cena_proizvoda_snizena" value="{{ old('cena_proizvoda_snizena') }}"  autocomplete="cena_proizvoda_snizena" autofocus>

            @error('cena_proizvoda_snizena')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="boje" class="col-md-4 col-form-label text-md-right">BOJE</label>

          <div class="col-md-6">
            <input id="boje" type="text" class="form-control @error('boje') is-invalid @enderror" name="boje" value="{{ old('boje') }}" required autocomplete="boje" placeholder="CRVENA,ZELENA,PLAVA,ROZA" autofocus>

            @error('boje')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="kategorija" class="col-md-4 col-form-label text-md-right">KATEGORIJA</label>

          <div class="col-md-6">
           <select name="kategorija" id="kategorija" class="form-control @error('kategorija') is-invalid @enderror" value="{{ old('kategorija') }}"  autocomplete="kategorija" autofocus >

            @foreach($kategorije as $kat)

            <option value="{{$kat->id}}">{{$kat->naziv}}</option>

            @endforeach
          </select>

          @error('kategorija')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="podkategorija" class="col-md-4 col-form-label text-md-right">PODKATEGORIJA</label>

        <div class="col-md-6">
         <select name="podkategorija" id="podkategorija" class="form-control @error('podkategorija') is-invalid @enderror" value="{{ old('podkategorija') }}" required autocomplete="podkategorija" autofocus >
          @foreach($podkategorije as $pod)
          <option value="{{$pod->id}}">{{$pod->naziv}}</option>
          @endforeach
        </select>

        @error('podkategorija')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
     
      <label for="description" class="col-md-4 col-form-label text-md-right">OPIS</label>
      <div class="col-md-6">
        <textarea  id="description" name="description" cols="30" rows="10"  class="form-control @error('description') is-invalid @enderror description" placeholder="Your description" ></textarea>
        
        @error('description')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
     
      <label for="slika" class="col-md-4 col-form-label text-md-right">SLIKA PROIZVODA</label>
      <div class="col-md-6">
       <input type="file" name="slika" id="slika">
       @error('slika')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div> <br><br>
  <input type="number" value="2" name="vrsta_id" hidden="">
  <div class="text-center"><input type="submit" class="btn btn-danger w-50" value="POSTAVI PROIZVOD"></div>

</form>
</div>
</div>
</div>
<br><br><br><br><br><br>






<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <h3 class="text-center">BRISANJE VELEPRODAJA</h3><hr><br>
      <input id="myInput" type="text" class="form-control"  placeholder="PRETRAGA" >
      <br><br>
      @if( Session::has( 'deleteveliko' ))
      <div class="alert alert-dark alert-dismissible fade show " role="alert">
       <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'deleteveliko' ) }}
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
       @foreach($proizvodi as $p)
       <tr>
        
        <td class="pt-3">{{$p->naziv}}</td>
        <td>
          <form action="/brisanjeproizvodaveliko/{{$p->id}}" method="POST">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button> 
          </form>
        </td>

      </tr>
      @endforeach
      
    </tbody>
  </table>
  {{$proizvodi->links()}}
</div>
</div>
</div>
</main>
@endsection