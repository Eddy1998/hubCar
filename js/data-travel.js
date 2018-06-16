$(document).ready(function(){
  var partenza;
  var arrivo;
   var d = new Date();
    var anno = d.getFullYear();
            //messaggio viaggio non trovato
            var mess="<div class='app-features text-center'> <div class='container'><div id='fh5co-contact' class='wow fadeInUp'><div class='col-md-12 wow fadeInDown'>";
           var mess1="<div class='col-md-12 wow fadeInDown text-center' data-wow-delay='0.2s'> <div class='pitch-content text-center'> <h1>Nessun viaggio trovato</h1>";
           var mess2="</div><a href='dashboard/insertviaggio' class='btn btn-action wow fadeInUp' style='visibility: visible; animation-name: fadeInUp;'>Crea un viaggio</a>";
           var mess3="</div></div> </div> </div> </div>";
            var messtotal= mess+mess1+mess2+mess3;
            //fine messaggio
  if(($('#partenza').length)&&$('#arrivo').length===0)
    {
      
      var partenzaP=$('#partenza').val();
     $.post( "data/datatravel.php",{'partenza_check': 1,'partenza':partenzaP}, function(response) {
      
     
          if(response==="not_found") 
            {
              $('#viaggi').append(messtotal);
            }
              else
             {
                
              
               var posti;
               for(i=0;i<response.length;i++)
                 {
                    var arr = response[i].dataNascita.split("/");
                      var aaaa=arr[2];
                      var nascita= anno-aaaa;
                 
                   
                   if(response[i].postidisponibili==='1')
                     {
                        posti=response[i].postidisponibili+" posto disponibile";
                     }
                   else
                     {
                        posti=response[i].postidisponibili+" posti disponibili";
                     }
                           var p=" <form action='prenota-viaggio' method='POST'><div class='col-sm-4' style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<h2>Data :</h2> <span >"+response[i].dataviaggio+"</span><br>";
                             var viaggio=" <span >"+response[i].partenza+" - "+response[i].oPartenza+"</span><br> <span >"+response[i].arrivo+" - "+response[i].oArrivo+"</span>";
                              var aut=" <h2>Dati Conducente :</h2> <span >"+response[i].nome+", "+nascita+" anni</span><br>";
                             var prex="<span >Prezzo: "+response[i].importo+"€</span><br> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Prenota</button>";
                              var las="</div> </div></div><input type='hidden' name='idviaggio' value='"+response[i].idViaggio+"'> </form>";
                   var total=p+s+data+viaggio+aut+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
         
       },"json");
 
      
    }
   if(($('#arrivo').length)&&$('#partenza').length===0)
  {
     var arrivoA= $('#arrivo').val();
       $.post( "data/datatravel.php",{'arrivo_check': 1,'arrivo':arrivoA}, function(response) {
          if(response==="not_found") 
          {
             $('#viaggi').append(messtotal);
          }
          else
             {
               var posti;
               for(i=0;i<response.length;i++)
                 {
                   if(response[i].postidisponibili===1)
                     {
                        posti=response[i].postidisponibili+" posto disponibile";
                     }
                   else
                     {
                        posti=response[i].postidisponibili+" posti disponibili";
                     }
                           var p=" <form action='prenota-viaggio' method='POST'><div class='col-sm-4' style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<h2>Data :</h2> <span >"+response[i].dataviaggio+"</span><br>";
                             var viaggio=" <span >"+response[i].partenza+" - "+response[i].oPartenza+"</span><br> <span >"+response[i].arrivo+" - "+response[i].oArrivo+"</span>";
                              var aut=" <h2>Dati Conducente :</h2> <span >"+response[i].nome+", "+response[i].dataNascita+"</span><br>";
                             var prex="<span >Prezzo: "+response[i].importo+"€</span><br> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Prenota</button>";
                              var las="</div> </div></div> <input type='hidden' name='idviaggio' value='"+response[i].idViaggio+"'> </form>";
                   var total=p+s+data+viaggio+aut+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
         
       },"json");
    
  }
  if(($('#arrivo').length)&&$('#partenza').length)
  {
  
     var partenzaT=$('#partenza').val();
     var arrivoT= $('#arrivo').val();
    $.post( "data/datatravel.php",{'travel': true,'partenzaT': partenzaT,'arrivoT':arrivoT}, function(response) {
          
         if(response=='not_found')
          {
              $('#viaggi').append(messtotal);
          }
          else
             {
               var posti;
               for(i=0;i<response.length;i++)
                 {
                   if(response[i].postidisponibili===1)
                     {
                        posti=response[i].postidisponibili+" posto disponibile";
                     }
                   else
                     {
                        posti=response[i].postidisponibili+" posti disponibili";
                     }
                           var p=" <form action='prenota-viaggio' method='POST'><div class='col-sm-4' style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<h2>Data :</h2> <span >"+response[i].dataviaggio+"</span><br>";
                             var viaggio=" <span >"+response[i].partenza+" - "+response[i].oPartenza+"</span><br> <span >"+response[i].arrivo+" - "+response[i].oArrivo+"</span>";
                              var aut=" <h2>Dati Conducente :</h2> <span >"+response[i].nome+", "+response[i].dataNascita+"</span><br>";
                             var prex="<span >Prezzo: "+response[i].importo+"€</span><br> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Prenota</button>";
                              var las="</div> </div></div><input type='hidden' name='idviaggio' value='"+response[i].idViaggio+"'>  </form>";
                   var total=p+s+data+viaggio+aut+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
    
      	},"json");
    
  }

	});		