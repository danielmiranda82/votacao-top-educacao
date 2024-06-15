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

  $nome = $_POST[ 'nome' ];
  $email = $_POST[ 'email' ];
  $cpf = $_POST[ 'cpf' ];
  //$senha = $_POST['senha'];	
  $senha = password_hash( $_POST[ 'senha' ], PASSWORD_DEFAULT );
  $data_votacao = date( "Y/m/d" );
  $confirma = $_POST[ 'confirma' ];

  echo '<script src="//i.btg360.com.br/wf.js" type="text/javascript"></script>';

  echo '
          <script type="text/javascript">
          __blc["id"] = "d7af0f6d35c8d26733d2bae440b94d3a";
             try {
			 
                 lc.sendData({
				 
                 evento : "Novo Cadastro",
                 nm_email :  "' . $email . '",
                                    
                 vars : {
                      nome : "' . $nome . '",
                        },
						
                 lista : { 
                     nm_lista : "Base-Educacao-2022",
                     atualizar : "1"
                          }
                 });	
                                                    
					$(".cadastrado").css({"visibility": "visible", "display":"block"});
					
             }catch(e){
                    
					$(".erro").css({"visibility": "visible", "display":"block"});
                    }
                                        
             </script>';


  $query = "INSERT INTO wp_inscricao (nome, email, cpf, senha, data_votacao, confirma) VALUES ('" . $nome . "', '" . $email . "','" . $cpf . "', '" . $senha . "','" . $data_votacao . "', '" . $confirma . "')";


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
  <div class="btns">
    <input onClick="window.location.href='https://premiotopeducacao.com.br/login-index/'" type="submit" Value="VOTE AGORA">
  </div>
  <br>
  <?php /*?><img class="logotipo" src="<?php echo get_template_directory_uri();?>/inscricao/images/logo-inscricao.png" style="padding-left: 25px;"> </div><?php */?>
</div>
</body>
<?php
get_footer()
?>
