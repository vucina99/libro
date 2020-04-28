@extends('content')

@section('content')
<main><br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger1 text-light text-center">{{ __('LOGOVANJE PRAVNOG LICA ') }} <i class="fas fa-user"></i></div>

                <div class="card-body">
            @if (session('potvrda'))

                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                 <strong > {{ session('potvrda') }}  </strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

            @endif
                    <form method="POST" action="{{ route('legallog') }}" onsubmit="return provera();">
                        @csrf
                         <div class="text-center text-danger1 font-weight-bold" id="svapolja"></div><br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>
                        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" oninvalid="this.setCustomValidity('Morate uneti validan e-mail')" oninput="setCustomValidity('')" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                 <span class=" greska" id="emails"></span>
                                            @if (session('nemadalje'))
                                            <span class="greska">{{ session('nemadalje') }}</span>
                                            

                                        @endif
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  oninvalid="this.setCustomValidity('Morate uneti lozinku sa 8 karaktera ')" oninput="setCustomValidity('')">
                                    <span class=" greska" id="passwords"></span> 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-danger">
                                    {{ __('Logovanje Admina') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
<script>
    
</script>