<?php
header( 'Content-Type: application/json' );

$inscrito = $_POST[ 'id' ];

$id_categoria = $_POST[ 'id_categoria' ];

$categoria = $_POST[ 'categoria' ];

$candidato = $_POST[ 'candidato' ];


//$arr = explode("&", $candidato);

//$id_candidato =  $arr[0];
//$id_categoria =  $arr[1];

$pdo = new PDO( 'mysql:host=mysql743.umbler.com; dbname=top-educa;', 'top-educa', 'qti,oYB8Sw*9' );

$stmt = $pdo->prepare( 'INSERT INTO wp_votos (id_inscrito, id_categoria, categoria, candidato) VALUES (:id, :id_categ, :categ, :cand)' );
$stmt->bindValue( ':id', $inscrito );
$stmt->bindValue( ':id_categ', $id_categoria );
$stmt->bindValue( ':categ', $categoria );
$stmt->bindValue( ':cand', $candidato );
$stmt->execute();


if ( $stmt->rowCount() >= 1 ) {
  echo json_encode( 'Comentário Salvo com Sucesso' );

} else {
  echo json_encode( 'Falha ao salvar comentário' );

}
