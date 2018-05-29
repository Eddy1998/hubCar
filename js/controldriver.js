
	$(document).ready(function(){
		$('#password').YIWpasswordStrongTester();
		
		var username_state = false;
		var email_state = false;
		 $('#controllouser').focusout( function(){
		  var username  = $('#controllouser').val();
		  
		  if (username === '') {
			username_state = false;
			return;
		  }
		  $.ajax({
			url: '../hubCar/data/username.php',
			type: 'post',
			data: {
				'username_check' : 1,
				'username' : username,
			},
			success: function(response){
			  if (response == 'taken' ) {
				username_state = false;
				$('.correct').remove();
				$('#username').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Username non disponibile</p></div>");
				document.modulo.user.focus();
			  }else if (response == 'not_taken') {
				username_state = true;
				 $('.correct').remove();
				$('#username').append("<div class='correct' class='row text-center' ><p id='correct' style='color:green;'>Username disponibile</p></div>");
			  }
			}
		  });
		 });		
		  $('#controlemail').focusout( function(){
			var email = $('#controlemail').val();
			
			if (email === '') {
				email_state = false;
				return;
			}
			
			$.ajax({
			  url: '../hubCar/data/username.php',
			  type: 'post',
			  data: {
				'email_check' : 1,
				'email' : email,
			  },
			  success: function(response){
				if (response == 'taken' ) {
				  email_state = false;
				 $('.correct').remove();
					$('#email').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Email non disponibile</p></div>");
					document.modulo.email.focus();
					
				}else if (response == 'not_taken') {
				  email_state = true;
					$('.correct').remove();
					$('#email').append("<div class='correct' class='row text-center'><p id='correct' style='color:green;'>Email disponibile</p></div>");
					
				}
			  }
			});
		 });

	});

		
     function Modulo() {
    // Variabili associate ai campi del modulo
    var nome = document.modulo.nome.value;
    var cognome = document.modulo.cognome.value;
    var user = document.modulo.user.value;
    var password = document.modulo.password.value;
    var conferma = document.modulo.conferma.value;
    var nascita = document.modulo.nascita.value;
    var nazionalita = document.modulo.nazionalita.options[document.modulo.nazionalita.selectedIndex].value;
    var telefono = document.modulo.telefono.value;
    var email = document.modulo.email.value;
	var patente= document.modulo.patente.value;
    var scadenzaPatente=document.modulo.scadenzaPatente.value;
      var arr = scadenzaPatente.split("/");
      var gg =arr[0];
      var mm=arr[1];
      var aaaa=arr[2];
     var preimpostata = new Date(aaaa, mm-1, gg); 
    var oggi = new Date();
     var space= " ";
    var diff = preimpostata.getTime()  - oggi.getTime();
     
    
 
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
    else if (document.modulo.nascita.value.substring(2,3) != "/" ||
             document.modulo.nascita.value.substring(5,6) != "/" ||
             isNaN(document.modulo.nascita.value.substring(0,2)) ||
             isNaN(document.modulo.nascita.value.substring(3,5)) ||
             isNaN(document.modulo.nascita.value.substring(6,10))) {
         
     $('.correct').remove();
        $('#nascita').append("<div  class='correct' class='row text-center' ><p style='color:red;'>Inserire data in formato gg/mm/aaaa</p></div>");
        document.modulo.nascita.value = "";
        document.modulo.nascita.focus();
        return false;
    }
    else if (document.modulo.nascita.value.substring(0,2) > 31) {
          $('#correct').remove();
         $('#nascita').append("<div class='correct' class='row text-center' ><p style='color:red;'>Impossibile utilizzare un valore superiore a 31 per i giorni</p></div>");
        document.modulo.nascita.select();
        return false;
    }
    else if (document.modulo.nascita.value.substring(3,5) > 12) {
          $('.correct').remove();
      $('#nascita').append("<div class='correct' class='row text-center' ><p style='color:red;'>Impossibile utilizzare un valore superiore a 12 per i mesi</p></div>");
        document.modulo.nascita.value = "";
        document.modulo.nascita.focus();
        return false;
    }
    else if (document.modulo.nascita.value.substring(6,10) < 1900) {
        $('.correct').remove();
       $('#nascita').append("<div class='correct' class='row text-center'><p style='color:red;'>Impossibile utilizzare un valore inferiore a 1900 per l'anno</p></div>");
        document.modulo.nascita.value = "";
        document.modulo.nascita.focus();
        return false;
    }
   //Effettua il controllo sul campo Nazionalita
    else if ((nazionalita === "") || (nazionalita === "undefined")) {
        $('.correct').remove();
      $('#nazionalita').append("<div class='correct' class='row text-center' ><p style='color:red;'>Selezionare una nazionalitNazionali&#224;</p></div>");
        document.modulo.nazionalita.focus();
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
        document.modulo.user.focus();
        return false;
    }
    //Effettua il controllo sul campo PASSWORD
    else if ((password === "") || (password === "undefined")) {
        $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Inserire una password</p></div>");
        document.modulo.password.focus();
        return false;
    }
	else if (password.indexOf(space) > -1) {
     $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password non deve avere spazi</p></div>");
        document.modulo.password.focus();
	} 
	else if (!(password.match(/\d/))) {
		 $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno un numero</p></div>");
        document.modulo.password.focus();
	}
	else if (!(password.match(/^[a-zA-Z]+/))) {
		 $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve iniziare con almeno una lettera</p></div>");
        document.modulo.password.focus();
	}
	else if (!(password.match(/[A-Z]/))) {
      $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno una lettera maiuscola</p></div>");
        document.modulo.password.focus();
	}
	else if (!(password.match(/[a-z]/))) {
    $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno una lettera minuscola</p></div>");
        document.modulo.password.focus();
	}
	else if (!(password.match(/\W+/))) {
     $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno un carattere speciale</p></div>");
        document.modulo.password.focus();
	}
	else if (!((password.length) >= 8)) {
    $('.correct').remove();
       $('#senha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere mininìmo 8 caratteri</p></div>");
        document.modulo.password.focus();
	}
	
    //Effettua il controllo sul campo CONFERMA PASSWORD
    else if ((conferma === "") || (conferma === "undefined")) {
        $('.correct').remove();
        $('#confsenha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Inserire la password di conferma</p></div>");
        document.modulo.conferma.focus();
        return false;
    }
    //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
    else if (password != conferma) {
  $('.correct').remove();
       $('#confsenha').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Le password non coincidono</p></div>");
        document.modulo.conferma.focus();
        document.modulo.conferma.value = "";
        document.modulo.conferma.focus();
        return false;
    }
   //Effettua il controllo sul campo TELEFONO
    else if ((isNaN(telefono)) || (telefono === "") || (telefono == "undefined")) {
        $('.correct').remove();
         $('#telefono').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Inserire un numero telefonico</p></div>");
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
	//Effettua il controllo sul campo PATENTE
    else if ((patente === "") || (patente === "undefined")) {
        $('.correct').remove();
      
          $('#patente').append("<div class='correct' class='row text-center' ><p style='color:red;'>Inserire il numero della tua patente</p></div>");
        document.modulo.patente.focus();
        return false;
    }
  //Controllo sulla scandenza patente
    else if (document.modulo.scadenzaPatente.value.substring(2,3) != "/" ||
             document.modulo.scadenzaPatente.value.substring(5,6) != "/" ||
             isNaN(document.modulo.scadenzaPatente.value.substring(0,2)) ||
             isNaN(document.modulo.scadenzaPatente.value.substring(3,5)) ||
             isNaN(document.modulo.scadenzaPatente.value.substring(6,10))) {
        $('.correct').remove();
          $('#scandenza').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Inserire la Scadenza della Patente in formato gg/mm/aaaa</p></div>");
        document.modulo.scadenzaPatente.value = "";
        document.modulo.scadenzaPatente.focus();
        return false;
    }
    else if (document.modulo.nascita.value.substring(0,2) > 31) {
        $('.correct').remove();
       $('#scadenza').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Impossibile utilizzare un valore superiore a 31 per i giorni</p></div>");
        
        document.modulo.scadenzaPatente.select();
        return false;
    }
    else if (document.modulo.scadenzaPatente.value.substring(3,5) > 12) {
        $('.correct').remove();
         $('#scadenza').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Impossibile utilizzare un valore superiore a 12 per i mesi</p></div>");
        document.modulo.scadenzaPatente.value = "";
        document.modulo.scadenzaPatente.focus();
        return false;
    }
    else if (document.modulo.scadenzaPatente.value.substring(6,10) < 1900) {
        $('.correct').remove();
       $('#scadenza').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Impossibile utilizzare un valore inferiore a 1900 per l'anno</p></div>");
        document.modulo.scadenzaPatente.value = "";
        document.modulo.scadenzaPatente.focus();
        return false;
    }
     
    //Se la data preimpostata è già passata
    else if(diff<0||diff==0){
        $('.correct').remove();
      $('#scadenza').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Impossibile inserire patente scaduta</p></div>");
       document.modulo.scadenzaPatente.value = "";
        document.modulo.scadenzaPatente.focus();
        return false;
    }
   //INVIA IL MODULO
  else {
        document.modulo.action = "Aesito.php";
        document.modulo.submit();
    }
}	