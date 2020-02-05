<?php
require_once('conexao.php');


$consultadb = $conexaodb->prepare('SELECT * from produto');
$consulta = $consultadb->execute();

//var_dump($consulta);

$livros = $consultadb->fetchAll(PDO::FETCH_ASSOC);

//var_dump($livros);

// foreach($livros as  $livro){
//   //  echo $livro["id_produto"]."<br>";


// echo $livro["nome"]."<br>".$livro["descricao"]."<br>".$livro["preco"]."<hr>";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livraria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class='container'>
    <div class="container my-5">
        <div class="row">
            <div class="col">
            <h1>Livraria</h1>
            </div>
            <div class="col">
            <a href="cadastroLivro.php" class="btn btn-primary">Cadastrar</a></div>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Editora</th>
        </tr>
        </thead>
        <tbody>
        <?php    foreach($livros as  $livro): ?>
        <tr>
            <td><?php echo $livro['nome'];?></td>
            <td><?php echo $livro['descricao'];?></td>
            <td><?php echo $livro['preco'];?></td>
            <td><?php echo $livro['fk_categoria'];?></td>
            <td><?php echo $livro['fk_editora'];?></td>
        </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
</body>
</html>