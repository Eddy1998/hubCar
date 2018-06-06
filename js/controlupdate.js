
	$(document).ready(function(){
		
		
		var username_state = false;
		var email_state = false;
    $("#controllouser").on("change keyup paste", function(){
   

		 $('#controllouser').focusout( function(){
		  var username  = $('#controllouser').val();
		  
		  if (username === '') {
			username_state = false;
			return;
		  }
		  $.ajax({
			url: '../data/userdata.php',
			type: 'post',
			data: {
				'username_check' : 1,
				'username' : username,
			},
			success: function(response){
			  if (response == 'taken' ) {
				username_state = false;
			  $('.message').remove();
				$('#username').append("<p class='message' class='row text-center'  style='color:red;'>Username non disponibile</p>");
          setTimeout(function() { $(".message").hide(); }, 3000);
				document.modulo.username.focus();
			  }else if (response == 'not_taken') {
				username_state = true;
				  $('.message').remove();
				$('#username').append("<p class='message'  class='row text-center'  style='color:#1eb858;'>Username disponibile</p>");
              setTimeout(function() { $(".message").hide(); }, 3000);
			  }
			}
		  });
		 });
      });
    
    $("#controlemail").on("change keyup paste", function(){
		  $('#controlemail').focusout( function(){
			var email = $('#controlemail').val();
			
			if (email === '') {
				email_state = false;
				return;
			}
			
			$.ajax({
			  url: '../data/userdata.php',
			  type: 'post',
			  data: {
				'email_check' : 1,
				'email' : email,
			  },
			  success: function(response){
				if (response == 'taken' ) {
				  email_state = false;
				   $('.disp').remove();
					$('#email').append("<p class='disp' class='row text-center'  style='color:red;'>Email non disponibile</p>");
      setTimeout(function() { $(".disp").hide(); }, 3000);
					document.modulo.focus();
					
				}else if (response == 'not_taken') {
				  email_state = true;
					  $('.disp').remove();
					$('#email').append("<p class='disp' class='row text-center'  style='color:#1eb858;'>Username disponibile</p>");
					 setTimeout(function() { $(".disp").hide(); }, 3000);
				}
			  }
			});
		 });
      });   
	});

		
     function Modulo() {
    // Variabili associate ai campi del modulo
    var nome = document.modulo.nome.value;
    var cognome = document.modulo.cognome.value;
    var user = document.modulo.username.value;
    var nascita = document.modulo.datanascita.value;
   
    var telefono = document.modulo.telefono.value;
    var email = document.modulo.email.value;
	
  
     
    
 
    // Espressione regolare dell'email
    var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
      
    //Effettua il controllo sul campo NOME
    if ((nome === "") || (nome === "undefined")) {
       $('.correct').remove();
      $('#nome').append("<div class='correct' class='row text-center' ><p style='color:red;'>Inserire un nome</p></div>");

        document.modulo.nome.focus();
        return false;
    }
    //Effettua il controllo sul campo COGNOME
    else if ((cognome === "") || (cognome === "undefined")) {
        $('.correct').remove();
      
          $('#cognome').append("<div class='correct' class='row text-center' ><p style='color:red;'>Inserire un cognome</p></div>");

        document.modulo.cognome.focus();
        return false;
    }
   //Effettua il controllo sul campo DATA DI NASCITA
    else if (document.modulo.datanascita.value.substring(2,3) != "/" ||
             document.modulo.datanascita.value.substring(5,6) != "/" ||
             isNaN(document.modulo.datanascita.value.substring(0,2)) ||
             isNaN(document.modulo.datanascita.value.substring(3,5)) ||
             isNaN(document.modulo.datanascita.value.substring(6,10))) {
         
     $('.correct').remove();
        $('#nascita').append("<div  class='correct' class='row text-center' ><p style='color:red;'>Inserire data in formato gg/mm/aaaa</p></div>");
        document.modulo.datanascita.select();
        return false;
    }
    else if (document.modulo.datanascita.value.substring(0,2) > 31) {
          $('.correct').remove();
         $('#nascita').append("<div class='correct' class='row text-center' ><p style='color:red;'>Impossibile utilizzare un valore superiore a 31 per i giorni</p></div>");
        document.modulo.datanascita.select();
        return false;
    }
    else if (document.modulo.datanascita.value.substring(3,5) > 12) {
          $('.correct').remove();
      $('#nascita').append("<div class='correct' class='row text-center' ><p style='color:red;'>Impossibile utilizzare un valore superiore a 12 per i mesi</p></div>");
         document.modulo.datanascita.select();
        return false;
    }
    else if (document.modulo.datanascita.value.substring(6,10) < 1900) {
        $('.correct').remove();
       $('#nascita').append("<div class='correct' class='row text-center'><p style='color:red;'>Impossibile utilizzare un valore inferiore a 1900 per l'anno</p></div>");
        document.modulo.datanascita.select();
        return false;
    }


  //effettua il controllo sul campo email
  else if (!email_reg_exp.test(email) || (email === "") || (email == "undefined")) {
          $('.correct').remove();
     $('#email').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Inserire un indirizzo email corretto.</p></div>");
        document.modulo.email.focus();
        return false;
    }
    //Effettua il controllo sul campo username
    else if ((user === "") || (user === "undefined")) {
         $('.correct').remove();
       $('#username').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Inserire un username</p></div>");
        document.modulo.username.focus();
        return false;
    }
     else if ((user.length)<4)  {
         $('.correct').remove();
       $('#username').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Username: minimo 4 caratteri</p></div>");
        document.modulo.user.focus();
        return false;
    }
   //Effettua il controllo sul campo TELEFONO
    else if ((isNaN(telefono)) || (telefono === "") || (telefono == "undefined")) {
        $('.correct').remove();
         $('#telefono').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Inserire un numero telefonico</p></div>");
        document.modulo.telefono.value = "";
        document.modulo.telefono.focus();
        return false;
    }
   else if (((telefono.length)<10)||((telefono.length)>10)) {
          $('.correct').remove();
      $('#telefono').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Il telefono deve contenere 10 numeri</p></div>");
        document.modulo.telefono.value = "";
        document.modulo.telefono.focus();
        return false;
    }
	 else if (telefono.match(/[a-z]/i)) {
          $('.correct').remove();
      $('#telefono').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Non deve contenere lettere</p></div>");
        document.modulo.telefono.value = "";
        document.modulo.telefono.focus();
        return false;
    }
   //INVIA IL MODULO
  else {
        document.modulo.action = "../dashboard/updateprofile.php";
        document.modulo.submit();
    }
}	