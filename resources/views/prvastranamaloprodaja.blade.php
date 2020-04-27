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
							@foreach($kategorijemalo as $kategorija)
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
<main class="manje"> 

	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-1 col-sm-12 " > </div>
			<div class="col-lg-8 col-md-10 col-sm-12 ">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

					<div class="carousel-inner ">
						@foreach($proizvodi as $v => $proizvod  )
						@if($v == 0)
						<div class="carousel-item active">
							
							
							<img class="d-block w-50 centisi "  src="{{asset('/storage/images/'. $proizvod->slika )}}" alt="$proizvodi->naziv">
							<div class="carousel-caption  text-right pr-3 pl-2 text-muted">
								<div >
									<h6>{{$proizvod->naziv}}</h6>
								</div>

								
							</div>

							<div class="carousel-caption drugi  text-left pl-3 pr-2 text-muted">
								
								<div> 
									
									<h2><del class="text-muted">{{$proizvod->cena_jedan}} DIN </del><br>
										{{$proizvod->cena_jedan_sniz}} DIN</h2>
										
									</div>
								</div>

							</div>
							@else
							<div class="carousel-item ">
								
								
								<img class="d-block w-50 centisi "  src="{{asset('/storage/images/'. $proizvod->slika )}}" alt="$proizvodi->naziv">
								<div class="carousel-caption  text-right pr-3 pl-2 text-muted">
									<div >
										<h6>{{$proizvod->naziv}}</h6>
									</div>

									
								</div>

								<div class="carousel-caption drugi  text-left pl-3 pr-2 text-muted">
									
									<div> 
										
										<h2><del class="text-muted">{{$proizvod->cena_jedan}} DIN </del><br>
											{{$proizvod->cena_jedan_sniz}} DIN</h2>
											
										</div>
									</div>

								</div>
								@endif

								@endforeach
								
								
							</div>
							<a class="carousel-control-prev bg-danger1 manji "  href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only bg-danger1">Previous</span>
							</a>
							<a class="carousel-control-next  bg-danger1 manji"  href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only bg-danger1">Next</span>
							</a>
						</div>
					</div>
					<div class="col-lg-2 col-md-1 col-sm-12 "></div>
				</div>
			</div>

		</main>

		@endsection