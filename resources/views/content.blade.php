<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Libro</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="../../img/logo.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<div id="myModal" class="modal fade" role="dialog"  >
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header d-flex justify-content-center">
					<h4 class="modal-title ">Dobro došli na sajt, vaš Libro</h4>
				</div>
				<div class="modal-body  text-center"><br>
					<p>Ovde možete pronaći kompletan asortiman školskog i kancelarijskog materijala. </p>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">ZATVORI</button>
				</div>
			</div>

		</div>
	</div>
	<div class="loader"></div> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/"><img src="../../img/logo.jpg" alt="Logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					@if(Request::path() == "/")
					@if(!(Auth::check() || Auth::guard("legal")->check()))
					<li class="nav-item active linija">
						<a class="nav-link" href="/legal/register">PRAVNA LICA <i class="fas fa-sign-in-alt"></i>  </a>
					</li>
					<li class="nav-item active linija">
						<a class="nav-link" href="/register"> FIZIČKA LICA <i class="fas fa-sign-in-alt"></i>  </a>
					</li>
					<li class="nav-item active unutar ">
						
					</li>
					@endif
					@endif
					@if(Request::path() != "/")
					<li class="nav-item active linija">
						<a class="nav-link" href="#"> VELEPRODAJA(KATALOG)  <i class="fas fa-download"></i>  </a>
					</li>
					<li class="nav-item active linija">
						<a class="nav-link" href="#"> MALOPRODAJA(KATALOG) <i class="fas fa-download"></i>  </a>
					</li>
					<li class="nav-item active unutar ">
						
					</li>
					@endif
					@if(Auth::check() || Auth::guard("legal")->check())
					@if(Request::path() == "/")
					<li class="nav-item active unutar linija">
						
					</li>
					<li class="nav-item dropdown active  ">
						@if(Auth::check())
						<a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						
						<script
						src="https://code.jquery.com/jquery-3.4.1.js"
						integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
						crossorigin="anonymous"></script>
						<script>

							$(document).ready(function(){
								var product = JSON.parse(localStorage.getItem("products"));

								product.forEach(moz => {
									if(moz.ovoje == 2){
										
										removeFromCart(moz.indetifikator);

										

									}
								});
								
								function removeFromCart(indetifikator) {
									let proizvodi = productsInCart();
									let filtered = proizvodi.filter(p => p.indetifikator != indetifikator);
									
									localStorage.setItem("products", JSON.stringify(filtered));
								}
								console.log(product);
							});

						</script>
						@endif
						@if(Auth::guard("legal")->check())
						<a id="navbarDropdown" class="nav-link text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::guard("legal")->user()->name }} <span class="caret"></span>
						</a>
						@endif
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>

				@endif
				@endif
			</ul>

		</div>
	</div>

</nav>

@yield("content")

<footer class="bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<img src="../../img/logo.jpg" alt="logo" class="img-fluid">
				<ul>
					<li><a href="" class="text-decoration-none">PRAVNA LICA <i class="fas fa-sign-in-alt"></i> </a></li>
					<li><a href="" class="text-decoration-none">FIZIČKA LICA <i class="fas fa-sign-in-alt"></i> </a></li>
					<li><a href="" class="text-decoration-none"> MALOPRODAJA </a> </li>
					<li><a href="" class="text-decoration-none"> VELEPRODAJA</a></li>
					<li><a href="" class="text-decoration-none"> KONTAKT </a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<h1>INFORMACIJE</h1>
				<ul>
					<li><a href="" class="text-decoration-none"> USLOVI KORISĆENJA </a></li>
					<li><a href="" class="text-decoration-none"> POLITIKA PRICATNOSTI </a></li>
					<li><a href="" class="text-decoration-none"> NAČIN PLAĆANJA </a> </li>
					<li><a href="" class="text-decoration-none"> REKLAMACIJE </a></li>
					<li><a href="" class="text-decoration-none"> PRAVA POTROŠAČA </a></li>
					<li><a href="" class="text-decoration-none"> O NAMA </a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<h2>VAŽNO</h2>
				<ul class="nista">
					<li class="pb-2"> <span>BESPLATNA DOSTAVA</span> ZA PORUDZBINE PREKO 4000 NA TERITORIJI NOVOG SADA.</li> 
					<li><span>100% POVRAĆAJ NOVCA</span> UKOLIKO PROJZVOD NIJE U SKLADU SA DATIM OPISOM.</li>
					
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<h3>KONTAKT</h3>
				<ul class="moze">
					<li class="ph"> <i class="fas fa-mobile "></i> +381616523408 </li>
					<li class="ph"> <i class="fas fa-envelope"></i> libro.direktor@gmail.com </li>
					<li class="ph"> <i class="fas fa-envelope"></i> libro.prodaja@gmail.com </li>
					<li class="pb-2 "> <i class="fas fa-envelope"></i> libro.reklamacije@gmail.com  </li>
					
					<li> <a href=""  class="text-decoration-none"> <i class="fab fa-facebook-square fa-2x"></i> </a> &nbsp; <a href=""  class="text-decoration-none"> <i class="fab fa-instagram fa-2x"></i>  </a> </li>
				</ul>				
			</div>
		</div> 
		<div class="row">
			<div class="col-lg-12 text-center spusti">
				<hr class="bg-light">
				<h4 class="text-light"> Copyright © 2020 Libro Vuk Zdravkovic. All Rights Reserved. Credits: Vuk Zdravković <i class="fas fa-sitemap"></i> </h4>
			</div>
		</div>
	</div>
</footer>




<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script  src="../../js/main.js"></script>
<script  src="../../js/cart.js"></script>
</body>
</html>