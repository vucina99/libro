$(document).ready(function () {


 if(JSON.parse(localStorage.getItem("products")) == null){
     showEmptyCart();
 } else if(JSON.parse(localStorage.getItem("products")) != null){
    if(JSON.parse(localStorage.getItem("products")).length == undefined){
        showEmptyCart();
    }else if(JSON.parse(localStorage.getItem("products")).length == 0){
        showEmptyCart();
    }
    else{
        displayCartData();
    }
}


if(window.location.href.indexOf('potvrda') > -1 ){
    ispisivanjevrednosti();
    $("#konacnacena").val(racunanje1());
}
});








function ispisivanjevrednosti(){
    let nizmaloprodaje = [];
    let nizveleprodaje = [];
    let proizvodi = productsInCart();
    proizvodi.forEach(partizan => {
        if(partizan.ovoje == 1){
           nizmaloprodaje.push(partizan)
       }else if(partizan.ovoje == 2){
           nizveleprodaje.push(partizan)
       }
   })

    if(nizmaloprodaje.length != 0){
        $.ajax({
            url : "http://127.0.0.1:8000/json",
            method : "GET",
            type : "json",
            success : function(data) {
                let nizkart = [];
                
                nizmaloprodaje.forEach(f => {
                    data.data.filter(c => {
                        if(f.id == c.id){
                            nizkart.push(f);
                            f.product = c;
                        }
                    });
                    
                });
                ispisivanjemalenoo(nizkart);
            },

            error : function(){
                console.log("ne radi");
            }
        });
    }

    if(nizveleprodaje.length != 0){
        $.ajax({
            url : "http://127.0.0.1:8000/jsons",
            method : "GET",
            type : "json",
            success : function(data) {
                let nizkarts = [];
                
                nizveleprodaje.forEach(f => {
                    data.data.filter(c => {
                        if(f.id == c.id){
                            nizkarts.push(f);
                            f.product = c;
                        }
                    });
                });
                ispisivanjevelimir(nizkarts);
            },

            error : function(){
                console.log("ne radi");
            }
        });
    }}



    function ispisivanjemalenoo(nizkart){
        let value = ``;
        nizkart.forEach(idemosad => {
            value += `${idemosad.sifra} x ${idemosad.quantity} x ${vrstas(idemosad.vrsta)} , ${idemosad.product.naziv} (${idemosad.boja}) - ${idemosad.cena} DIN ( ${staje(idemosad.ovoje)} )
            <hr/> `;
            
        });

        $("#maleno").val(value);

    }

    function ispisivanjevelimir(nizkarts){
        let value = ``;
        nizkarts.forEach(idemosad => {
            value += `${idemosad.sifra} x ${idemosad.quantity} x ${vrstas(idemosad.vrsta)} , ${idemosad.product.naziv} (${idemosad.boja}) - ${idemosad.cena} DIN ( ${staje(idemosad.ovoje)} )
            <hr/> `;
            
        });

        $("#velimir").val(value);

    }




    function displayCartData() {
        let nizmaloprodaje = [];
        let nizveleprodaje = [];
        let proizvodi = productsInCart();
        proizvodi.forEach(partizan => {
            if(partizan.ovoje == 1){
               nizmaloprodaje.push(partizan)
           }else if(partizan.ovoje == 2){
               nizveleprodaje.push(partizan)
           }
       })

        if(nizmaloprodaje.length != 0){
            $.ajax({
                url : "http://127.0.0.1:8000/json",
                method : "GET",
                type : "json",
                success : function(data) {
                    let nizkart = [];
                    
                    nizmaloprodaje.forEach(f => {
                        data.data.filter(c => {
                            if(f.id == c.id){
                                nizkart.push(f);
                                f.product = c;
                            }
                        });
                        
                    });
                    generateTable(nizkart);
                },

                error : function(){
                    console.log("ne radi");
                }
            });
        }

        if(nizveleprodaje.length != 0){
            $.ajax({
                url : "http://127.0.0.1:8000/jsons",
                method : "GET",
                type : "json",
                success : function(data) {
                   let nizkart = [];
                   
                   nizveleprodaje.forEach(f => {
                    data.data.filter(c => {
                        if(f.id == c.id){
                            nizkart.push(f);
                            f.product = c;
                        }
                    });
                    
                });
                   if(nizmaloprodaje.length == 0){
                       trecatabla(nizkart);
                   }else{
                    drugatabla(nizkart);
                }
            },

            error : function(){
                console.log("ne radi");
            }
        });
        }





    }

    function ocitavanjeslikekorpe(){
     if(JSON.parse(localStorage.getItem("products")) == null){
        $(".unutar").html(" <a class='nav-link' href='/korpa'>   <i class='fas fa-cart-arrow-down'></i> 0   </a>");
    } else if(JSON.parse(localStorage.getItem("products")) != null){
        if(JSON.parse(localStorage.getItem("products")).length == undefined){
            $(".unutar").html(" <a class='nav-link' href='/korpa'>   <i class='fas fa-cart-arrow-down'></i> 0   </a>");
        }else{
            $(".unutar").html(" <a class='nav-link' href='/korpa'> <i class='fas fa-cart-arrow-down'></i> " + JSON.parse(localStorage.getItem("products")).length  + " </a>");
        }
    }
}
function generateTable(proizvodi) {
    let html = `<ul class="list-group">


    <li class="list-group-item text-center bg-dark text-light">
    

    <div class="container-fluid">
    <div class="row ">
    
    <div class="col-4 border-left border-right d-flex align-items-center justify-content-center">
    IME PROIZVODA
    </div>
    <div class="col-4 border-left border-right d-flex align-items-center justify-content-center">KOLIČINA</div>
    <div class="col-2 border-left border-right d-flex align-items-center justify-content-center">CENA</div>

    <div class="col-2 border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
    <i class="fas fa-trash-alt"></i>
    </div>
    </div>
    </div>


    </li>`;
    
    for(let p of proizvodi) {
        html += generateTr(p);
    }

    html +=`  
    <div id="nestodrugo"></div>
    <li class="list-group-item">
    <div class="container">
    <div class="row pt-2 sveee">
    <div class="col-4 pt-3">
    <a href="/dalje"> <button class="btn btn-outline-dark klik"> NARUČI <i class="fas fa-check"></i> </button></a>
    </div>
    <div class="col-4 text-center pt-3">
    <button class="btn btn-dark brisii"> OBRISI SVE <i class="fas fa-trash"></i> </button>
    </div>
    <div class="col-4 text-right ">
    <span class="text-dark mb-4  font-weight-bold ukupno" id="ukupno">  </span>
    </div>
    </div>
    </div>
    </li>      </ul> <br/><br/><br/>`;

    $("#content").html(html);
    racunanje();
    $(".radi").blur(menjanjecene);
    $(".brisii").click(brisisve);
    function generateTr(p) {



        return `
        <li class="list-group-item">
        <div class="container-fluid">
        <div class="row ">
        <div class="col-4 pt-3 border-left border-right d-flex align-items-center justify-content-center">
        <a href="maloprodaja/proizvod/${p.id}-${pretvranjetexta(p.product.naziv)}" class="text-decoration-none"> <p>${p.product.naziv} <br/>(${p.boja},${vrstas(p.vrsta)}) </p></a>
        </div>
        <div class="col-4 border-left border-right d-flex align-items-center justify-content-center text-dark ">
        <input type="number"  min="1" max="1000"  value="${p.quantity}" data-id="${p.indetifikator}" class="text-center form-control radi">
        </div>
        <div class="col-2 pt-3 border-left border-right d-flex align-items-center justify-content-center text-dark">
        <p>${p.cena}</p>
        </div>

        
        <div class="col-2 pt-1 text-dark border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
        <div class=""><button onclick='removeFromCart(${p.indetifikator})' class="btn btn-dark">X</button> </div>

        </div>
        </div>
        </div>
        </li>
        
        `;
    }
}




function pretvranjetexta(text){
    let radi = text.split(" ");
    let moze = radi.join("-")
    return moze;
}









function trecatabla(proizvodi) {
    let html = `<ul class="list-group">


    <li class="list-group-item text-center bg-dark text-light">
    

    <div class="container-fluid">
    <div class="row ">
    
    <div class="col-4 border-left border-right d-flex align-items-center justify-content-center">
    IME PROIZVODA
    </div>
    <div class="col-4 border-left border-right d-flex align-items-center justify-content-center">KOLIČINA</div>
    <div class="col-2 border-left border-right d-flex align-items-center justify-content-center">CENA</div>

    <div class="col-2 border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
    <i class="fas fa-trash-alt"></i>
    </div>
    </div>
    </div>


    </li>`;
    
    for(let p of proizvodi) {
        html += generateTr(p);
    }

    html +=`  
    <div id="nestodrugo"></div>
    <li class="list-group-item">
    <div class="container">
    <div class="row pt-2 sveee">
    <div class="col-4 pt-3">
    <a href="/dalje"><button class="btn btn-outline-dark klik"> NARUČI <i class="fas fa-check"></i> </button></a>
    </div>
    <div class="col-4 text-center pt-3">
    <button class="btn btn-dark brisii"> OBRISI SVE <i class="fas fa-trash"></i> </button>
    </div>
    <div class="col-4 text-right ">
    <span class="text-dark mb-4  font-weight-bold ukupno" id="ukupno">  </span>
    </div>
    </div>
    </div>
    </li>      </ul> <br/><br/><br/>`;

    $("#content").html(html);
    racunanje();
    $(".radi").blur(menjanjecene);
    $(".brisii").click(brisisve);
    function generateTr(p) {



        return `
        <li class="list-group-item">
        <div class="container-fluid">
        <div class="row ">
        <div class="col-4 pt-3 border-left border-right d-flex align-items-center justify-content-center">
        <a href="veleprodaja/proizvod/${p.id}-${pretvranjetexta(p.product.naziv)}" class="text-decoration-none"> <p>${p.product.naziv} <br/>(${p.boja},${vrstas(p.vrsta)}) </p></a>
        </div>
        <div class="col-4 border-left border-right d-flex align-items-center justify-content-center text-dark ">
        <input type="number"  min="1" max="1000"  value="${p.quantity}" data-id="${p.indetifikator}" class="text-center form-control radi">
        </div>
        <div class="col-2 pt-3 border-left border-right d-flex align-items-center justify-content-center text-dark">
        <p>${p.cena}</p>
        </div>

        
        <div class="col-2 pt-1 text-dark border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
        <div class=""><button onclick='removeFromCart(${p.indetifikator})' class="btn btn-dark">X</button> </div>

        </div>
        </div>
        </div>
        </li>
        
        `;
    }
}












function drugatabla(proizvodi) {
    let html = ``;
    
    for(let p of proizvodi) {
        html += `
        <li class="list-group-item">
        <div class="container-fluid">
        <div class="row ">
        <div class="col-4 pt-3 border-left border-right d-flex align-items-center justify-content-center">
        <a href="veleprodaja/proizvod/${p.id}-${pretvranjetexta(p.product.naziv)}" class="text-decoration-none"> <p>${p.product.naziv} <br/>(${p.boja},${vrstas(p.vrsta)}) </p></a>
        </div>
        <div class="col-4 border-left border-right d-flex align-items-center justify-content-center text-dark ">
        <input type="number"  min="1" max="1000"  value="${p.quantity}" data-id="${p.indetifikator}" class="text-center form-control radi">
        </div>
        <div class="col-2 pt-3 border-left border-right d-flex align-items-center justify-content-center text-dark">
        <p>${p.cena}</p>
        </div>

        
        <div class="col-2 pt-1 text-dark border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
        <div class=""><button onclick='removeFromCart(${p.indetifikator})' class="btn btn-dark">X</button> </div>

        </div>
        </div>
        </div>
        </li>
        
        `;
    }

    $("#nestodrugo").html(html);
    $(".radi").blur(menjanjecene);
    $(".brisii").click(brisisve);

}



function vrstas(vrsta){
    if(vrsta==1){
        return 'POJEDINAČAN PROIZVOD';
    }else if(vrsta==2){
        return 'PAKET';
    }
}

function staje(ovoje){
    if(ovoje==1){
        return 'MALOPRODAJA';
    }else if(ovoje==2){
        return 'VELEPRODAJA';
    }
}
function showEmptyCart() {
 





  let html = `<ul class="list-group">


  <li class="list-group-item text-center bg-dark text-light">
  

  <div class="container-fluid">
  <div class="row ">
  <div class="col-2 border-left border-right justify-content-center">SLIKA </div>
  <div class="col-4 border-left border-right d-flex align-items-center justify-content-center">
  IME PROIZVODA
  </div>
  <div class="col-3 border-left border-right d-flex align-items-center justify-content-center">KOLIČINA</div>
  <div class="col-2 border-left border-right d-flex align-items-center justify-content-center">CENA</div>
  
  <div class="col-1 border-left border-right  d-flex align-items-center justify-content-right justify-content-center">
  <i class="fas fa-trash-alt"></i>
  </div>
  </div>
  </div>


  </li>
  <li class="list-group-item text-center  text-dark">
  
  <h4>KORPA JE PRAZNA - <a href="/"><button class="btn btn-outline-dark">PRONADJI PROIZVOD</button> </a></h4>
  


  </li>
  

  </ul>`;

  $("#content").html(html);


}



function menjanjecene() {
    let proizvodi = JSON.parse(localStorage.getItem("products"));
    var id = $(this).data("id");
    var idemoo = $(this).val();
    for(let i in proizvodi)
    {
        if(proizvodi[i].indetifikator == id) {
            if(idemoo < 1){
                idemoo = 1;
            }else if(idemoo > 300){
                idemoo = 300;
            }
            proizvodi[i].quantity = idemoo;
            $("#ukupno").load("/korpa");
            
            break;
        }      
    }

    localStorage.setItem("products", JSON.stringify(proizvodi));
}


function brisisve(){
    localStorage.setItem("products", JSON.stringify(0));
    $(".list-group").load("/korpa");


}




function racunanje(){
    var broj = 0;


    var proizvodi = productsInCart();

    proizvodi.forEach(racunaj => {
      
        broj += racunaj['cena'] * racunaj['quantity'];  
    });

    $("#ukupno").html("<h2>" + broj + "DIN</h2>");
}

function racunanje1(){
    var broj = 0;


    var proizvodi = productsInCart();

    proizvodi.forEach(racunaj => {
      
        broj += racunaj['cena'] * racunaj['quantity'];  
    });

    return broj;
}

function productsInCart(){
 return JSON.parse(localStorage.getItem("products"));
}



function removeFromCart(indetifikator) {
    let proizvodi = productsInCart();
    let filtered = proizvodi.filter(p => p.indetifikator != indetifikator);
    
    localStorage.setItem("products", JSON.stringify(filtered));
    ocitavanjeslikekorpe()
    displayCartData();

    if(productsInCart().length == 0){
       showEmptyCart();
   }
}




