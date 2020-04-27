@extends("content")

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
							<select name="vrsta" id="vrsta" class="form-control">
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
								@foreach($proizvod->bojevels as $boja)
								<option value="{{$boja->boja}}">{{$boja->boja}}</option>
								
								@endforeach

							</select>
						</div><br>
						<div class="text-center">
							<p class="text-danger1 font-weight-bold cenovnik">CENA : <span id="koliko"> @if($proizvod->cena_jedan_sniz == NULL)  {{$proizvod->cena_jedan}} @else {{$proizvod->cena_jedan_sniz}} @endif  </span>RSD</p>
						</p>
					</div>
					<input type="text" value="2" hidden="true" id="ovoje">
					<input type="text" value="{{$proizvod->sifra}}" hidden="true" id="sifra">
					<button type="button" class="btn btn-outline-danger mt-3 korpa" data-id="{{$proizvod->id}}">DODAJ U KORPU <i class="fas fa-shopping-basket"></i> </button>	
				</form>
			</div>
		</div>
		<div class="col-lg-5 col-md-12 col-sm-12 text-center zamobilni">
			<h1> <span class=""> {{$proizvod->podkategorije->naziv}} </span> - <span class="font-italic"> {{$proizvod->naziv}} </span>  </h1> <br> 

			<div class="text-center text-danger1 mrezeneke">
				<a href="" ><i class="fab fa-facebook-square"></i></a> &nbsp; <a href="" ><i class="fab fa-twitter"></i></a>
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