<?php
 
 $dsn = "mysql:host=localhost;dbname=db_livraria;port=3307";

 $username = "root";

 $password = "";

try{
    $conexaodb = new PDO($dsn,$username,$password);
    // echo "<h1> Funcionou corretamente a conexao </h1>";
}
catch(PDOException $e){
    echo "<h1> Não funcionou a conexao</h1><br> ".$e->getMessage();
}


?>