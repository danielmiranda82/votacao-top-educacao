<?php
get_header()
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
include_once( 'inscricao/config/bd.php' );
?>

<body>
<?
if ( isset( $_POST ) ) {

  $email = $_POST[ 'email' ];
  $senha = $_POST[ 'senha' ];
  $confirmaSenha = $_POST[ 'confirma-senha' ];

  //Verifica se email existe
  $sqlVerifica = "SELECT * FROM wp_inscricao WHERE email = '" . $email . "'";

  $dadosVerifica = mysqli_query( $conexao, $sqlVerifica )or die( mysql_error() );
  $linhaVerifica = mysqli_fetch_assoc( $dadosVerifica );
  $totalVerifica = mysqli_num_rows( $dadosVerifica );

  if ( $totalVerifica > 0 ) {

    $query = "UPDATE wp_inscricao SET senha =  '" . $senha . "' WHERE email = '" . $email . "'";

    mysqli_query( $conexao, $query );
    ?>
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6"> <br>
  <br>
  <h4>
    <p class="titulo-pag">Senha alterada com sucesso!</p>
  </h4>
  <br>
  <div class="btns">
    <input onClick="window.location.href='https://premiotopeducacao.com.br/login/'" type="submit" Value="INDIQUE AGORA">
  </div>
  <br>
</div>
<?php


} else {
  ?>
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6"> <br>
  <br>
  <h4>
    <p class="titulo-pag">Email digitado incorreto ou inexistente! A sua senha NÃO foi alterada</p>
  </h4>
  <br>
  <div class="btns">
    <input onClick="window.location.href='https://premiotopeducacao.com.br/altera-senha/'" type="submit" Value="VOLTAR">
  </div>
  <br>
</div>
<?

}
}

?>
</body>
<?php
get_footer()
?>
