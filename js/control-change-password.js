$(document).ready(function(){
		$('#password').YIWpasswordStrongTester();
});

function Modulo() {
    // Variabili associate ai campi del modulo
    var oldpassword = document.modulo.oldpassword.value;
    var newpassword = document.modulo.newpassword.value;
    var confpassword = document.modulo.confpassword.value;
       var space= " ";
   
    if ((oldpassword === "") || (oldpassword === "undefined")) {
       $('.correct').remove();
      $('#pass').append("<div class='correct' class='row text-center' ><p style='color:red;'>Inserire password</p></div>");

        document.modulo.oldpassword.focus();
        return false;
    }
    
    else if ((newpassword === "") || (newpassword === "undefined")) {
        $('.correct').remove();
      
          $('#newpass').append("<div class='correct' class='row text-center' ><p style='color:red;'>Inserire una nuova password</p></div>");

        document.modulo.newpassword.focus();
        return false;
    }
   
	else if (newpassword.indexOf(space) > -1) {
     $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password non deve avere spazi</p></div>");
        document.modulo.newpassword.focus();
	} 
	else if (!(newpassword.match(/\d/))) {
		 $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno un numero</p></div>");
        document.modulo.newpassword.focus();
	}
	else if (!(newpassword.match(/^[a-zA-Z]+/))) {
		 $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve iniziare con almeno una lettera</p></div>");
        document.modulo.newpassword.focus();
	}
	else if (!(newpassword.match(/[A-Z]/))) {
      $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno una lettera maiuscola</p></div>");
         document.modulo.newpassword.focus();
	}
	else if (!(newpassword.match(/[a-z]/))) {
    $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno una lettera minuscola</p></div>");
        document.modulo.newpassword.focus();
	}
	else if (!(newpassword.match(/\W+/))) {
     $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere almeno un carattere speciale</p></div>");
        document.modulo.newpassword.focus();
	}
	else if (((newpassword.length) < 8)) {
    $('.correct').remove();
       $('#newpass').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>La tua password deve avere mininìmo 8 caratteri</p></div>");
       document.modulo.newpassword.focus();
	}
	
   
   
   
   
  else if ((confpassword === "") || (confpassword == "undefined")) {
          $('.correct').remove();
     $('#conferma').append("<div class='correct' class='row text-center'><p id='correct' style='color:red;'>Conferma la nuova password</p></div>");
        document.modulo.confpassword.focus();
        return false;
    }
    //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
    else if (confpassword != newpassword) {
  $('.correct').remove();
       $('#conferma').append("<div class='correct' class='row text-center' ><p id='correct' style='color:red;'>Le password non coincidono</p></div>");
       
        document.modulo.confpassword.value="";
        document.modulo.confpassword.focus();
        return false;
    }
   
   //INVIA IL MODULO
  else {
        document.modulo.action = "../dashboard/updatepassword.php";
        document.modulo.submit();
    }
}	