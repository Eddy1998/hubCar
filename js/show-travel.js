$(document).ready(function(){
var idViaggio=document.modulo.idViaggio.value;
    var d = new Date();
    var anno = d.getFullYear();

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
        for(i=0;i<posti;i++)
          {
            var box= " <div  class='col-md-2 wow fadeInDown text-center' data-wow-delay='0.2s'> <div class='feature-single'> <h1 style='color:#1eb858'>Passeggero</h1><div class='feature-single'> <h2 id='"+i+"' class='nomedelpass'>Vuoto</h2> </div></div></div>";
            $('#compagni').append(box);
          }
       var idDriver= response[0].idAutista;
        $.post( "../data/data-driver.php",{'data_driver': 1,'idDriver': idDriver}, function(risposta) {
               
                  var nome =risposta.user.nome;
                  var nascita=risposta.user.dataNascita;
                    var datareg= risposta.user.dataregistrazione;
                  var automobile;
                 var arr = nascita.split("/");
                    var aaaa=arr[2];
                    var eta = anno-aaaa;
                   if(risposta.user.automobile==='no')
                    {
                      automobile="Nessun automobile registrato"
                       $('#auto').append(automobile);
                    }
                  else
                    {
                     for(i=0;i<risposta.user.automobile.length;i++)
                        {
                          automobile=risposta.user.automobile[i].marca+", "+risposta.user.automobile[i].modello;
                          $('#auto').append(automobile);
                        }
                    }
          $('#nome').append(nome+", "+eta+" anni");
          $('#conducente').append(nome+", "+eta+" anni");
         
         
          $('#dataregistrazione').append(datareg);
          
        },'json');
        $.post( "../data/travel.php",{'pass_in_travel': 1,'viaggio': idViaggio}, function(ans) {
         
              if(ans==='not_found'){
              }else{
                    for(i=0;i<ans.length;i++)
                      {
                        var nascita=ans[i].dataNascita;     
                        var arr = nascita.split("/");
                        var aaaa=arr[2];
                        var eta = anno-aaaa;
                        $('#'+i).empty();
                        $('#'+i).append(ans[i].nome+", "+eta+" anni");
                        
                      }
              }
          $('#bottonedanger').click(function(){
                if(ans!=='not_found')
                  {
                    alert("non puoi eliminare un viaggio con prenotazioni avviate");
                  }
                  else{ 
                      if (confirm("Confermi di eliminare il tuo viaggio?")) {
                          {
                           document.modulo.action = "../dashboard/delete-travel.php";
                           document.modulo.submit();
                         }
                      } 
                  }

          });
        },'json');
       
       },'json');
       
  

	});		