function validar(){
	var edad;
	var ciudad;
	edad=document.getElementById("edad").value;
	ciudad=document.getElementById("tags").value;
	expresion = /[a-z A-Z]/;
	/*validaciones para edad*/
	if(edad=="" || /^\s+$/.test(edad)){
		alert("El campo edad esta vacio");
		return false;
	}

	for(var i=0; i<edad.length; i++)
	{
		if(isNaN(edad))
		{
			alert("El solo se permiten numeros en el campo edad");
			return false;
		}

	}
	/*validaciones para ciudad*/
	if(ciudad=="" || /^\s+$/.test(ciudad)){
		alert("El campo ciudad esta vacio");
		return false;
	}

	for(var j=0; j<ciudad.length; j++)
	{
		if(!expresion.test(ciudad[j]))
		{			
			alert("Solo se permiten letras en el campo ciudad");
			return false;
		}
	}
	/*validaciones para sexo*/
	selectSexo = document.getElementById("sexo").selectedIndex;
	if(selectSexo == null || selectSexo == 0 ) 
	{
  		return false;
	}

	/*validaciones para escolaridad*/
	selectEscolaridad = document.getElementById("escolaridad").selectedIndex;
	if(selectEscolaridad == null || selectEscolaridad == 0 ) 
	{
  		return false;
	}


}