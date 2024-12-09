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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar item</h1>
    <form action="" method="post">
        <label>Recurso</label>
        <input type="text" name="nome" required>
        <label>Quantidade Necessaria</label>
        <input type="number" name="qtd_necessaria" required>

        <input type="submit" value="Salvar">
    </form>
    <a href="../painel.php">Voltar</a>
</body>
</html>