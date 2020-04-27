@extends("content")


@section("content")

<header>
	
</header>
<main class="kockice1"><br><br>
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if (session('maloprodaja'))

				<div class="alert alert-warning  alert-dismissible fade show" role="alert">
					<strong> {{ session('maloprodaja') }}  </strong> DA BI NARUČIVALI U VELEPRODAJI MORATE BITI ULOGOVANI KAO PRAVNO LICE.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				@endif
				@if (Session::has( 'status1' ))

				<div id="myModals" class="modal fade" role="dialog"  >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header d-flex justify-content-center">
								<h4 class="modal-title ">{{ Session::get( 'status1' ) }} ! </h4>
							</div>
							<div class="modal-body  text-center"><br>
								<p>NAKON STE USPEŠNO IZVRŠILI KUPOVINU, ZA INFORMACIJE O NARUDZBINI PROVERITE VAŠ E-MAIL.</p>
								<script>localStorage.setItem("products", JSON.stringify(0));</script>
								<br>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">ZATVORI</button>
							</div>
						</div>

					</div>
				</div>
				@endif











			</div>
		</div>
		<div class="row">
			<div class="col-lg-1 col-md-12 col-sm-12">
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 crna " ><a href="/snizeniproizvodi/maloprodaja" class="text-decoration-none d-flex align-items-center justify-content-center"><h5>MALOPRODAJA <i class="fas fa-shopping-basket"></i> </h5></a>
				
			</div>
			<div class="col-lg-2 col-md-12 col-sm-12">
				<br>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 crna " >
				<a href="/snizeniproizvodi/veleprodaja" class="text-decoration-none d-flex align-items-center justify-content-center"><h6>VELEPRODAJA <i class="fas fa-shopping-cart"></i> </h6></a>
			</div>
			<div class="col-lg-1 col-md-12 col-sm-12"><br><br><br><br><br>
			</div>
		</div>
	</div>
</main>
@endsection
