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
				<form action="/slanjeporuke" method="POST" >
					@csrf
					@if ($errors->any())
					<div class="alert alert-danger">
						
						@foreach ($errors->all() as $error)
							<div class="text-danger1">{{$error}} *</div>
						@endforeach
						<br>
						</div>
					@endif

				@if (session('kontak'))

                <div class="alert alert-light  alert-dismissible fade show" role="alert">
                 <strong > {{ session('kontak') }}  </strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

            @endif
            <div id="sve"></div>
					<div class="form-group">
						<label for="name">Vaše ime : </label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Vaše ime">
						<span id="names" class="greska"></span>
					</div>
					<div class="form-group">
						<label for="email">Vaš e-mail : </label>
						<input type="email" class="form-control" id="email" name="email"  placeholder="Vaš e-mail">
						<span id="emails" class="greska"></span>
					</div>
					<div class="form-group">
						<label for="question">Vaše pitanje : </label>
						<textarea name="question" id="question" cols="20" class="form-control" rows="7" placeholder="Vaše pitanje"></textarea>
						<span id="questions" class="greska"></span>
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

<!-- <script>
	    function potvrdi(){

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var question = document.getElementById("question").value;
        var regname = /^[A-z]{2,100}$/;
        var regemail =   /^[a-z]+[\.\-\_\!a-z\d]*\@[a-z]{2,10}(\.[a-z]{2,3}){1,2}$/ ;
        var regquestion = /^[A-z\d\-\_\.\:]{2,150}$/;


        if(name == "" || email == "" || question = ""){
            document.getElementById("sve").innerHTML = "MORATE POPUNITI SVA POLJA *";
            return false;
        }else{
            document.getElementById("sve").innerHTML = "";
            if(!regname.test(name)){
                document.getElementById("names").innerHTML = "MOLIMO VAS DA ISPRAVNO UNESETE VAŠE IME";
                return false;
            }else if(regname.test(name)){
               document.getElementById("names").innerHTML = "";
               if(!regemail.test(email)){
                document.getElementById("emails").innerHTML = "MOLIMO VAS DA ISPRAVNO UNESETE VAŠ E-MAIL";
                return false;
                }else if(regemail.test(email)){
                 document.getElementById("emails").innerHTML = "";
                 if(!regquestion.test(question)){
                document.getElementById("questions").innerHTML = "MOLIMO VAS DA ISPRAVNO UNESETE VAŠE PITANJE";
                return false;
                }else if(regquestion.test(question)){
                 document.getElementById("questions").innerHTML = "";

            }
            }
            }
        }


}
</script> -->