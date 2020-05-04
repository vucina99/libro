<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<meta name="robots" content="noindex">

</head>
<body>


	<div align="center"><br><br>
		<h2 style="font-size:19px; text-transform: uppercase;">Dobro došli <span style="color:#cc0000;">{{$podaci['name']}}</span></h2> 
		<h5 style="font-size:19px; text-transform: uppercase;">Molimo Vas da potvrdite klikom na dugme validnost Vaše e-mail adrese i time aktivirate profil.</h5>
		<a href="http://127.0.0.1:8000/potvrdaFizickeforme/{{$podaci['verifikacija']}}"><button class="btn btn-dark " style="font-size:17px; text-transform: uppercase; background-color:#333333; color:#fff; padding:10px 22px; border:1px solid #cc0000;">POTVRDA VERIFIKACIJE</button></a> <br><br>
		<h5 style=" font-size:19px; text-transform: uppercase;">Unapred zahvalan, <br><span style="color:#cc0000;"> Vaš Libro </span><br><br></h5>
		<div>
			
		</div>
	</div>

</body>
</html>