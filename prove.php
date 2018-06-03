<?php
if(isset($_POST['name']))
{
  $var= $_POST['prova'];
  echo $var;
}
?>
<!DOCTYPE html>
<html>
  <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){

  $("#ciao").val("stampo");
  
 
                            });
</script>
  </head>

<body>
  <form action="#" method="POST">
    <input id="ciao" name="prova">
      
    </input>
    <button type="submit" name="name">
      clik
    </button>
  </form>
</body>
</html>