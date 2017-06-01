function validaF(){ 
   	//valido el nombre 
   	var nombre;
   	nombre=document.getElementById("nombreId").value;


   	if(nombre=="" || /^\s+$/.test(nombre)){
   		alert("El titulo de examen esta vacio");
   		return false;
   	}

 }