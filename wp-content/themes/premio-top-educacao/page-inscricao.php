<?php
get_header()
?>
<head>
<title>Inscrição - Prêmio Top Educacação 2023</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/valida-cpf.js"></script>
</head>
<?php
include_once( 'inscricao/config/bd.php' );
?>

<body>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-lg-6">
      <div class="form-area">
        <div class="texto">
          <p style="font-size: 20px; font-weight: bold;">Inscreva-se para a Votação do Prêmio Top Educação 2023<br>
            <br>
          </p>
        </div>
        <div > <a class="btn btn-primary btn-sm" href="https://premiotopeducacao.com.br/login-index/">Já se cadastrou para a votação de 2023? Então vote agora!</a></div>
        <br>
        <br>
        <form action="../confirma-inscricao" method="post">
          <input type="text" name="cpf" id="cpf" onkeyup="javascript: fMasc( this, mCPF );" onblur="if(!ValidaCPF(this.value)){alert('CPF Informado é inválido'); this.value='';}" maxlength="18" class="input" placeholder="CPF"  required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Nome" id="nome" name="nome" required>
          <br>
          <br>
          <input type="email" class="input" placeholder="Email" id="email" name="email" required>
          <br>
          <br>
          <input type="password" class="input" placeholder="Senha" id="senha" name="senha" required>
          <br>
          <br>
          
          <!--<input type="checkbox" id="confirma" name="confirma" value="1" checked>-->
          <label for="confirma" class="texto-confirma" style="font-size: 12px;">*Concordo em receber comunicados das Plataformas Educação e Ensino Superior</label>
          <br>
          <br>
          <input type="submit" value="INSCREVER" class="btn btn-enviar">
          <br>
          <br>
          <div class="msg-erro-form"></div>
        </form>
      </div>
    </div>
    <div class="col-md-2 col-lg-6" align="right">
      <div class="aside-facebook">
        <iframe 
        src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Frevistaeducacao&amp;width=300&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true"
        scrolling="no" 
        frameborder="0" 
        style="overflow:hidden; width:500px; height:300px;"
        allowTransparency="true"> </iframe>
      </div>
    </div>
  </div>
</div>

<!--QUERY PARA RELATORIO DE INSCRITOS NO MYSQL

SELECT Insc.`id`, Insc.`nome_empresa`, Insc.`email`, Insc.`cnpj`, Insc.`cargo`, Insc.`responsavel`, Insc.`telefone`, Insc.`estado`, Insc.`cidade`, Insc.`bairro`, Insc.`endereco`, Insc.`cep`, Insc.`data_inscricao`, Insc.`categoria1`, Categ.tipo, Categ.nome, Insc.`categoria2`, Categ1.tipo, Categ1.nome FROM `wp_inscricao_categorias` AS Insc JOIN `wp_categorias` AS Categ ON Insc.`categoria1` = Categ.codigo LEFT JOIN `wp_categorias` AS Categ1 ON Insc.`categoria2` = Categ1.codigo ORDER BY Insc.`id` ASC -->

<?
get_footer()
?>
