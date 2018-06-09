$(document).ready(function(){
$('#cercaviaggio').click(function(){
   var departure = document.modulo.partenza.options[document.modulo.partenza.selectedIndex].value;
   var arrive = document.modulo.arrivo.options[document.modulo.arrivo.selectedIndex].value;
  
  if (((departure === "") || (departure === "undefined"))&&((arrive === "") || (arrive === "undefined"))) {
        
    window.location.replace("foundtravel");
    /*$('.messaggio').remove();
        var mex= "<div class='col-md-12 messaggio'><p style='color:red;'>Seleziona una citta' di partenza</p></div>";
        $('#controllovi').append(mex);
        document.modulo.partenza.focus();
        setTimeout(function() { $(".messaggio").hide(); }, 2000);
        return false;*/
  }
  else
    {
      document.modulo.action = "../dashboard/viaggio";
        document.modulo.submit();
    }
  
});
});