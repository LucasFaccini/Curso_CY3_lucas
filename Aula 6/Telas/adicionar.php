<?php 
    include('../../Conexoes/conexao_sistema.php');
    session_start();
    $id = $_SESSION['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];

        $sql_codigo = "INSERT into itens (nome, quantidade, id_user) values ('$nome', '$quantidade', '$id')";

        if($mysqli->query($sql_codigo) === TRUE)
        {
            header('Location: painel.php');
        }
        else{
            echo 'Erro ao atualizar, sadness' . $mysqli->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>adicionar item</h1>
    <form action="" method="post">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <label>Quantidade</label>
        <input type="number" name="quantidade" required>

        <input type="submit" value="Salvar">
    </form>
    <a href="painel.php">Voltar</a>
</body>
</html>