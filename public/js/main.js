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
if(window.location.href.indexOf('/legal/register') > -1 ){
   function provera(){
    var name = document.getElementById("name").value;
    var city = document.getElementById("city").value;
    var street = document.getElementById("street").value;
    var object = document.getElementById("object").value;
    var phone = document.getElementById("phone").value;
    var number = document.getElementById("number").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("password-confirm").value;
    var pib = document.getElementById("pib").value;
    var maticni_broj = document.getElementById("maticni_broj").value;
    var fix = document.getElementById("fix").value;
    var regname = /^[A-z]{2,100}$/;
    var regcity = /^[A-z]{2,50}$/;
    var regstreet = /^[A-z]{2,50}$/;
    var regobject = /^[0-9]{1,3}[A-z]{0,4}$/;
    var regphone = /^[0-9]{8,10}$/;
    var regpib = /^[0-9]{9}$/;
    var regmaticni_broj = /^[0-9]{8}$/;
    var regfix = /^$|^[0-9]{4,20}$/;
    var regnumber = /^[0-9]{2,15}$/;
    var regemail =   /^[a-z]+[\.\-\_\!a-z\d]*\@[a-z]{2,10}(\.[a-z]{2,3}){1,2}$/ ;
    var regquestion = /^[A-z\d\-\_\.\:]{2,150}$/;


    if(name == "" || city == "" || street == "" || object == "" || phone == "" || number == "" || email == "" || password == "" || repassword == ""){
        document.getElementById("svapolja").innerHTML = "Molimo Vas popunite sva polja* ";
        return false;

    }else{


        document.getElementById("svapolja").innerHTML = "";

        if(!regname.test(name)){
            document.getElementById("names").innerHTML = "Molimo Vas ispravno unesite Vaše ime * ";
            return false;
        }else if(regname.test(name)){
            document.getElementById("names").innerHTML = "";
            if(!regpib.test(pib)){
                document.getElementById("pibs").innerHTML = "Molimo Vas ispravno unesite PIB firme * ";
                return false;
            }else if(regpib.test(pib)){
                document.getElementById("pibs").innerHTML = "";
                if(!regmaticni_broj.test(maticni_broj)){
                    document.getElementById("maticni_brojs").innerHTML = "Molimo Vas ispravno unesite matični broj firme * ";
                    return false;
                }else if(regmaticni_broj.test(maticni_broj)){
                    document.getElementById("maticni_brojs").innerHTML = "";
                    if(!regcity.test(city)){
                        document.getElementById("citys").innerHTML = "Molimo Vas ispravno unesite Vaš grad * ";
                        return false;
                    }else if(regcity.test(city)){
                        document.getElementById("citys").innerHTML = "";
                        if(!regstreet.test(street)){
                            document.getElementById("streets").innerHTML = "Molimo Vas ispravno unestie Vašu ulicu * ";
                            return false;
                        }else if(regstreet.test(street)){
                            document.getElementById("streets").innerHTML = "";
                            if(!regobject.test(object)){
                                document.getElementById("objects").innerHTML = "Molimo Vas ispravno unestie broj stambenog objekta * ";
                                return false;
                            }else if(regobject.test(object)){
                                document.getElementById("objects").innerHTML = "";
                                if(!regphone.test(phone)){
                                    document.getElementById("phones").innerHTML = "Molimo Vas ispravno unestie Vaš broj mobilnog *";
                                    return false;
                                }else if(regphone.test(phone)){
                                    document.getElementById("phones").innerHTML = "";
                                    if(!regfix.test(fix)){
                                        document.getElementById("fixs").innerHTML = "Molimo Vas ispravno unestie broj fiksnog telefona *";
                                        return false;
                                    }else if(regfix.test(fix)){
                                        document.getElementById("fixs").innerHTML = "";
                                        if(!regnumber.test(number)){
                                            document.getElementById("numbers").innerHTML = "Molimo Vas ispravno unestie Vaš broj mobilnog * ";
                                            return false;
                                        }else if(regnumber.test(number)){
                                            document.getElementById("numbers").innerHTML = "";
                                            if(!regemail.test(email)){
                                                document.getElementById("emails").innerHTML = "Molimo Vas ispravno unestie Vaš poštanski broj * ";
                                                return false;
                                            }else if(regemail.test(email)){
                                                document.getElementById("emails").innerHTML = "";
                                                if(password.length < 8){
                                                    document.getElementById("passwords").innerHTML = "Vaša lozinka mora imati više od 8 karaktera *";
                                                    return false;
                                                }else if(password.length >= 8){
                                                 document.getElementById("passwords").innerHTML = "";

                                                 if(repassword.length < 8){
                                                    document.getElementById("repasswords").innerHTML = "Vaša lozinka mora imati više od 8 karaktera *";
                                                    return false;
                                                }else if(repassword.length >= 8){
                                                   document.getElementById("repasswords").innerHTML = "";

                                                   if(password != repassword){
                                                    document.getElementById("repasswords").innerHTML = "Niste dobro potvrdili lozinku *";
                                                    return false;
                                                }else if (password == repassword){
                                                    document.getElementById("repasswords").innerHTML = "";
                                                }


                                            }


                                        }

                                    }
                                }
                            }
                        }
                    }    
                }   
            }
        }
    }
}

}

}
}



if(window.location.href.indexOf('/register') > -1 ){


    function provera(){
        var name = document.getElementById("name").value;
        var city = document.getElementById("city").value;
        var street = document.getElementById("street").value;
        var object = document.getElementById("object").value;
        var phone = document.getElementById("phone").value;
        var number = document.getElementById("number").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("password-confirm").value;
        var regname = /^[A-z]{2,100}$/;
        var regcity = /^[A-z]{2,50}$/;
        var regstreet = /^[A-z]{2,50}$/;
        var regobject = /^[0-9]{1,3}[A-z]{0,4}$/;
        var regphone = /^[0-9]{8,10}$/;
        var regnumber = /^[0-9]{2,15}$/;
        var regemail =   /^[a-z]+[\.\-\_\!a-z\d]*\@[a-z]{2,10}(\.[a-z]{2,3}){1,2}$/ ;
        var regquestion = /^[A-z\d\-\_\.\:]{2,150}$/;


        if(name == "" || city == "" || street == "" || object == "" || phone == "" || number == "" || email == "" || password == "" || repassword == ""){
            document.getElementById("svapolja").innerHTML = "Molimo Vas popunite sva polja* ";
            return false;

        }else{


            document.getElementById("svapolja").innerHTML = "";
            
            if(!regname.test(name)){
                document.getElementById("names").innerHTML = "Molimo Vas ispravno unesite Vaše ime * ";
                return false;
            }else if(regname.test(name)){
                document.getElementById("names").innerHTML = "";
                if(!regcity.test(city)){
                    document.getElementById("citys").innerHTML = "Molimo Vas ispravno unesite Vaš grad * ";
                    return false;
                }else if(regcity.test(city)){
                    document.getElementById("citys").innerHTML = "";
                    if(!regstreet.test(street)){
                        document.getElementById("streets").innerHTML = "Molimo Vas ispravno unestie Vašu ulicu * ";
                        return false;
                    }else if(regstreet.test(street)){
                        document.getElementById("streets").innerHTML = "";
                        if(!regobject.test(object)){
                            document.getElementById("objects").innerHTML = "Molimo Vas ispravno unestie broj stambenog objekta * ";
                            return false;
                        }else if(regobject.test(object)){
                            document.getElementById("objects").innerHTML = "";
                            if(!regphone.test(phone)){
                                document.getElementById("phones").innerHTML = "Molimo Vas ispravno unestie Vaš broj mobilnog *";
                                return false;
                            }else if(regphone.test(phone)){
                                document.getElementById("phones").innerHTML = "";
                                if(!regnumber.test(number)){
                                    document.getElementById("numbers").innerHTML = "Molimo Vas ispravno unestie Vaš broj mobilnog * ";
                                    return false;
                                }else if(regnumber.test(number)){
                                    document.getElementById("numbers").innerHTML = "";
                                    if(!regemail.test(email)){
                                        document.getElementById("emails").innerHTML = "Molimo Vas ispravno unestie Vaš poštanski broj * ";
                                        return false;
                                    }else if(regemail.test(email)){
                                        document.getElementById("emails").innerHTML = "";
                                        if(password.length < 8){
                                            document.getElementById("passwords").innerHTML = "Vaša lozinka mora imati više od 8 karaktera *";
                                            return false;
                                        }else if(password.length >= 8){
                                         document.getElementById("passwords").innerHTML = "";

                                         if(repassword.length < 8){
                                            document.getElementById("repasswords").innerHTML = "Vaša lozinka mora imati više od 8 karaktera *";
                                            return false;
                                        }else if(repassword.length >= 8){
                                           document.getElementById("repasswords").innerHTML = "";

                                           if(password != repassword){
                                            document.getElementById("repasswords").innerHTML = "Niste dobro potvrdili lozinku *";
                                            return false;
                                        }else if (password == repassword){
                                            document.getElementById("repasswords").innerHTML = "";
                                        }


                                    }


                                }

                            }
                        }
                    }
                }    
            }   
        }
    }



}
}

}

























if(window.location.href.indexOf('/login') > -1 ){


    function provera(){

        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        
        var regemail =   /^[a-z]+[\.\-\_\!a-z\d]*\@[a-z]{2,10}(\.[a-z]{2,3}){1,2}$/ ;


        if( email == "" || password == "" ){
            document.getElementById("svapolja").innerHTML = "Molimo Vas popunite sva polja* ";
            return false;

        }else{


            document.getElementById("svapolja").innerHTML = "";
            
            if(!regemail.test(email)){
                document.getElementById("emails").innerHTML = "Molimo Vas ispravno unestie Vaš poštanski broj * ";
                return false;
            }else if(regemail.test(email)){
                document.getElementById("emails").innerHTML = "";
                if(password.length < 8){
                    document.getElementById("passwords").innerHTML = "Vaša lozinka mora imati više od 8 karaktera *";
                    return false;
                }else if(password.length >= 8){
                 document.getElementById("passwords").innerHTML = "";

             }


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
}

function clearCart() {
  localStorage.removeItem("products");
}

}

