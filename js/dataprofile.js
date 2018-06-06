$(document).ready(function(){
 
		$.post( "../data/dataprofile.php", function(response ) {
        
        var nome =response.user.nome;
      var cognome= response.user.cognome;
      var sesso =response.user.sesso;
      var nascita=response.user.dataNascita;
      var email= response.user.email;
      var telefono= response.user.telefono;
      var datareg= response.user.dataregistrazione;
      var username= response.user.username;
      var patente;
      var automobile;
      var nazionalita= response.user.nazionalita;
       $("#profilo").append(nome);
				 $("#nome").append(nome);
         $("#cognome").append(cognome);
      $('#sesso').append(sesso);
      $('#nascita').append(nascita);
      $('#email').append(email);
      $('#telefono').append(telefono);
     $('#dataregistrazione').append(datareg);
       $('#nazionalita').append(nazionalita);
      $('#username').append(username);
       $("#nome2").val(nome);
      $("#cognome2").val(cognome);
       $('#sesso2').val(sesso);
       $('#nascita2').val(nascita);
      $('#email2').val(email);
      $('#telefono2').val(telefono);
     $('#data2').val(datareg);
       $('#nazionalita2').val(nazionalita);
      $('#username2').val(username);
      if(!response.user.patente)
        {
          patente="Patente non registrata";
          $('#patente2').val(null);
        }
      else {
        patente=response.user.patente;
      }
      $('#patente').append(patente);
      $('#patente2').val(patente);
      if(response.user.automobile==='no')
        {
          automobile= "<div class='feature-single'>  <p style='font-size:15px'>Nessun automobile registrato</p> </div>"
           $('#automobile').append(automobile);
        }
      else
        {
         for(i=0;i<response.user.automobile.length;i++)
            {
              automobile= "<div class='feature-single'>  <h1>Marca</h1> <p style='font-size:15px'>"+response.user.automobile[i].marca +"</p> </div> <div class='feature-single'>   <h1>Modello</h1>   <p style='font-size:15px'>"+response.user.automobile[i].modello+", "+response.user.automobile[i].anno+"</p> <hr> </div>"
              $('#automobile').append(automobile);
            }
        }
         
          
			  
			},"json");
		 
	});		