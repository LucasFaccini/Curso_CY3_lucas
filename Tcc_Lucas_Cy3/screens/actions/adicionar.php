<?php 
    require_once '../../connection/conn.php';
    session_start();
    $id = $_SESSION['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST['nome'];
        $quantidade = $_POST['qtd_necessaria'];
        
        $sql_codigo = "INSERT into recursos (nome, qtd_necessaria, id_doc) values ('$nome', '$quantidade', '$id')";

        if($mysqli->query($sql_codigo) === TRUE)
        {
            header('Location: ../painel.php');
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
    <title>Adicionar</title>
    <link rel="stylesheet" href="../../css/adicionar.css">
    <link rel="icon" type="image/png" href="../../imagens/abaimgs.png">
</head>
<body>
    <form action="" method="post">
        <h1>Adicionar item</h1>
        <label>Recurso</label>
        <input type="text" name="nome" required autocomplete="off">
        <label>Quantidade Necessaria</label>
        <input type="number" name="qtd_necessaria" required autocomplete="off">

        <input type="submit" value="Salvar">
        <a href="../painel.php">Voltar</a>
    </form>
</body>
</html>