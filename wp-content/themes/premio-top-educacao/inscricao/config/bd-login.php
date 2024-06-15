<?php 

$servidor = "mysql743.umbler.com";

$usuario= "top-educa";

$senha = "qti,oYB8Sw*9";

$db = "top-educa";


try{
    //Conexão com a porta
    $conexao = new PDO("mysql:host=$servidor;dbname=" . $db, $usuario, $senha);

    //Conexão sem a porta
    //$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso!";
}catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}













