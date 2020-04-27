@extends("content")

@section("content")
<header></header> 
<main class=""><br><br><br><br><br><br>
	<div class="container ">
		<div class="row ">

			<div class="col-lg-12 col-md-12 col-sm-12 " >

				@if (session('status'))

				<div class="alert alert-danger  alert-dismissible fade show" role="alert">
					<strong> {{ session('status') }}  </strong> DA BI NASTAVILI DALJE, MORATE SE ULOGOVATI KAO <a href="/register" class="text-decoration-none"> <strong class="text-muted"> FIZIČKO LICE </strong></a> ILI <a href="/legal/register" class="text-decoration-none"><strong class="text-muted">PRAVNO LICE</strong><a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
				</div>
			</div>
			<div class="row ">

				<div class="col-lg-12 col-md-12 col-sm-12 " id="content">
					<div id="pera"></div>
				</div>			
			</div>	
		</div>	
	</main>
</main>

@endsection