
<!DOCTYPE html>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
  $('#ciao').hide();
  $('#prendi').click(function(){
     
        $('#ciao').toggle();
        $('#prend').toggle();
        $('#ciao').val($('#prend').text());
        if($('#prendi').val()=="change")
          {
            
            $('#prendi').val("Salva");
          }
        else 
           
        {$('#prendi').val("change");
        
        }

 
});
});
</script>
  </head>

<body>
  
    <input id="ciao" name="prova" >
      
    </input>
    <p id="prend">Valordgdre</p>
    <input type="button" id="prendi" name="name" value="change" >
   
    </input> 
</body>
</html>