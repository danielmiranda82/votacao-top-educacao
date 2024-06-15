<body>
<?php
//session_start();
include_once( 'confirma-login-categorias' );
include_once( 'inscricao/config/bd.php' );

if ( empty( $_POST[ 'login' ] ) || empty( $_POST[ 'senha' ] ) ) {
  header( 'Location: login-categorias' );
  exit();
}

$login = mysqli_real_escape_string( $conexao, $_POST[ 'login' ] );
$senha = mysqli_real_escape_string( $conexao, $_POST[ 'senha' ] );


$sql = "SELECT codigo, nome FROM wp_categorias WHERE tipo='EDUCAÇÃO BÁSICA'";
$dados = mysqli_query( $conexao, $sql )or die( mysql_error() );
$linha = mysqli_fetch_assoc( $dados );
$total = mysqli_num_rows( $dados );

if ( $total > 0 ) {
  do {
    echo "<option value='" . $linha[ 'codigo' ] . "'>" . $linha[ 'nome' ] . "</option>";
  } while ( $linha = mysqli_fetch_assoc( $dados ) );
}


$query = "SELECT nome, email, cpf, senha, votou from wp_inscricao where email = '{$login}' and senha = '{$senha}'";


$result = mysqli_query( $conexao, $query );
$linha = mysqli_fetch_assoc( $result );
$row = mysqli_num_rows( $result );
$votou = $linha[ 'votou' ];

echo $row;

if ( $row == 1 ) {

  do {
    $_SESSION[ 'id' ] = $linha[ 'cpf' ];
    $_SESSION[ 'nome' ] = $linha[ 'nome' ];

  } while ( $linha = mysqli_fetch_assoc( $dados ) );

  $_SESSION[ 'login' ] = $login;

  header( 'Location: https://premiotopeducacao.com.br/votacao-categorias/' );

  exit();
} else {
  $_SESSION[ 'nao_autenticado' ] = true;

  header( 'Location: https://premiotopeducacao.com.br/login-categorias' );
  exit();
}
?>
</body>
