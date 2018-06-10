$(document).ready(function(){
$('#cercaviaggio').click(function(){
   var departure = document.modulo.partenza.options[document.modulo.partenza.selectedIndex].value;
   var arrive = document.modulo.arrivo.options[document.modulo.arrivo.selectedIndex].value;
  
  if (((departure === "") || (departure === "undefined"))&&((arrive === "") || (arrive === "undefined"))) {
        
    window.location.href="foundtravel";
  }
 
  else  if((departure)&&((arrive==="")||(arrive==="undefined")))
    {
       window.location.href="viaggio?dp="+departure;
     
    }
    else if((arrive)&&((departure==="")||(departure==="undefined")))
    {
      window.location.href="viaggio?rv="+arrive;
    }
  else if (((departure !== "") || (departure !== "undefined"))&&(departure)&&(arrive)&&(departure!==arrive)&&((arrive !== "") || (arrive !== "undefined")))
    {
       window.location.href="viaggio?dp="+departure+"&rv="+arrive;
    }
 else if(((departure !== "") || (departure !== "undefined"))&&(departure)&&(arrive)&&(departure===arrive)&&((arrive !== "") || (arrive !== "undefined")))
  {
    window.location.href="404";
  }  
});
});