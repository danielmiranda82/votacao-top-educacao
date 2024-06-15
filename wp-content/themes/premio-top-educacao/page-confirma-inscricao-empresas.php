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

  //$razao_social =  $_POST[ 'razao_social' ] ;
  $nome_empresa = $_POST[ 'nome_empresa' ];
  //$produto =  $_POST[ 'produto' ];
  $cnpj = $_POST[ 'cnpj' ];
  $estado = $_POST[ 'estado' ];
  $telefone = $_POST[ 'telefone' ];
  $endereco = $_POST[ 'endereco' ];
  $cidade = $_POST[ 'cidade' ];
  $bairro = $_POST[ 'bairro' ];
  $cep = $_POST[ 'cep' ];
  $cargo = $_POST[ 'cargo' ];
  $email = $_POST[ 'email' ];
  $responsavel = $_POST[ 'responsavel' ];
  $telefone = $_POST[ 'telefone' ];
  $data_inscricao = date( "Y/m/d" );
  $confirma = $_POST[ 'confirma' ];
  $categoria1 = $_POST[ 'select_1' ];
  $categoria2 = $_POST[ 'select_2' ];


  $query = "INSERT INTO wp_inscricao_categorias ( nome_empresa, email, cnpj, cargo, responsavel, telefone, estado, cidade, bairro, endereco, cep, data_inscricao, confirma, categoria1, categoria2) VALUES ('" . $nome_empresa . "','" . $email . "', '" . $cnpj . "', '" . $cargo . "','" . $responsavel . "','" . $telefone . "','" . $estado . "','" . $cidade . "','" . $bairro . "','" . $endereco . "','" . $cep . "','" . $data_inscricao . "','" . $confirma . "','" . $categoria1 . "','" . $categoria2 . "')";

  mysqli_query( $conexao, $query );

}

?>
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6"> <br>
  <br>
  <h4>
    <p class="titulo-pag">Obrigado por se inscrever.</p>
  </h4>
  <br>
  <br>
  <h5>
    <p class="titulo-pag">Aguarde a votação em maio de 2023.</p>
  </h5>
  <br>
  <?php /*?><img class="logotipo" src="<?php echo get_template_directory_uri();?>/inscricao/images/logo-inscricao.png" style="padding-left: 25px;"> </div><?php */?>
</div>
</body>
<?php
get_footer()
?>
