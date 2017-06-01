function validaForm(){

var pregunta=document.getElementById("idpregunta").value;


 	if(pregunta=="" || /^\s+$/.test(pregunta) ){
   		
   		alert("La campo de pregunta, esta vacio");
   		return false;
   	
   	}






}