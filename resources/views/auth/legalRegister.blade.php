@extends('content')

<main> <br><br><br><br><br><br>
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header bg-danger1 text-light text-center">{{ __('REGISTRACIJA PRAVNIH LICA ') }} <i class="fas fa-sign-in-alt"></i> </div>

                    <div class="card-body">
                        <form method="POST" action="/dodajkorisnika" onsubmit="return provera();">
                            @csrf
                            <div class="text-center text-danger1 font-weight-bold" id="svapolja"></div><br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ime preduzeća') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    <span id="names" class="greska"></span>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="pib" class="col-md-4 col-form-label text-md-right">{{ __('PIB preduzeća') }}</label>

                                <div class="col-md-6">
                                    <input id="pib" type="text" class="form-control @error('pib') is-invalid @enderror" name="pib" value="{{ old('pib') }}"  autocomplete="pib" autofocus>
                                    <span id="pibs" class="greska"></span>
                                    @error('pib')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="maticni_broj" class="col-md-4 col-form-label text-md-right">{{ __('Matični broj preduzeća') }}</label>

                                <div class="col-md-6">
                                    <input id="maticni_broj" type="text" class="form-control @error('maticni_broj') is-invalid @enderror" name="maticni_broj" value="{{ old('maticni_broj') }}"  autocomplete="maticni_broj" autofocus>
                                    <span id="maticni_brojs" class="greska"></span>
                                    @error('maticni_broj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Grad') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"  autocomplete="city">
                                    <span id="citys" class="greska"></span>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Naziv ulice') }}</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}"  autocomplete="street">
                                    <span id="streets" class="greska"></span>
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="object" class="col-md-4 col-form-label text-md-right">{{ __('Broj  objekta') }}</label>

                                <div class="col-md-6">
                                    <input id="object" type="text" class="form-control @error('object') is-invalid @enderror" name="object" value="{{ old('object') }}"  autocomplete="object">
                                    <span id="objects" class="greska"></span>
                                    @error('object')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Broj mobilnog') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">
                                    <span id="phones" class="greska"></span>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fix" class="col-md-4 col-form-label text-md-right">{{ __('Broj fiksnog telefona') }}</label>

                                <div class="col-md-6">
                                    <input id="fix" type="number" class="form-control @error('fix') is-invalid @enderror" name="fix" value="{{ old('fix') }}"  autocomplete="fix">
                                    <span id="fixs" class="greska"></span>
                                    @error('fix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Poštanski broj') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}"  autocomplete="number">
                                    <span id="numbers" class="greska"></span>
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>






                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" oninvalid="this.setCustomValidity('Morate uneti validan e-mail')" oninput="setCustomValidity('')" name="email" value="{{ old('email') }}"  autocomplete="email">
                                    <span id="emails" class="greska"></span>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    <span id="passwords" class="greska"></span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ponovi lozinku') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    <span id="repasswords" class="greska"></span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex">
                                    <div>
                                        <button type="submit" class="btn btn-outline-danger">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div class="pt-2 pl-4">
                                     <a href="/legal/login" class="text-danger1 text-decoration-none">Već imate nalog?</a>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div> <br><br><br>
</main>



@endsection

