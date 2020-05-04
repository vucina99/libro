<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NARUDZBINA</title>
		<meta name="robots" content="noindex">


</head>
<body>
	<strong>Ime i prezime : </strong> {{$obican['name']}} <br>
	<strong>Grad : </strong> {{$obican['city']}} <br>
	<strong>Ulica : </strong> {{$obican['street']}} <br>
	<strong>Broj objekta : </strong> {{$obican['object']}} <br>
	<strong>Poštanski broj : </strong> {{$obican['number']}} <br>
	<strong>E-mail : </strong> {{$obican['email']}} <br>
	<strong>Mobilni : </strong> {{$obican['phone']}} <br><br>

	<fieldset>
		<legend>ISPRAVKA INFORMACIJA</legend><br>
		{{$obican['promena']}} <br>
	</fieldset> <br><br>
	

	<fieldset>
		<legend>NARUDZBINA MALOPRODAJE</legend> <br>
		{!!$obican['maleno']!!}<br><br>
		<h4>UKUPNO : {{$obican['konacnacena']}} DIN </h4>
	</fieldset> <br><br><br>
	


</body>
</html>