@extends('contentadmin')

@section('content')
<main class="samodole">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-12"></div>
      <div class="col-lg-8 col-md-12">
        <h3 class="text-center">DODAVANJE KATEGORIJE</h3><hr><br>
        <form action="/dodavanjekategorija" method="POST">
          @csrf
          @if( Session::has( 'kategorija' ))
          <div class="alert alert-dark alert-dismissible fade show " role="alert">
           <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'kategorija' ) }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="form-group row">
          <label for="naziv" class="col-md-4 col-form-label text-md-right">NAZIV KATEGOROJE</label>

          <div class="col-md-6">
            <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror" name="naziv" value="{{ old('naziv') }}" required autocomplete="naziv" autofocus>

            @error('naziv')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <br><br>
        <div class="text-center"><input type="submit" class="btn btn-danger w-100" value="DODAJ KATEGORIJU"></div>
        
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
      <h3 class="text-center">BRISANJE KATEGORIJE</h3><hr><br>
      <input id="myInput" type="text" class="form-control"  placeholder="PRETRAGA" >
      <br><br>
      @if( Session::has( 'deletekategorija' ))
      <div class="alert alert-dark alert-dismissible fade show " role="alert">
       <strong><i class="fas fa-check"></i></strong>  {{ Session::get( 'deletekategorija' ) }}
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
        @foreach($svekategorije as $kategorija)
        <tr>
          
          <td class="pt-3">{{$kategorija->naziv}}</td>
          <td>
            <form action="/obrisikategoriju/{{$kategorija->id}}" method="POST">
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