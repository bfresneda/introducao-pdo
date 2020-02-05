<?php
require_once('conexao.php');

$consultadb = $conexaodb->prepare('SELECT * from editora');
$consulta = $consultadb->execute();

//var_dump($consulta);

$editoras = $consultadb->fetchAll(PDO::FETCH_ASSOC);

//var_dump($editora);

// foreach($editoras as $editora){
//     echo $editora['nome']."<br>";
// }
    if(isset($_POST['cadastro-livro'])){

        //verifica campos preenchidos
        if($_POST['nome'] != "" && $_POST['descricao'] != "" ){

            //preparacao da query
            $query = $conexaodb->prepare('INSERT INTO produto (nome, descricao, preco, fk_editora, fk_categoria,imagem) VALUES (:nome, :descricao, :preco,:fk_editora,49,"sem-imagem")');
            $resultado = $query->execute([
                ":nome" => $_POST['nome'],
                ":descricao" => $_POST['descricao'],
                ":preco" => $_POST['preco'],
                ":fk_editora" => $_POST['fk_editora'],
            ]);
            //se funcionar vai redirecionar para lista de livros
            // header('location: livros.php');
            var_dump($resultado);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <h1>Cadastrar Livro</h1>
</div>
<form action="" method="post" class="container">
    <label for="nomeProduto">Nome Produto:</label>
        <input type="text" id='nomeProduto' name='nome' class='form-control'> <br>
    <label for="descricao">Descrição:</label>
        <input type="text" id='descricao' name='descricao' class='form-control'><br>
    <label for="preco">Preço:</label>
        <input type="number" id='preco'name='preco' class='form-control'><br>
    <label for="imagem">Imagem:</label>
        <input type="file" id='imagem' name='imagem' class='form-control'><br>
    <label for="fk_editora">Editora:</label>
        <select name="fk_editora" id="fk_editora" class='form-control'>
        <?php
            foreach($editoras as $editora){?>
            <option value=" <?php echo $editora['id'];   ?>" name='editora' class='form-control'> <?php echo $editora['nome'];   ?></option>
            <?php } ?>       
        </select>
    <!-- <label for="categoria">Categoria:</label>
        <input type="text" id='categoria' name='categoria' class='form-control'><br> -->
    <button name='cadastro-livro' class='btn btn-primary'>Enviar</button>

</form>
    
</body>
</html>