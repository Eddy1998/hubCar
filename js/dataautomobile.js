$(document).ready(function(){
    $('#add-car, #insert-auto, #cancel-add,#autodata, #marca, #pmarca, #modello, #pmodello, #anno, #panno, #targa, #ptarga, #config-option, #update-car, #cancel-update, #delete-car, .lab').hide();

  $.post( "../data/dataprofile.php", function(response ) {
        
        var nome =response.user.nome;
     
      var automobile;
     
       $("#profilo").append(nome);
				 $("#nome").append(nome);

      if(response.user.automobile==='no')
        {
          automobile= "<div id='mex' class='row'>  <p style='font-size:15px'>Nessun automobile registrato</p> </div>"
          $('#add-car').toggle();
           $('#bottoni').append(automobile);
           $('#add-car').click(function(){
                 //funzioni da fare quando non ce l'auto
              $('#insert-auto,#cancel-add,#add-car,#autodata,.lab,#marca,#modello,#anno,#targa,#mex').toggle();
             
           });
           $('#insert-auto').click(function(){
             	      var marca=document.modulo.marca.value;
                    var modello= document.modulo.modello.value;
                    var anno= document.modulo.anno.value;
                    var targa=document.modulo.targa.value;
                
                 if ((marca === "") || (marca === "undefined")) {
                  $('.correct').remove();
                   $('#marcamsg').append("<p class='correct' style='color:red;'>Inserire una marca di auto</p>");

                    document.modulo.marca.focus();
                   return false;
                   }
             else if((modello === "") || (modello === "undefined")) {
                  $('.correct').remove();
                   $('#modellomsg').append("<p class='correct' style='color:red;'>Inserire un modello</p>");

                    document.modulo.modello.focus();
                   return false;
                   }
             else if((anno === "") || (anno === "undefined")) {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Inserire anno dell'auto</p>");

                    document.modulo.anno.focus();
                   return false;
                   }
             else if(anno.length>4||anno.length<4)
               {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Inserire anno correttamente</p>");

                    document.modulo.anno.focus();
                   return false;
               }
                else if(anno.match(/[a-z]/i))
                  {
                      $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Anno non deve contenere lettere</p>");

                    document.modulo.anno.focus();
                   return false;
                  }
             else if(document.modulo.anno.value.substring(0,4)<1900)
               {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Impossibile utilizzare un valore inferiore a 1900 per l'anno</p>");

                    document.modulo.anno.focus();
                   return false;
               }
             else if((targa === "") || (targa === "undefined")) {
                  $('.correct').remove();
                   $('#targamsg').append("<p class='correct' style='color:red;'>Inserire la targa dell'auto</p>");

                    document.modulo.targa.focus();
                   return false;
                   }
             else if(targa.length>7||targa.length<7)
               {
                  $('.correct').remove();
                   $('#targamsg').append("<p class='correct' style='color:red;'>La targa deve contenere 7 caratteri</p>");

                    document.modulo.targa.focus();
                   return false;
               }
             else
             {
               document.modulo.action = "../dashboard/createcar.php";
                 document.modulo.submit();
             }
             
                 
          });
          $('#cancel-add').click(function(){
            $('#insert-auto,#cancel-add,#add-car,#autodata,.lab,#marca,#modello,#anno,#targa,#mex').toggle();
          });
        }
      else
        {
            $('#autodata').toggle();
          $('.lab').toggle();
            $('#pmarca').toggle();
          $('#pmodello').toggle();
          $('#panno').toggle();
          $('#ptarga').toggle();
          $('#config-option').toggle();
           $('#pmarca').append(response.user.automobile[0].marca);
          $('#pmodello').append(response.user.automobile[0].modello);
          $('#panno').append(response.user.automobile[0].anno);
          $('#ptarga').append(response.user.automobile[0].targa);
                   $('#config-car').click(function(){
                $('#config-option').toggle();
                $('#update-car,#cancel-update,#delete-car').toggle();
                $('#marca,#pmarca').toggle();
                $('#marca').val($('#pmarca').text());
                $('#modello,#pmodello').toggle();
                $('#modello').val($('#pmodello').text());
                $('#anno,#panno').toggle();
                $('#anno').val($('#panno').text());
                $('#targa,#ptarga').toggle();
                $('#targa').val($('#ptarga').text());

                 });
              $('#cancel-update').click(function(){
                $('#marca,#pmarca,#modello,#pmodello,#anno,#panno,#targa,#ptarga,#config-option,#update-car,#cancel-update,#delete-car').toggle();
                
              });
         
          $('#delete-car').click(function(){
             if( confirm("Sei sicuro di voler eliminare l'automobile?"))
               {
                 document.modulo.action = "../dashboard/deletecar.php";
                 document.modulo.submit();
               }
          });
          $('#update-car').click(function(){
                var marca=document.modulo.marca.value;
                    var modello= document.modulo.modello.value;
                    var anno= document.modulo.anno.value;
                    var targa=document.modulo.targa.value;
                
                 if ((marca === "") || (marca === "undefined")) {
                  $('.correct').remove();
                   $('#marcamsg').append("<p class='correct' style='color:red;'>Inserire una marca di auto</p>");

                    document.modulo.marca.focus();
                   return false;
                   }
             else if((modello === "") || (modello === "undefined")) {
                  $('.correct').remove();
                   $('#modellomsg').append("<p class='correct' style='color:red;'>Inserire un modello</p>");

                    document.modulo.modello.focus();
                   return false;
                   }
             else if((anno === "") || (anno === "undefined")) {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Inserire anno dell'auto</p>");

                    document.modulo.anno.focus();
                   return false;
                   }
             else if(anno.length>4||anno.length<4)
               {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Inserire anno correttamente</p>");

                    document.modulo.anno.focus();
                   return false;
               }
                else if(anno.match(/[a-z]/i))
                  {
                      $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Anno non deve contenere lettere</p>");

                    document.modulo.anno.focus();
                   return false;
                  }
             else if(document.modulo.anno.value.substring(0,4)<1900)
               {
                  $('.correct').remove();
                   $('#annomsg').append("<p class='correct' style='color:red;'>Impossibile utilizzare un valore inferiore a 1900 per l'anno</p>");

                    document.modulo.anno.focus();
                   return false;
               }
             else if((targa === "") || (targa === "undefined")) {
                  $('.correct').remove();
                   $('#targamsg').append("<p class='correct' style='color:red;'>Inserire la targa dell'auto</p>");

                    document.modulo.targa.focus();
                   return false;
                   }
             else if(targa.length>7||targa.length<7)
               {
                  $('.correct').remove();
                   $('#targamsg').append("<p class='correct' style='color:red;'>La targa deve contenere 7 caratteri</p>");

                    document.modulo.targa.focus();
                   return false;
               }
             else
             {
            
            
                 document.modulo.action = "../dashboard/updatecar.php";
                 document.modulo.submit();
             }
          });
          
        }
 
			},"json");
		 
  
  
	});		