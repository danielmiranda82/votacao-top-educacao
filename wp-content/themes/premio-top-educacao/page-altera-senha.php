<?php
session_start();
ob_start();
include_once( 'inscricao/config/bd-login.php' );

use PHPMailer\ PHPMailer\ PHPMailer;
use PHPMailer\ PHPMailer\ SMTP;
use PHPMailer\ PHPMailer\ Exception;

require 'inscricao/lib/vendor/autoload.php';
$mail = new PHPMailer( true );

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
get_header()
?>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
<title>Prêmio Top Educação - Alterar Senha</title>
</head>

<body>
<?php
$dados = filter_input_array( INPUT_POST, FILTER_DEFAULT );

if ( !empty( $dados[ 'SendRecupSenha' ] ) ) {
  //var_dump($dados);
  $query_usuario = "SELECT id, nome, email FROM wp_inscricao 					WHERE email =:email  
                        LIMIT 1";


  $result_usuario = $conexao->prepare( $query_usuario );
  $result_usuario->bindParam( ':email', $dados[ 'email' ], PDO::PARAM_STR );
  $result_usuario->execute();

  if ( ( $result_usuario )and( $result_usuario->rowCount() != 0 ) ) {
    $row_usuario = $result_usuario->fetch( PDO::FETCH_ASSOC );
    $chave_recuperar_senha = password_hash( $row_usuario[ 'id' ], PASSWORD_DEFAULT );
    //echo $row_usuario['id'];

    $query_up_usuario = "UPDATE wp_inscricao 
                        SET recuperar_senha =:recuperar_senha 
                        WHERE id =:id 
                        LIMIT 1";
    $result_up_usuario = $conexao->prepare( $query_up_usuario );

    $result_up_usuario->bindParam( ':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR );

    $result_up_usuario->bindParam( ':id', $row_usuario[ 'id' ], PDO::PARAM_INT );

    //var_dump ($result_up_usuario);

    if ( $result_up_usuario->execute() ) {
      $link = "https://premiotopeducacao.com.br/atualizar-senha/?chave=$chave_recuperar_senha";

      //echo $link;

      try {
        /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.umbler.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'atendimento@premiotopeducacao.com.br';
        $mail->Password = '9).5#T/XxX7525';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom( 'atendimento@premiotopeducacao.com.br', 'Atendimento' );
        $mail->addAddress( $row_usuario[ 'email' ], $row_usuario[ 'nome' ] );

        $mail->isHTML( true ); //Set email format to HTML
        $mail->Subject = 'Recuperar senha Prêmio Top Educação';
        $mail->Body = 'Prezado(a) ' . $row_usuario[ 'nome' ] . ".<br><br>Você solicitou alteração de senha do Prêmio Top Educação.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
        $mail->AltBody = 'Prezado(a) ' . $row_usuario[ 'nome' ] . "\n\nVocê solicitou alteração de senha do Prêmio Top Educação.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

        $mail->send();

        $_SESSION[ 'msg' ] = "<p align='center'; style='color: green'>Enviado e-mail com instruções para recuperar a senha.<br> Acesse a sua caixa de e-mail para recuperar a senha!</p>";
        header( "Location: https://premiotopeducacao.com.br/login-index/" );
      } catch ( Exception $e ) {
        echo "<p align='center'; style='color: #ff0000'> E-mail NÃO enviado. Erro: {$mail->ErrorInfo}</p>";
      }
    } else {
      echo "<p align='center'; style='color: #ff0000'>Tente novamente!</p>";
    }
  } else {
    echo "<p align='center'; style='color: #ff0000'>Usuário não encontrado!</p>";
  }
}

if ( isset( $_SESSION[ 'msg_rec' ] ) ) {
  echo $_SESSION[ 'msg_rec' ];
  unset( $_SESSION[ 'msg_rec' ] );
}

?>
<div class="container">
  <div class="row">
    <div class="col"> </div>
    <div class="col">
      <form method="POST" action="">
        <?php
        $usuario = "";
        if ( isset( $dados[ 'email' ] ) ) {
          $usuario = $dados[ 'email' ];
        }
        ?>
        <h3>Alterar senha</h3>
        <br>
        <label>E-mail</label>
        <input type="text" name="email" class="input"placeholder="Digite o email" value="<?php echo $usuario; ?>">
        <br>
        <br>
        <input type="submit" class="button" value="Enviar email" name="SendRecupSenha">
      </form>
      <br>
      Lembrou? <a href="https://premiotopeducacao.com.br/login-index/">clique aqui</a> para logar </div>
    <div class="col"> </div>
  </div>
</div>
</body>
</html>