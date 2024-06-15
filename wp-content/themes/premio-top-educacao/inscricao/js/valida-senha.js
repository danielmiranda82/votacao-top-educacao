function ValidaSenha()
{	
	
	var val1=document.getElementById("senha").value; 
	var val2=document.getElementById("confirma-senha").value;
	
	 if(val1!=val2)	{ 
	 return false;
		 
	} else	{	 
	 return true;
		
	}
}
	
	
	
	
	
	