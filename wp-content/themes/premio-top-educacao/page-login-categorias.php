<?php
get_header()
?>


<head>	
	<title>Inscrição - Prêmio Top Educacação 2021</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inscricao/css/style.css">
	

	
	<script src="<?php echo get_template_directory_uri();?>/inscricao/js/valida-cpf.js"></script>
	

	
</head>

<?php
include_once('inscricao/config/bd.php');
?>

<body>
	<br><br>
	
	<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
      <form action="../verifica-login-categorias" method="post">
			
          <p style="font-size: 16px; font-weight: bold;">Email</p>
          <input type="text" class="input" placeholder="Login" id="login" name="login" required>
          <br>
          <br> 
		  <p style="font-size: 16px; font-weight: bold;">Senha</p>
          <input type="password" class="input" placeholder="Senha" id="senha" name="senha"  required>
          <br>
		   <div >
		  <a class="link" href="https://premiotopeducacao.com.br/inscricao/"><h8>Não se cadastrou ainda pra Votação? Clique aqui</h8></a></div>
          <br>
		   <div >
		  <a class="link" href="https://premiotopeducacao.com.br/altera-senha/">Esqueceu sua senha? Clique aqui</a></div>
          <br><br>
		  <div class="btns">			 
			  <input type="submit" value="Login" >			  
		  </div>
         
          <br>
          <br>
		  
          <div class="msg-erro-form"></div>
        </form>
  
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
	
	
	
	
	
	





	
<?
get_footer() ?>