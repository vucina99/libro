@extends("content")
@section("seo")
        <meta name="robots" content="noindex">

    
@endsection
@section("content")

<main>


  <div class="container">
   <div class="row">
    <div class="col-lg-2 col-md-12"></div>
    <div class="col-lg-8 col-md-12"> <br><br><br><br><br><br><br>
     @if(Auth::guard("legal")->check())
     <form method="POST" action="/naruci">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-lg-4 col-form-label ">{{ __('Ime preduzeća') }}</label>

            <div class="col-lg-8">
                <input id="name" disabled="" type="text" class="form-control " name="name" value="{{Auth::guard('legal')->user()->name}}" required autocomplete="name" autofocus>


            </div>
        </div>

        <div class="form-group row">
            <label for="pib" class="col-lg-4 col-form-label ">{{ __('PIB preduzeća') }}</label>

            <div class="col-lg-8">
                <input id="pib" type="text" class="form-control " name="pib" value="{{Auth::guard('legal')->user()->pib}}" disabled="" required autocomplete="pib" autofocus>


            </div>
        </div>

        <div class="form-group row">
            <label for="maticni_broj" class="col-lg-4 col-form-label ">{{ __('Matični broj preduzeća') }}</label>

            <div class="col-lg-8">
                <input id="maticni_broj" type="text" class="form-control" name="maticni_broj" value="{{Auth::guard('legal')->user()->maticni_broj}}" required autocomplete="maticni_broj" disabled="" autofocus>


            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-lg-4 col-form-label ">{{ __('E-Mail Adresa') }}</label>

            <div class="col-lg-8">
                <input id="email" disabled="" type="email" class="form-control " name="email" value="{{Auth::guard('legal')->user()->email}}" required autocomplete="email">


            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-lg-4 col-form-label ">{{ __('Grad') }}</label>

            <div class="col-lg-8">
                <input id="city" disabled="" type="text" class="form-control " name="city" value="{{Auth::guard('legal')->user()->city}}" required autocomplete="city">


            </div>
        </div>

        <div class="form-group row">
            <label for="street" class="col-lg-4 col-form-label ">{{ __('Naziv ulice') }}</label>

            <div class="col-lg-8">
                <input id="street" disabled="" type="text" class="form-control " name="street" value="{{Auth::guard('legal')->user()->street}}" required autocomplete="street">


            </div>
        </div>
        <div class="form-group row">
            <label for="object" class="col-lg-4 col-form-label ">{{ __('Broj  objekta') }}</label>

            <div class="col-lg-8">
                <input id="object" disabled="" type="number" class="form-control " name="object" value="{{Auth::guard('legal')->user()->object}}" required autocomplete="object">


            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-lg-4 col-form-label ">{{ __('Broj mobilnog') }}</label>

            <div class="col-lg-8">
                <input id="phone" disabled="" type="number" class="form-control " name="phone" value="{{Auth::guard('legal')->user()->phone}}" required autocomplete="phone">


            </div>
        </div>
        <div class="form-group row">
            <label for="fix" class="col-lg-4 col-form-label ">{{ __('Broj fiksnog telefona') }}</label>

            <div class="col-lg-8">
                <input id="fix" type="number" disabled="" class="form-control " name="fix" value="{{Auth::guard('legal')->user()->fix}}" required autocomplete="fix">


            </div>
        </div>


        <div class="form-group row">
            <label for="number" class="col-lg-4 col-form-label ">{{ __('Poštanski broj') }}</label>

            <div class="col-lg-8">
                <input id="number" disabled="" type="number" class="form-control " name="number" value="{{Auth::guard('legal')->user()->number}}" required autocomplete="number">


            </div>
        </div>





        <div class="form-group row">
            <label for="promena" class="col-lg-4 col-form-label ">{{ __('UKOLIKO ŽELITE DA PROMENITE NEKU OD GORE NAVEDENIH INFORMACIJA, TO MOŽETE URADITI U OVOM POLJU * ') }}</label>

            <div class="col-lg-8">
                <textarea id="promena"  cols="30" rows="8"  class="form-control" name="promena" ></textarea>

            </div>
        </div>

        <textarea id="maleno" hidden="true" cols="30" rows="8"  class="form-control" name="maleno" ></textarea>
        <textarea id="velimir" hidden="true"  cols="30" rows="8"  class="form-control" name="velimir" ></textarea>

        <input type="number" hidden="true" id="konacnacena" name="konacnacena">





        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-danger">
                    {{ __('POTVRDI NARUDZBINU') }} <i class="fas fa-check"></i>
                </button>
            </div>
        </div>
    </form>
    @endif





    @if(Auth::check())
    <form method="POST" action="/naruci">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-lg-4 col-form-label ">{{ __('Ime i Prezime') }}</label>

            <div class="col-lg-8">
                <input id="name" disabled="" type="text" class="form-control " name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>


            </div>
        </div>


        <div class="form-group row">
            <label for="email" class="col-lg-4  col-form-label ">{{ __('Grad') }}</label>

            <div class="col-lg-8">
                <input id="city" disabled="" type="text" class="form-control " name="city" value="{{Auth::user()->city}}" required autocomplete="city">


            </div>
        </div>

        <div class="form-group row">
            <label for="street" class="col-lg-4 col-form-label ">{{ __('Naziv ulice') }}</label>

            <div class="col-lg-8">
                <input id="street" disabled="" type="text" class="form-control " name="street" value="{{Auth::user()->street}}" required autocomplete="street">


            </div>
        </div>
        <div class="form-group row">
            <label for="object" class="col-lg-4 col-form-label ">{{ __('Broj stambenog objekta') }}</label>

            <div class="col-lg-8">
                <input id="object" disabled="" type="number" class="form-control " name="object" value="{{Auth::user()->object}}" required autocomplete="object">


            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-lg-4 col-form-label ">{{ __('Broj mobilnog') }}</label>

            <div class="col-lg-8">
                <input id="phone" disabled="" type="number" class="form-control " name="phone" value="{{Auth::user()->phone}}" required autocomplete="phone">


            </div>
        </div>



        <div class="form-group row">
            <label for="number" class="col-lg-4 col-form-label ">{{ __('Poštanski broj') }}</label>

            <div class="col-lg-8">
                <input id="number" disabled="" type="number" class="form-control " name="number" value="{{Auth::user()->number}}" required autocomplete="number">


            </div>
        </div>






        <div class="form-group row">
            <label for="email" class="col-lg-4 col-form-label ">{{ __('E-Mail Adresa') }}</label>

            <div class="col-lg-8">
                <input id="email" disabled="" type="email" class="form-control " name="email" value="{{Auth::user()->email}}" required autocomplete="email">


            </div>
        </div>
        <div class="form-group row">
            <label for="promena" class="col-lg-4 col-form-label ">{{ __('UKOLIKO ŽELITE DA PROMENITE NEKU OD GORE NAVEDENIH INFORMACIJA, TO MOŽETE URADITI U OVOM POLJU * ') }}</label>

            <div class="col-lg-8">
                <textarea id="promena"  cols="30" rows="8"  class="form-control " name="promena" ></textarea>

            </div>
        </div>
        <textarea id="maleno" hidden="true"  cols="30" rows="8"  class="form-control" name="maleno" ></textarea>

        <textarea id="velimir" hidden="true"  cols="30" rows="8"  class="form-control" name="velimir" ></textarea>

        <input type="number" hidden="true" id="konacnacena" name="konacnacena">

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-outline-danger">
                    {{ __('POTVRDI NARUDZBINU') }} <i class="fas fa-check"></i>
                </button>
            </div>
        </div>
    </form>
    @endif<br><br><br><br><br><br>
</div>
<div class="col-lg-2 col-md-12"></div>
</div>
</div>





</main>


@endsection