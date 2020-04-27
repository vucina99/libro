<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


	<div class="text-center text-dark">
		<h2>Dobro došli {{$podaci['name']}}</h2> <br><br>
		<h5>Molimo Vas da potvrdite klikom na dugme validnost Vaše e-mail adrese i time aktivirate profil.</h5><br>
		<a href="http://127.0.0.1:8000/potvrdaLegalforme/{{$podaci['verifikacija']}}"><button class="btn btn-dark">POTVRDA VERIFIKACIJE</button></a> <br><br><br>
		<h5>Unapred zahvalan, <br> Vaš Libro <br><br></h5>
		<img src="img/logo.jpg" alt="">
		<div>
			
		</div>
	</div>

</body>
</html>