$(document).ready(function(){
var idViaggio=document.modulo.idViaggio.value;
     $.post( "../data/travel.php",{'travel_data': 1,'idViaggio': idViaggio}, function(response) {
      
      var data= response[0].dataviaggio;
      var partenza =response[0].partenza;
      var oraPartenza= response[0].oPartenza;
      var arrivo  = response[0].arrivo;
      var oraArrivo= response[0].oArrivo;
      var posti = response[0].posti;
      var prezzo = response[0].importo;
      var commento= response[0].commento;
      $('#data').append(data);
       $('#data2').val(response[0].data);
       $('#partenza').append(partenza);
       $('#partenza2').val(partenza);
       $('#oraPartenza').append(oraPartenza);
       $('#oraPartenza2').val(response[0].oraPartenza);
       $('#arrivo').append(arrivo);
       $('#arrivo2').val(arrivo);
       $('#oraArrivo').append(oraArrivo);
       $('#oraArrivo2').val(response[0].oraArrivo);
       $('#passeggeri').append(posti);
       $('#passeggeri2').val(posti);
       $('#importo').append(prezzo);
       $('#importo2').val(prezzo);
       $('#commento').append(commento);

       },'json');

	});		