@extends("content")

@section("content")
<header>
	<div class="container">
		<div class="row border-siva">
			<div class="col-lg-4 col-md-12 col-sm-12  spustaj  text-center ">

				<div id="mySidenav" class="sidenav bg-dark vise" >
					<div class="container">
						<a href="javascript:void(0)" class="closebtn" id="close" >&times;</a>
						<ul>
							@foreach($kategorijemale as $kategorija)
							<li ><div class="btn-group ">
								<button type="button" class="btn btn-light dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{$kategorija->naziv}}
								</button>
								<div class="dropdown-menu dropdown-menu-center w-200">
									<a class="dropdown-item pr-4" href="/prikazproizvodakategorije/maloprodaja/{{$kategorija->id}}">SVI PROIZVODI KATEGORIJE</a>
									@foreach($kategorija->podkategorijes as $podkategorija)
									<a class="dropdown-item pr-4" href="/prikazproizvoda/maloprodaja/{{$podkategorija->id}}">{{$podkategorija->naziv}}</a>

									@endforeach
								</div>
							</div></li><br>@endforeach 
							<br>
						</ul>
					</div>
				</div>


				<span  id="dodatni" class="text-dark"  >&#9776; PROIZVODI</span>
			</div>
			<div class="col-lg-8 col-md-12 col-sm-12 spustaj1"> 
				<form action="/pretragamaloprodaje" method="GET">
					@csrf
					<div class="form-group d-flex">
						<input type="search" id="pretraga" name="pretraga" placeholder="pretraga proizvoda" class="form-control">
						<button type="submit" class="btn btn-danger pl-5 pr-5">  <i class="fas fa-search"></i> </button>
					</div>
				</form>
			</div>

		</div>
	</div>
</header> 
<main class="cistoae"> 

	<div class="container">
		<div class="row ">
			<div class="col-lg-12  d-flex flex-wrap justify-content-center text-center pt-6 ">
				@if($proizvodi->count() > 0)
				@foreach($proizvodi as $proizvod)
				<div class="card " >
					<div class="container-fluid">
						<div class="row border-siva1">
							<div class="col-3 text-center">
								<a href="/maloprodaja/proizvod/{{$proizvod->id}}" >
									<button class="btn btn-outline-danger btn-sm"><i class="fas fa-align-left "></i></button>

								</a>
							</div>
							<div class="col-6 text-center pt-2">
								<h6>{{$proizvod->kategorije->naziv}}</h6>
							</div>
							<div class="col-3 text-center">



								<form action="" method="" class="d-none">
									<div class="form-group ">
										<label for="vrsta">NARUČIVANJE : </label>
										<select name="vrsta" id="vrsta" class="form-control ">
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
									<div class="form-group ">
										<label for="boja">BOJA : </label>
										<select name="boja" class="form-control" id="boja">
											@foreach($proizvod->bojemalos as $boja)
											<option value="{{$boja->boja}}">{{$boja->boja}}</option>

											@endforeach

										</select>
									</div><br>

									<input type="text" value="1" hidden="true" id="ovoje">
									<input type="text" value="{{$proizvod->sifra}}" hidden="true" id="sifra">	
								</form>

								<button class="btn btn-outline-danger btn-sm korpa"  data-id="{{$proizvod->id}}"><i class="fas fa-shopping-basket "></i></button>




								
								

							</div>
						</div> 
					</div>
					<a href="/maloprodaja/proizvod/{{$proizvod->id}}" class="text-decoration-none">
						<img class="card-img-top" src="{{asset('/storage/images/'. $proizvod->slika )}}" alt="Card image cap img-fluid">
						<div class="card-body">
							<h5 class="card-title text-danger1">{{$proizvod->naziv}}</h5>
							<h6 class="card-text text-dark "><span style="font-size: 12px">{!! Str::limit($proizvod->opis, 38) !!} </span></h6>
							<div class="d-flex justify-content-center ">
								@if($proizvod->cena_jedan_sniz != NULL)
								<p class="font-weight-bold text-danger1 cena">{{$proizvod->cena_jedan_sniz}}  RSD</p>
								<p class="text-dark font-weight-bold pl-2 "><del>{{$proizvod->cena_jedan}}  RSD</del></p>
								@endif
								@if($proizvod->cena_jedan_sniz == NULL)
								<p class="font-weight-bold text-danger1 cena">{{$proizvod->cena_jedan}} RSD</p>
								@endif
							</div>

						</div>
					</a>
				</div>
				@endforeach @else <h3 class="text-muted">NEMA PROIZVODA</h3> @endif
			</div>

		</div>
		<div class="row">
			<div class="col-12 d-flex justify-content-center pt-5 pg-red">
				{{ $proizvodi->links() }}
			</div>
		</div>
	</div>
	<br><br>

</main>

@endsection