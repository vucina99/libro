<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Libro</title>
	<meta name="robots" content="noindex">

	<link rel="shortcut icon" href="../img/logo.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="/admin"><img src="../img/logo.jpg" alt="Logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="/admin"> MALOPRODAJA </a></li>
					<li class="nav-item active"><a class="nav-link" href="/dodavanjeveliko"> VELEPRODAJA</a></li>
					<li class="nav-item active"><a class="nav-link" href="/dodavanjekategorije"> KATEGORIJA</a></li>
					<li class="nav-item active"><a class="nav-link" href="/dodavanjepodkategorije"> PODKATEGORIJA</a></li>
					<li class="nav-item active"><a class="nav-link" href="/dodavanjekataloga"> KATALOZI</a></li>
					
					<li class="nav-item dropdown active ">

						<a id="navbarDropdown" class="nav-link text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							ADMIN <span class="caret"></span>
						</a>
						
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
			</ul>

		</div>
	</div>

</nav>

@yield("content")

<footer class="bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<img src="../img/logo.jpg" alt="logo" class="img-fluid">
				<ul>
					<li><a href="/legal/register" class="text-decoration-none">PRAVNA LICA <i class="fas fa-sign-in-alt"></i> </a></li>
					<li><a href="/register" class="text-decoration-none">FIZIČKA LICA <i class="fas fa-sign-in-alt"></i> </a></li>
					<li><a href="/kontakt" class="text-decoration-none"> KONTAKT </a></li>
					<li><a href="/korpa" class="text-decoration-none unutar">  </a> </li>
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
<script  src="../js/main.js"></script>
<script src="https://cdn.tiny.cloud/1/b8vfs8y2va5krsbtvpeokju0wqdk0nf6vzf2xego5tokb4vu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		toolbar_mode: 'floating',
	});
</script>
</body>
</html>