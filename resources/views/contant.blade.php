@extends("content")

@section("content")
<header></header>
<main class="kockice1">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-1 col-sm-12"></div>
			<div class="col-lg-6 col-md-10 col-sm-12 belapozadina borderboja"> <br>
				<div class="border-bottom border-light text-center">
					<h5 class="novih5 ">Kontakt <i class="far fa-envelope"></i> </h5>
				</div><br>
				<form action="" method="">
					<div class="form-group">
						<label for="name">Vaše ime : </label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Vaše ime">
					</div>
					<div class="form-group">
						<label for="email">Vaš e-mail : </label>
						<input type="email" class="form-control" id="email" name="email"  placeholder="Vaš e-mail">
						
					</div>
					<div class="form-group">
						<label for="question">Vaše pitanje : </label>
						<textarea name="question" id="question" cols="20" class="form-control" rows="7" placeholder="Vaše pitanje"></textarea>
						
					</div>
					
					<button type="submit" class="btn btn-outline-light crvenp">Pošalji <i class="fas fa-paper-plane"></i> </button>
				</form>
				<br><br>
			</div>
			<div class="col-lg-3 col-md-1 col-sm-12"></div>
		</div>
	</div>
</main>

@endsection