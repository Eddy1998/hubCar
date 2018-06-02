$(document).ready(function(){
 
		$.post( "../data/dataprofile.php", function(response ) {
        var profilo = response.user.nome+" "+response.user.cognome;
        var nome =response.user.nome;
      var cognome= response.user.cognome;
      var sesso =response.user.sesso;
      var nascita=response.user.dataNascita;
      var email= response.user.email;
      var telefono= response.user.telefono;
      var datareg= response.user.dataregistrazione;
      var patente;
      var automobile;
      var nazionalita= response.user.nazionalita;
       $("#profilo").append(profilo);
				  $("#nome").append(nome);
          $("#cognome").append(cognome);
      $('#sesso').append(sesso);
      $('#nascita').append(nascita);
      $('#email').append(email);
      $('#telefono').append(telefono);
     $('#dataregistrazione').append(datareg);
       $('#nazionalita').append(nazionalita);
      if(!response.user.patente)
        {
          patente="Patente non registrata";
        }
      else {
        patente=response.user.patente;
      }
      $('#patente').append(patente);
      if(response.user.automobile==='no')
        {
          automobile= "nessun auto registrato"
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