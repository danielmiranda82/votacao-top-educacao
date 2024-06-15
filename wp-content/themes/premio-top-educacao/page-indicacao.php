<?php
session_start();
ob_start();
include_once( 'inscricao/config/bd.php' );
//include_once( 'inscricao/config/bd-login.php' );

if ( ( !isset( $_SESSION[ 'id' ] ) )AND( !isset( $_SESSION[ 'nome' ] ) ) ) {
  $_SESSION[ 'msg' ] = "<p align='center'; style='color: #ff0000'>Necessário realizar o login para acessar a página!</p>";
  header( "Location: https://premiotopeducacao.com.br/login-index/" );
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Votação - Prêmio Top Educacação 2023</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inscricao/css/style.css" media="all">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6" align="left"><a href="https://premiotopeducacao.com.br/"><img src="https://premiotopeducacao.com.br/wp-content/uploads/2022/05/Logotipo-Top-Educacao-2022-01.png" width="120"  alt="" /></a> </div>
    <div class="col-sm-6" align="center"> </div>
    <div class="col-sm-6" align="right">
      <spam style="font-size: 16px; font-weight: bold;">Bem vindo(a) <?php echo $_SESSION['nome']; ?>!</spam>
      <spam><br>
        <a class="btn btn-primary"href="../logout">Sair</a></spam>
    </div>
  </div>
  <div class="row">
    <p style="font-size: 28px; font-weight: bold;" align="center"><br>
      Votação Prêmio Top Educação 2023<br>
      <br>
    </p>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6"><br>
      <p style="font-size: 25px; font-weight: bold;" align="center" >Educação Básica</p>
      <br>
      <?php
      $sql = "SELECT tipo, codigo, nome FROM wp_categorias WHERE tipo = 'EDUCACAO BASICA'";
      $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
      $linha = mysqli_fetch_assoc( $dados );
      $total = mysqli_num_rows( $dados );

      $id = $_SESSION[ 'id' ];

      if ( $total > 0 ) {

        ?>
      <div class="accordion accordion-flush" id="accordionFlushCatBasica">
        <?
        do {
          ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-heading-<?php echo $linha['codigo'];?>">
            <button  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $linha['codigo'];?>" aria-expanded="false" aria-controls="flush-collapse-<?php echo $linha['codigo'];?>"> <?php echo $linha['nome'];?> </button>
          </h2>
          <div id="flush-collapse-<?php echo $linha['codigo'];?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo $linha['codigo'];?>" data-bs-parent="#accordionFlushCatBasica">
            <div class="accordion-body" align="center">
              <?php


              if ( $total > 0 ) {


                echo "<form id='form1' method='POST'>";

                //echo "<form id='form1'>";

                echo "<input type='hidden' id='id' name='id' value='" . $id . "'>";

                echo "<input type='hidden' id='id_categoria' name='id_categoria'  value='" . $linha[ 'codigo' ] . "'>";

                echo "<input type='hidden' id='categoria' name='categoria'  value='" . $linha[ 'nome' ] . "'>";

                echo "<input type='text' id='candidato' name='candidato' style='width: 80%;'>";

                echo "<br><br>";

              }

              //Verifica categorias já votadas
              $sqlVerifica = "SELECT * FROM wp_votos WHERE id_inscrito = '" . $id . "' AND id_categoria = '" . $linha[ 'codigo' ] . "'";

              $dadosVerifica = mysqli_query( $conexao, $sqlVerifica )or die( mysql_error() );
              $linhaVerifica = mysqli_fetch_assoc( $dadosVerifica );
              $totalVerifica = mysqli_num_rows( $dadosVerifica );

              if ( $totalVerifica > 0 ) {

                ?>
              <div align="center"> <span class="btn btn-primary">Categoria já votada</span> </div>
              <?php

              } else {

                ?>
              <div align="center"> 
                <!-- <input type="submit" form="form1" class="btn btn-danger"  value="Votar"/>-->
                
                <button class="btn btn-primary btn-sm" type="submit" style="width: 80%;">Indicar</button>
              </div>
              <?php
              }
              ?>
              </form>
            </div>
          </div>
        </div>
        <?php
        }

        while ( $linha = mysqli_fetch_assoc( $dados ) );

        }

        ?>
      </div>
    </div>
    <div class="col-sm-6"><br>
      <p style="font-size: 25px; font-weight: bold;" align="center" >Ensino Superior</p>
      <br>
      <?php
      $sql = "SELECT tipo, codigo, nome FROM wp_categorias WHERE tipo = 'ENSINO SUPERIOR'";
      $dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
      $linha = mysqli_fetch_assoc( $dados );
      $total = mysqli_num_rows( $dados );

      $id = $_SESSION[ 'id' ];

      if ( $total > 0 ) {

        ?>
      <div class="accordion accordion-flush" id="accordionFlushCatSup">
        <?

        do {

          ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-heading-<?php echo $linha['codigo'];?>">
            <button  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $linha['codigo'];?>" aria-expanded="false" aria-controls="flush-collapse-<?php echo $linha['codigo'];?>"> <?php echo $linha['nome'];?> </button>
          </h2>
          <div id="flush-collapse-<?php echo $linha['codigo'];?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo $linha['codigo'];?>" data-bs-parent="#accordionFlushCatSup">
            <div class="accordion-body" align="center">
              <?php


              if ( $total > 0 ) {


                echo "<form id='form1' method='POST'>";

                //echo "<form id='form1'>";

                echo "<input type='hidden' id='id' name='id' value='" . $id . "'>";

                echo "<input type='hidden' id='id_categoria' name='id_categoria'  value='" . $linha[ 'codigo' ] . "'>";

                echo "<input type='hidden' id='categoria' name='categoria'  value='" . $linha[ 'nome' ] . "'>";

                echo "<input type='text' id='candidato' name='candidato' style='width: 80%;'>";

                echo "<br><br>";

              }

              //Verifica categorias já votadas
              $sqlVerifica = "SELECT * FROM wp_votos WHERE id_inscrito = '" . $id . "' AND id_categoria = '" . $linha[ 'codigo' ] . "'";

              $dadosVerifica = mysqli_query( $conexao, $sqlVerifica )or die( mysql_error() );
              $linhaVerifica = mysqli_fetch_assoc( $dadosVerifica );
              $totalVerifica = mysqli_num_rows( $dadosVerifica );

              if ( $totalVerifica > 0 ) {

                ?>
              <div align="center"> <span class="btn btn-primary">Categoria já votada</span> </div>
              <?php

              } else {

                ?>
              <div align="center"> 
                <!-- <input type="submit" form="form1" class="btn btn-danger"  value="Votar"/>-->
                
                <button class="btn btn-primary btn-sm" type="submit" style="width: 80%;">Indicar</button>
              </div>
              <?php
              }
              ?>
              </form>
            </div>
          </div>
        </div>
        <?php
        }

        while ( $linha = mysqli_fetch_assoc( $dados ) );

        }

        ?>
      </div>
    </div>
  </div>
</div>
</div>
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/jquery-3.5.1.min.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/inscricao/js/votacao.js"></script>
</body>
</html>