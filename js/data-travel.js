$(document).ready(function(){
 
  var partenza;
  var arrivo;
  if(($('#partenza').length)&&$('#arrivo').length===0)
    {
     partenza=$('#partenza').val();
      $.ajax({
			url: 'data/datatravel.php',
			type: 'post',
			data: {
				'partenza_check' : 1,
				'partenza' : partenza,
			},
			success: function(response){
        if(trova(response))
             {
               $('#viaggi').append('funziona ');
             }
         
        
        
      }
  });
      
    }
  else if(($('#arrivo').length)&&$('#partenza').length===0)
  {
     arrivo= $('#arrivo').val();
     $.ajax({
			url: 'data/datatravel.php',
			type: 'post',
			data: {
				'arrivo_check' : 1,
				'arrivo' : arrivo,
			},
			success: function(response){
        if(trova(response))
             {
               alert( response.travel[0].idViaggio[0]);
             }
         
       
      }
  });
    
  }
   else if(($('#arrivo').length)&&$('#partenza').length)
  {
    partenza=$('#partenza').val();
     arrivo= $('#arrivo').val();
    $.post( "data/datatravel.php",{'travel_check': 1,'partenza': partenza,'arrivo':arrivo}, function(response ) {
       if(trova(response))
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
                           var p=" <form action='prove' method='POST'><div class='col-sm-4' style='float:center;'>";
                         var s=" <div class='table-right wow fadeInUp' data-wow-delay='0.4s'><div class='pricing-details'>";
                            var data="<h2>Data :</h2> <span >"+response[i].data+"</span><br>";
                             var viaggio=" <span >"+response[i].partenza+" - "+response[i].oraPartenza+"</span><br> <span >"+response[i].arrivo+" - "+response[i].oraArrivo+"</span>";
                              var aut=" <h2>Dati Conducente :</h2> <span >"+response[i].nome+", "+response[i].dataNascita+"</span><br>";
                             var prex="<span >Prezzo: "+response[i].importo+"€</span><br> <span>"+posti+"</span><br> <button class='btn btn-primary btn-action btn-fill prenotazione' type='submit'>Prenota</button>";
                              var las="</div> </div></div> </form>";
                   var total=p+s+data+viaggio+aut+prex+las;
                   $('#viaggi').append(total);
                 }
               
             }
    
      	},"json");
    
     
    
  }
 
	
	function trova(response)
  {
     if(response==='not_found')
          {
           var mess="<div class='app-features text-center'> <div class='container'><div id='fh5co-contact' class='wow fadeInUp'><div class='col-md-12 wow fadeInDown'>";
           var mess1="<div class='col-md-12 wow fadeInDown text-center' data-wow-delay='0.2s'> <div class='pitch-content text-center'> <h1>Nessun viaggio trovato</h1>";
           var mess2="</div><a href='dashboard/insertviaggio' class='btn btn-action wow fadeInUp' style='visibility: visible; animation-name: fadeInUp;'>Crea un viaggio</a>";
           var mess3="</div></div> </div> </div> </div>";
            $('#viaggi').append(mess+mess1+mess2+mess3);
            return false;
          }
    else{
      return true;
    }
    
  }
	});		