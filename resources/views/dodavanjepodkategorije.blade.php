@extends('contentadmin')

@section('content')
<main class="samodole">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-12"></div>
      <div class="col-lg-8 col-md-12"> 
        <h3 class="text-center">DODAVANJE PODKATEGORIJE</h3><hr><br>
        <form action="/dodavanjepodkategorija" method="POST">
          @csrf
          @if( Session::has( 'podkategorija' ))
          <div class="alert alert-dark alert-dismissible fade show " role="alert">
           <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'podkategorija' ) }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="form-group row">
          <label for="naziv" class="col-md-4 col-form-label text-md-right">NAZIV PODKATEGOROJE</label>

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
          <label for="kategorija" class="col-md-4 col-form-label text-md-right">KATEGORIJA</label>

          <div class="col-md-6">
           <select name="kategorija" id="kategorija" class="form-control @error('kategorija') is-invalid @enderror" value="{{ old('kategorija') }}" required autocomplete="kategorija" autofocus >
            @foreach($kategorije as $kategorija)
            <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
            @endforeach
            
          </select>

          @error('kategorija')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
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
    <div class="col-lg-2 col-md-12"></div>
    <div class="col-lg-8 col-md-12">
      <h3 class="text-center">BRISANJE PODKATEGORIJE</h3><hr><br>
      <input id="myInput" type="text" class="form-control"  placeholder="PRETRAGA" >
      <br><br>
      @if( Session::has( 'deletepodkategorija' ))
      <div class="alert alert-dark alert-dismissible fade show " role="alert">
       <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'deletepodkategorija' ) }}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <table class="table table-dark text-center">
      <thead>
        <tr>
          <th scope="col">Naziv Proizvoda</th>
          <th scope="col"><i class="fas fa-trash"></i></th>

        </tr>
      </thead>
      <tbody id="myTable">
       @foreach($podkategorije as $pod)
       <tr>
        
        <td class="pt-3">{{$pod->naziv}}</td>
        <td>
          <form action="/obrisipodkategoriju/{{$pod->id}}" method="POST">
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
<div class="col-lg-8 col-md-12"></div>
</div>
</div>
</main>
@endsection