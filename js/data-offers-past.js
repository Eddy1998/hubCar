$(document).ready(function(){

 
            //messaggio viaggio non trovato
            var mess="<div class='app-features text-center'> <div class='container'><div id='fh5co-contact' class='wow fadeInUp'><div class='col-md-12 wow fadeInDown'>";
           var mess1="<div class='col-md-12 wow fadeInDown text-center' data-wow-delay='0.2s'> <div class='pitch-content text-center'> <h1>Nessun viaggio trovato</h1>";
           var mess2="</div></div></div> </div> </div> </div>";
            var messtotal= mess+mess1+mess2;
            //fine messaggio

     $.post("../data/travel.php",{'offers_past': 1}, function(response) {
       
          if(response==="not_found") 
            {
              $('#viaggi').append(messtotal);
            }
             else
             {

               var posti;
               for(i=0;i<response.length;i++)
                 {
                   if(response[i].postidisponibili==='1')
                     {
                        posti=response[i].postidisponibili+" posto disponibile";
                     }
                   else
                     {
                        posti=response[i].postidisponibili+" posti disponibili";
                     }
                          var p="<form action='show-travel-past' method='POST'><div style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<span style='font-size: 18px;font-weight: 600; color: #1eb858;    margin-bottom: 30px;   text-transform: uppercase'>Data : </span><span>"+response[i].dataviaggio+"</span><br>";
                             var viaggio="<span style='font-size: 18px;font-weight: 600; color: #1eb858;    margin-bottom: 30px;   text-transform: uppercase'>Tragitto : </span> <span >"+response[i].partenza+" - "+response[i].arrivo+"</span><br><span style='font-size: 18px;font-weight: 600; color: #1eb858;    margin-bottom: 30px;   text-transform: uppercase'>Ora : </span> <span >"+response[i].oPartenza+"</span><br>";               
                             var prex="<span style='font-size: 18px;font-weight: 600; color: #1eb858;    margin-bottom: 30px;   text-transform: uppercase'>Importo : </span> <span>"+response[i].importo+"€</span><br><span style='font-size: 18px;font-weight:600; color: #1eb858;margin-bottom: 30px;   text-transform: uppercase'>Posti : </span> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Visualizza</button>";
                              var las="</div> </div></div>  <input type='hidden' name='idviaggio' value='"+response[i].idViaggio+"'></form>";
                  var total=p+s+data+viaggio+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
         
       },'json');

	});		