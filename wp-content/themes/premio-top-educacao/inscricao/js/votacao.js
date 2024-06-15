$(document).on('submit','#form1',function(e){
        e.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "https://premiotopeducacao.com.br/confirma-votacao/",
        data:$(this).serialize(),
        success: function(data){
        $('#msg').html(data);
        $('#form1').find('input').val('')
			location.reload();	
			alert("Seu voto foi computado!!! Pressione OK para continuar votando ou clique em SAIR");   
			
			
    }});
});





/*$('#form1').submit(function(e){
    e.preventDefault();
	
	var id = $('#id').val();
	var id_categoria = $('#id_categoria').val();
	var candidato = $('#candidato').val(); 
   
    $.ajax({
        url: 'https://premiotopeducacao.com.br/confirma-votacao-categorias/',
        method: 'POST',
        data: {id:id, id_categoria:id_categoria, candidato:candidato },
        dataType: 'json'
    }).done(function(result){		
		location.reload();		
		alert("Seu voto foi computado!!! Pressione OK para continuar votando ou clique em SAIR");        
      
        console.log(result);       
    });
});*/