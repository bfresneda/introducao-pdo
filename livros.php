<?php
require_once('conexao.php');


$consultadb = $conexaodb->prepare('SELECT * from produto');
$consulta = $consultadb->execute();

//var_dump($consulta);

$livros = $consultadb->fetchAll(PDO::FETCH_ASSOC);

var_dump($livros);



?>