@extends("content")
@section("seo")
	<title>Libro Shop NS - Maloprodaja | {{$proizvod->naziv}}</title>
	<meta name="keywords" content="{{$proizvod->naziv}},{{$proizvod->kategorije->naziv}},{{$proizvod->podkategorije->naziv}} ,maloprodaja " />

	<meta name="description" content="" />

	<meta property="og:title" content="Libro Shop NS - Maloprodaja | {{$proizvod->naziv}}" />
	
	<meta property="og:keywords" content="{{$proizvod->naziv}},{{$proizvod->kategorije->naziv}},{{$proizvod->podkategorije->naziv}} ,maloprodaja" />

	<meta property="og:description" content="" />
	
@endsection
@section("content")
<header></header>
<main class="bezkockica"> 
	<div class="container proizvodnja">
		<div class="row">
			<div class="col-lg-1 col-md-12 col-sm-12"></div>
			<div class="col-lg-5 col-md-12 col-sm-12 text-center">
				<img src="{{asset('/storage/images/'. $proizvod->slika )}}" alt="Slika proizvoda" class="img-fluid border "> <br><br><br>

				<div class="postavke">
					<form action="" method="">
						<div class="form-group">
							<label for="vrsta">NARUČIVANJE : </label>
							<select name="" id="vrsta" class="form-control">
								@if($proizvod->cena_jedan_sniz == NULL)
								<option value="{{$proizvod->cena_jedan}},1">Jedan proizvod</option>
								<option value="{{$proizvod->cena_paket}},2">Celo pakovanje</option>
								@endif
								@if($proizvod->cena_jedan_sniz != NULL)
								<option value="{{$proizvod->cena_jedan_sniz}},1">Jedan proizvod</option>
								<option value="{{$proizvod->cena_paket_sniz}},2">Celo pakovanje</option>
								@endif
							</select>
						</div>

						<div class="form-group">
							<label for="boja">BOJA : </label>
							<select name="boja" class="form-control" id="boja">
								@foreach($proizvod->bojemalos as $boja)
								<option value="{{$boja->boja}}">{{$boja->boja}}</option>
								
								@endforeach

							</select>
						</div><br>
						<div class="text-center">
							<p class="text-danger1 font-weight-bold cenovnik">CENA : <span id="koliko"> @if($proizvod->cena_jedan_sniz == NULL)  {{$proizvod->cena_jedan}} @else {{$proizvod->cena_jedan_sniz}} @endif  </span> RSD</p>
						</p>
					</div>
					<input type="text" value="1" hidden="true" id="ovoje">

					<input type="text" value="{{$proizvod->sifra}}" hidden="true" id="sifra">

					<button type="button" class="btn btn-outline-danger mt-3 korpa" data-id="{{$proizvod->id}}">DODAJ U KORPU <i class="fas fa-shopping-basket"></i> </button>	
				</form>
			</div>
		</div>
		<div class="col-lg-5 col-md-12 col-sm-12 text-center zamobilni">
			<h1> <span class=""> {{$proizvod->podkategorije->naziv}} </span> - <span class="font-italic"> {{$proizvod->naziv}} </span>  </h1> <br> 

			<div class="text-center text-danger1 mrezeneke">
				<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{$proizvod->path()}} ' , 'Facebook share'); return false;"><i class="fab fa-facebook-square"></i></a> &nbsp; 

				<a href="https://twitter.com/share?url=" onclick="window.open('https://twitter.com/share?url={{$proizvod->path()}}&text=LIBRO SHOP - ' , 'Twitter share'); return false;" ><i class="fab fa-twitter"></i></a>
			</div>


			<br>
			<p class="text-dark font-italic pl-2 pr-2 ">
				{!!$proizvod->opis!!}

			</p> 
			@if($proizvod->cena_jedan_sniz != NULL)
			<strong class="text-danger1 ">Jedan proizvod - {{$proizvod->cena_jedan_sniz}} RSD <span class="text-dark"> <del>{{$proizvod->cena_jedan}} RSD</del> </span></strong> <br>
			@endif
			@if($proizvod->cena_jedan_sniz == NULL)
			<strong class="text-danger1 ">Jedan proizvod - {{$proizvod->cena_jedan}} RSD </strong> <br>
			@endif
			@if($proizvod->cena_paket_sniz != NULL)
			<strong class="text-danger1">Celo pakovanje - {{$proizvod->cena_paket_sniz}} RSD <span class="text-dark"> <del>{{$proizvod->cena_paket}} RSD</del> </span></strong>
			@endif
			@if($proizvod->cena_paket_sniz == NULL)
			<strong class="text-danger1">Celo pakovanje - {{$proizvod->cena_paket}} RSD </strong>
			@endif
			<br><br><br>

			<strong class="text-dark"> SIFRA PROIZVODA : {{$proizvod->sifra}} <strong class="text-dark">
			</div>
			<div class="col-lg-1 col-md-12 col-sm-12"></div>

		</div>
	</div>
</main>

@endsection