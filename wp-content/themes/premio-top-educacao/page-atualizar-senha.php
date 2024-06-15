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
<title>Prêmio Top Educação - Atualizar Senha</title>
</head>

<body>
<?php
$chave = filter_input( INPUT_GET, 'chave', FILTER_DEFAULT );


if ( !empty( $chave ) ) {
  //var_dump($chave);

  $query_usuario = "SELECT id 
                            FROM wp_inscricao 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
  $result_usuario = $conexao->prepare( $query_usuario );
  $result_usuario->bindParam( ':recuperar_senha', $chave, PDO::PARAM_STR );
  $result_usuario->execute();

  if ( ( $result_usuario )and( $result_usuario->rowCount() != 0 ) ) {
    $row_usuario = $result_usuario->fetch( PDO::FETCH_ASSOC );
    $dados = filter_input_array( INPUT_POST, FILTER_DEFAULT );
    //var_dump($dados);
    if ( !empty( $dados[ 'SendNovaSenha' ] ) ) {
      $senha_usuario = password_hash( $dados[ 'senha' ], PASSWORD_DEFAULT );
      //$senha_usuario = $dados['senha'];
      $recuperar_senha = 'NULL';

      $query_up_usuario = "UPDATE wp_inscricao 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
      $result_up_usuario = $conexao->prepare( $query_up_usuario );
      $result_up_usuario->bindParam( ':senha', $senha_usuario, PDO::PARAM_STR );
      $result_up_usuario->bindParam( ':recuperar_senha', $recuperar_senha );
      $result_up_usuario->bindParam( ':id', $row_usuario[ 'id' ], PDO::PARAM_INT );

      if ( $result_up_usuario->execute() ) {
        $_SESSION[ 'msg' ] = "<p align='center'; style='color: green'>Senha atualizada com sucesso!</p>";
        header( "Location: https://premiotopeducacao.com.br/login-index/" );
      } else {
        echo "<p align='center'; style='color: #ff0000'>Erro: Tente novamente!</p>";
      }
    }
  } else {
    $_SESSION[ 'msg_rec' ] = "<p align='center'; style='color: #ff0000'>Link inválido, solicite novo link para atualizar a senha!</p>";
    header( "Location: https://premiotopeducacao.com.br/altera-senha/" );
  }
} else {
  $_SESSION[ 'msg_rec' ] = "<p align='center'; style='color: #ff0000'>Link inválido, solicite novo link para atualizar a senha!</p>";
  header( "Location: https://premiotopeducacao.com.br/altera-senha/" );
}

?>
<div class="container">
  <div class="row">
    <div class="col"> </div>
    <div class="col">
      <form method="POST" action="">
        <?php
        $usuario = "";
        if ( isset( $dados[ 'senha' ] ) ) {
          $usuario = $dados[ 'senha' ];
        }
        ?>
        <h3>Atualizar senha</h3>
        <br>
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Digite a nova senha" value="<?php echo $email; ?>">
        <br>
        <br>
        <input type="submit" value="Atualizar" name="SendNovaSenha">
      </form>
      <br>
      Lembrou? <a href="https://premiotopeducacao.com.br/login-index/">clique aqui</a> para logar </div>
    <div class="col"> </div>
  </div>
</div>
</body>
</html>