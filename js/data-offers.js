$(document).ready(function(){

 
            //messaggio viaggio non trovato
            var mess="<div class='app-features text-center'> <div class='container'><div id='fh5co-contact' class='wow fadeInUp'><div class='col-md-12 wow fadeInDown'>";
           var mess1="<div class='col-md-12 wow fadeInDown text-center' data-wow-delay='0.2s'> <div class='pitch-content text-center'> <h1>Nessun viaggio trovato</h1>";
           var mess2="</div><a href='dashboard/insertviaggio' class='btn btn-action wow fadeInUp' style='visibility: visible; animation-name: fadeInUp;'>Crea un viaggio</a>";
           var mess3="</div></div> </div> </div> </div>";
            var messtotal= mess+mess1+mess2+mess3;
            //fine messaggio
 
     $.post( "../data/travel.php",{'offers': 1}, function(response) {
          if(response==="not_found") 
            {
             
              $('#viaggi').append(messtotal);
            }
             else
             {
               
   
               var posti;
               for(i=0;i<response.length;i++)
                 {
                   if(response[i].posti===1)
                     {
                        posti=response[i].posti+" posto disponibile";
                     }
                   else
                     {
                        posti=response[i].posti+" posti disponibili";
                     }
                          var p="<form action='mod-travel' method='POST'><div style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<span >"+response[i].dataviaggio+"</span><br>";
                             var viaggio=" <span >"+response[i].partenza+" - "+response[i].arrivo+"</span><br> <span >"+response[i].oPartenza+"</span><br>";
                             
                             var prex="<span >Prezzo: "+response[i].importo+"€</span><br> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Modifica</button>";
                              var las="</div> </div></div> </form>";
                  var total=p+s+data+viaggio+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
         
       },'json');

	});		