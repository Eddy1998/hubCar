function Controllo() {
    // Variabili associate ai campi del modulo
    var dataViaggio = document.modulo.dataViaggio.value;
    var partenza = document.modulo.partenza.value;
   var oraPartenza = document.modulo.oraPartenza.value;
   var arrivo = document.modulo.arrivo.value;
   var oraArrivo = document.modulo.oraArrivo.value; 
  var costo=document.modulo.costo.value; 
  var oggi = document.modulo.oggi.value;
   
    if ((dataViaggio === "") || (dataViaggio === "undefined")) {
       $('.correct').remove();
      $('#datamsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire la data</p>");
        document.modulo.dataViaggio.focus();
        
    }
 else  if(Date.parse(dataViaggio)<Date.parse(oggi))
    {
      $('.correct').remove();
      $('#datamsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire una data corretta</p>");
        document.modulo.dataViaggio.focus();
    }
    
   else if ((partenza === "") || (partenza === "undefined")) {
        $('.correct').remove();
      
          $('#partenzamsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire partenza</p>");

        document.modulo.partenza.focus();
        return false;
    }
   else if ((oraPartenza === "") || (oraPartenza === "undefined")) {
        $('.correct').remove();
      
          $('#oraPartenzamsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire l'ora di partenza</p>");

        document.modulo.oraPartenza.focus();
        return false;
    }
   else if ((arrivo === "") || (arrivo === "undefined")) {
        $('.correct').remove();
      
          $('#arrivomsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire citta' d'arrivo</p>");

        document.modulo.arrivo.focus();
        return false;
    } 
  else if (arrivo===partenza) {
        $('.correct').remove();
      
          $('#arrivomsg').append("<p class='correct' class='row text-center' style='color:red;'>Le città non possono essere uguali</p>");

        document.modulo.arrivo.focus();
        return false;
    } 
  else if ((oraArrivo === "") || (oraArrivo === "undefined")) {
        $('.correct').remove();
      
          $('#oraArrivomsg').append("<p class='correct' class='row text-center' style='color:red;'>Inserire l'ora d'arrivo stimata</p>");

        document.modulo.oraArrivo.focus();
        return false;
    }

   else if ((costo === "") || (costo === "undefined")) {
        $('.correct').remove();
      
          $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Inserire il prezzo per ogni passeggero</p>");

        document.modulo.costo.focus();
        return false;
    }
  else if (!(costo.match(/\d/))) {
		 $('.correct').remove();
      $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Il prezzo deve contenere solo numeri</p>");

        document.modulo.costo.focus();
	}
  else if ((costo.match(/^[a-zA-Z]+/))) {
		 $('.correct').remove();
        $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Il prezzo deve contenere solo numeri</p>");

        document.modulo.costo.focus();
	}
	else if ((costo.match(/[A-Z]/))) {
      $('.correct').remove();
       $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Il prezzo deve contenere solo numeri</p>");

        document.modulo.costo.focus();
	}
	else if ((costo.match(/[a-z]/))) {
    $('.correct').remove();
      $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Il prezzo deve contenere solo numeri</p>");

        document.modulo.costo.focus();
	}
	else if ((costo.match(/\W+/))) {
     $('.correct').remove();
       $('#costo').append("<p class='correct' class='row text-center' style='color:red;'>Il prezzo deve contenere solo numeri</p>");

        document.modulo.costo.focus();
	}
	
  else {
        document.modulo.action = "../dashboard/create-travel";
        document.modulo.submit();
    }
}	