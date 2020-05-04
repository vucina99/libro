@extends("contentverification")

@section("content")
<header></header>
<main class="bezkockica"> 
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-1 col-sm-12"></div>
			<div class="col-lg-6 col-md-10 col-sm-12 bg-dark text-light  border-danger1 p-5">
				@if (session('uspeh'))

				<div class="alert alert-success  alert-dismissible fade show" role="alert">
					<strong> {{ session('uspeh') }}  </strong> .
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				@endif
				<p>DA BI NASTAVILI DALJE MORATE VERIFIKOVATI VAS NALOG, AKO VAM NIJE STIGAO MAIL SA UPUSTVOM, MOLIM VAS DA KLIKNETE NA LINK</p>
					<div class="d-flex justify-content-start">	
					@if(Auth::check())
					<form action="/ponovnoslanjekodafiz" method="post" class="p-0">
						@csrf
						<input type="text" name="name" hidden="" value="{{Auth::user()->name}}" id="name">
						<input type="text"  hidden="" value="{{Auth::user()->verifikacija}}" name="verifikacija" id="verifikacija">
						<input type="email"  hidden="" value="{{Auth::user()->email}}" name="email" id="email">
						<input type="submit" class="btn btn-link p-0 text-left" value="PONOVO POŠALJI MAIL ZA VERIFIKACIJU">
					</form>
					@endif
					@if(Auth::guard("legal")->check())
					<form action="/ponovnoslanjekodalegal" method="post" class="p-0">
						@csrf
						<input type="text" hidden="" name="name" value="{{Auth::guard('legal')->user()->name}}" id="name">
						<input type="text" hidden="" value="{{Auth::guard('legal')->user()->verifikacija}}" name="verifikacija" id="verifikacija">
						<input type="email"  hidden="" value="{{Auth::guard('legal')->user()->email}}" name="email" id="email">
						<input type="submit" class="btn btn-link p-0 text-left" value="PONOVO POŠALJI MAIL ZA VERIFIKACIJU">
					</form>
					@endif  
					</div>  <br>   
				<p>Unapred zahvalan, Vaš Libro ! 
			</p>
				<img src="../img/logo.jpg" alt="">
			</div>
			<div class="col-lg-3 col-md-1 col-sm-12"></div>
		</div>
	</div>
</main>

@endsection