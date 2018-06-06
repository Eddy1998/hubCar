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
            //controlli dati inseriti e manda a insert iudautomobile.php
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
          $('#update-car').click(function(){
            //manda a iudautomobile.php con nuovi dati
          });
          $('#delete-car').click(function(){
             if( confirm("Sei sicuro di eliminare l'automobile?"))
               {

                  $.ajax({
                    url: '../dashboard/iudautomobile.php',
                    type: 'post',
                    data: {
                      'delete-car' : 1                   
                    },
                    success: function(ritorno){
                      if(ritorno=='eseguito')
                        {
                            location.reload();
                          $('#profilo').append('eseguito');
                        }
                      else if(ritorno=='errore-delete')
                        {
                           $('#profilo').append('NONeseguito');
                        }
                       else if(ritorno=='errore-db')
                        {
                           $('#profilo').append('db error');
                        }
                    }
                    
                    });
               }
          });
        }
 
			},"json");
		 
  
  
	});		