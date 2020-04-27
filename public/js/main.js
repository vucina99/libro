$(document).ready(function(){
	$('.loader').fadeOut(1000);

	if(sessionStorage.length == 0){
		$('#myModal').modal('show');
		prozorce();
	}
	$('#myModals').modal('show');
	$("#dodatni").click(openNav);
	$("#close").click(closeNav);
	$("#myInput").keyup(tabela);
	$("#vrsta").change(uzmivrednost);
	$(".korpa").click(dodajukorpu);
	ocitavanjeslikekorpe();

	proverica();

});
function prozorce(){
	sessionStorage.setItem("prikazano", "1");
}
function proverica(){
	if(window.location.href.indexOf('potvrda') > -1 ){

		var url = "/korpa";

		if(JSON.parse(localStorage.getItem("products")) == null){
			$(location).attr('href',url);
		} else if(JSON.parse(localStorage.getItem("products")) != null){
			if(JSON.parse(localStorage.getItem("products")).length == undefined){
				$(location).attr('href',url);
			}if(JSON.parse(localStorage.getItem("products")).length == 0){
				$(location).attr('href',url);
			}else{
				true;
			}
		}

	}
}
function ocitavanjeslikekorpe(){
	if(JSON.parse(localStorage.getItem("products")) == null){
		$(".unutar").html(" <a class='nav-link' href='/korpa'>   <i class='fas fa-cart-arrow-down'></i> 0   </a>");
	} else if(JSON.parse(localStorage.getItem("products")) != null){
		if(JSON.parse(localStorage.getItem("products")).length == undefined){
			$(".unutar").html(" <a class='nav-link' href='/korpa'>   <i class='fas fa-cart-arrow-down'></i> 0   </a>");
		}if(JSON.parse(localStorage.getItem("products")).length == 0){
			$(".unutar").html(" <a class='nav-link' href='/korpa'>   <i class='fas fa-cart-arrow-down'></i> 0   </a>");
		}else{
			$(".unutar").html(" <a class='nav-link' href='/korpa'> <i class='fas fa-cart-arrow-down'></i> " + JSON.parse(localStorage.getItem("products")).length  + " </a>");
		}
	}
}
function uzmivrednost(){
	var vrednost = $(this).val();
	var cifra = vrednost.split(",");
	$("#koliko").html(cifra[0]);
}

function openNav() {
	document.getElementById("mySidenav").style.width = "100%";
	

}


function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}

function tabela() {
	var value = $(this).val().toLowerCase();
	$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
}

function dodajukorpu(){
	let id = $(this).data("id");
	let proizvodi = JSON.parse(localStorage.getItem("products"));
	if(proizvodi){
		if(proizvodialeradyforcard()){
			updatekolicina();
		}else {
			dodajproizvod();
			ocitavanjeslikekorpe()
			
		}
	}else{
		addFirstItemToLocalStorage();
		ocitavanjeslikekorpe()
		
	}

	function proizvodialeradyforcard(){
		let vrednost = $("#vrsta").val();
		let cenaivrsta = vrednost.split(",");
		let vrsta = cenaivrsta[1];
		let boja = $("#boja").val();
		let ovoje = $("#ovoje").val();
		return proizvodi.filter(p=> p.id == id && p.vrsta == vrsta && p.boja == boja && p.ovoje == ovoje  ).length;
	}

	function dodajproizvod() {
		let proizvodi = JSON.parse(localStorage.getItem("products"));
		let vrednost = $("#vrsta").val();
		let cenaivrsta = vrednost.split(",");
		let ovoje = $("#ovoje").val();
		let sifra = $("#sifra").val();
		proizvodi.push({
			id : id,
			quantity : 1,
			boja : $("#boja").val(),
			cena : cenaivrsta[0],
			vrsta : cenaivrsta[1],
			indetifikator : Math.floor(Math.random() * 1000000000) + 1,
			ovoje : ovoje,
			sifra : sifra

			
		});
		localStorage.setItem("products" , JSON.stringify(proizvodi));
	}


	function updatekolicina() {
		let proizvodi = JSON.parse(localStorage.getItem("products"));
		let vrednost = $("#vrsta").val();
		let cenaivrsta = vrednost.split(",");
		let vrsta = cenaivrsta[1];
		let boja = $("#boja").val();
		let ovoje = $("#ovoje").val();
		for(let i in proizvodi)
		{
			if(proizvodi[i].id == id && proizvodi[i].vrsta == vrsta && proizvodi[i].boja == boja && proizvodi[i].ovoje == ovoje ) {
				proizvodi[i].quantity++;
				break;
			}      
		}

		localStorage.setItem("products", JSON.stringify(proizvodi));
	}



	function addFirstItemToLocalStorage() {
		let proizvodi = [];
		let vrednost = $("#vrsta").val();
		let cenaivrsta = vrednost.split(",");
		let ovoje = $("#ovoje").val();
		let sifra = $("#sifra").val();
		proizvodi[0] = {
			id : id,
			quantity : 1,
			boja : $("#boja").val(),
			cena : cenaivrsta[0],
			vrsta : cenaivrsta[1],
			ovoje : ovoje,
			sifra : sifra,
			indetifikator : Math.floor(Math.random() * 1000000000) + 1,
		};
		localStorage.setItem("products", JSON.stringify(proizvodi));
		console.log(JSON.parse(localStorage.getItem("products")));
	}
	
	function clearCart() {
		localStorage.removeItem("products");
	}

}

