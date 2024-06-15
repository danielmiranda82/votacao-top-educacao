<?php
get_header()
?>
<head>
<title>Inscrição - Prêmio Top Educacação 2023</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/desabilita-combo.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/valida-cnpj.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/formata-tel.js"></script>
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
          </p>
        </div>
        <form action="../confirma-inscricao-empresas" method="post">
          <br>
          <p style="font-size: 16px; font-weight: bold;">Dados da Empresa</p>
          <!-- <input type="text" class="input" placeholder="Razão social" id="razao_social" name="razao_social" required> --> 
          <br>
          <input type="text" class="input" placeholder="Nome da Empresa" id="nome_empresa" name="nome_empresa" required>
          <br>
          <br>
          <!--<input type="text" class="input" placeholder="Qual produto Cadastrado" id="produto" name="produto" required>
          <br>
          <br> -->
          <input type="text" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)" onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido'); this.value='';}" maxlength="18" class="input" placeholder="CNPJ"  required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Estado" id="estado" name="estado" required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Cidade" id="cidade" name="cidade" required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Endereço" id="endereco" name="endereco" required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Bairro" id="bairro" name="bairro" required>
          <br>
          <br>
          <input type="text" class="input" placeholder="CEP" id="cep" name="cep" required>
          <br>
          <br>
          <p style="font-size: 16px; font-weight: bold;">Representante da empresa</p>
          <input type="text" class="input" placeholder="Cargo" id="cargo" name="cargo" required>
          <br>
          <br>
          <input type="email" class="input" placeholder="E-mail" id="email" name="email" required>
          <br>
          <br>
          <input type="text" class="input" placeholder="Responsável/Contato" id="responsavel" name="responsavel" required>
          <br>
          <br>
          <input type="text" class="input" id="telefone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"  placeholder="Telefone" required/>
          <br>
          <br>
          <p style="font-size: 20px; font-weight: bold;">Escolha em qual categoria deseja se inscrever<br>
            <br>
          </p>
          <p style="font-size: 16px; font-weight: bold;">1ª Categoria que deseja concorrer<br>
          </p>
          <select name="select_1" id="select_1" onblur="if(!validarSelect(this.value)){alert('Seleção inválida'); this.value='';}">
            <option value="" selected = selected>Selecione uma categoria</option>
            <option value="" ></option>
            <option value="" >----- EDUCAÇÃO BÁSICA -----</option>
            <option value="" ></option>
            <?php
            $sql = "SELECT codigo, nome FROM wp_categorias WHERE tipo='EDUCAÇÃO BÁSICA'";
            $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
            $linha = mysqli_fetch_assoc( $dados );
            $total = mysqli_num_rows( $dados );

            if ( $total > 0 ) {
              do {
                echo "<option value='" . $linha[ 'codigo' ] . "'>" . $linha[ 'nome' ] . "</option>";
              } while ( $linha = mysqli_fetch_assoc( $dados ) );
            }
            ?>
            <option value="" ></option>
            <option value="" >----- EDUCAÇÃO SUPERIOR -----</option>
            <option value="" ></option>
            <?php
            $sql = "SELECT codigo, nome FROM wp_categorias WHERE tipo='ENSINO SUPERIOR'";
            $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
            $linha = mysqli_fetch_assoc( $dados );
            $total = mysqli_num_rows( $dados );

            if ( $total > 0 ) {
              do {
                echo "<option value='" . $linha[ 'codigo' ] . "'>" . $linha[ 'nome' ] . "</option>";
              } while ( $linha = mysqli_fetch_assoc( $dados ) );
            }
            ?>
          </select>
          <br>
          </p>
          <p style="font-size: 16px; font-weight: bold;">2ª Categoria que deseja concorrer<br>
          </p>
          <select name="select_2" id="select_2" onblur="if(!validarSelect(this.value)){alert('Seleção inválida'); this.value='';}">
            <option value="" selected = selected>Selecione uma categoria</option>
            <option value="" ></option>
            <option value="" >----- EDUCAÇÃO BÁSICA -----</option>
            <option value="" ></option>
            <?php
            $sql = "SELECT codigo, nome FROM wp_categorias WHERE tipo='EDUCAÇÃO BÁSICA'";
            $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
            $linha = mysqli_fetch_assoc( $dados );
            $total = mysqli_num_rows( $dados );

            if ( $total > 0 ) {
              do {
                echo "<option value='" . $linha[ 'codigo' ] . "'>" . $linha[ 'nome' ] . "</option>";
              } while ( $linha = mysqli_fetch_assoc( $dados ) );
            }
            ?>
            <option value="" ></option>
            <option value="" >----- EDUCAÇÃO SUPERIOR -----</option>
            <option value="" ></option>
            <?php
            $sql = "SELECT codigo, nome FROM wp_categorias WHERE tipo='ENSINO SUPERIOR'";
            $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
            $linha = mysqli_fetch_assoc( $dados );
            $total = mysqli_num_rows( $dados );

            if ( $total > 0 ) {
              do {
                echo "<option value='" . $linha[ 'codigo' ] . "'>" . $linha[ 'nome' ] . "</option>";
              } while ( $linha = mysqli_fetch_assoc( $dados ) );
            }
            ?>
          </select>
          <br>
          <br>
          <input type="checkbox" id="confirma" name="confirma" value="1" checked>
          <label for="confirma" class="texto-confirma">Concordo em receber comunicados das Plataformas Educação e Ensino Superior</label>
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
