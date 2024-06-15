<?php
session_start();
ob_start();
include_once( 'inscricao/config/bd-login.php' );
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
get_header()
?>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
<title>Prêmio Top Educação - Login</title>
</head>

<body>
<?php
//Exemplo criptografar a senha
//echo password_hash(12345, PASSWORD_DEFAULT);
?>
<?php
$dados = filter_input_array( INPUT_POST, FILTER_DEFAULT );

if ( !empty( $dados[ 'SendLogin' ] ) ) {
  //var_dump($dados);
  $query_usuario = "SELECT id, nome, email, cpf, senha, votou from wp_inscricao WHERE email =:email  
                        LIMIT 1";


  $result_usuario = $conexao->prepare( $query_usuario );
  $result_usuario->bindParam( ':email', $dados[ 'email' ], PDO::PARAM_STR );

  //echo $query_usuario;
  $result_usuario->execute();

  if ( ( $result_usuario )AND( $result_usuario->rowCount() != 0 ) ) {
    $row_usuario = $result_usuario->fetch( PDO::FETCH_ASSOC );

    if ( password_verify( $dados[ 'senha' ], $row_usuario[ 'senha' ] ) ) {
      //if($dados['senha'] == $row_usuario['senha']){
      $_SESSION[ 'id' ] = $row_usuario[ 'cpf' ];
      $_SESSION[ 'nome' ] = $row_usuario[ 'nome' ];
      header( "Location: https://premiotopeducacao.com.br/votacao-2023/" );
    } else {
      $_SESSION[ 'msg' ] = "<p align='center'; style='color: #ff0000'>Usuário ou senha inválida!</p>";
    }
  } else {
    $_SESSION[ 'msg' ] = "<p align='center'; style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
  }


}

if ( isset( $_SESSION[ 'msg' ] ) ) {
  echo $_SESSION[ 'msg' ];
  unset( $_SESSION[ 'msg' ] );
}
?>
<div class="container">
  <div class="row">
    <div class="col"> </div>
    <div class="col">
      <form method="POST" action="">
        <div > <a class="btn btn-primary btn-sm" href="https://premiotopeducacao.com.br/inscricao/">Não se cadastrou ainda para a Votação de 2023? Clique aqui</a></div>
        <br>
        <br>
        <label>Email</label>
        <input type="text" class="input" name="email" placeholder="Digite o email" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>">
        <br>
        <br>
        <label>Senha</label>
        <input type="password" class="input" name="senha" placeholder="Digite a senha" value="<?php if(isset($dados['senha'])){ echo $dados['senha']; } ?>">
        <br>
        <br>
        <input type="submit" value="Acessar" name="SendLogin">
      </form>
      <br>
      <a href="https://premiotopeducacao.com.br/altera-senha/">Esqueceu a senha?</a> <br>
      <br>
    </div>
    <div class="col"> </div>
  </div>
</div>
</body>
</html>