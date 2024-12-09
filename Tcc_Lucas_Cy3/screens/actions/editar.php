<?php 
    require_once '../../connection/conn.php';

    $id = $_GET['id'];

    $sql_codigo = "SELECT * FROM recursos WHERE Id = '$id'";
    $resultado = $mysqli->query($sql_codigo);
    $item = $resultado->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['qtd_necessaria'];

        $sql_codigo = "UPDATE recursos SET nome = '$nome', qtd_necessaria = '$quantidade'
        WHERE id = '$id'";

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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar item</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Recurso</label>
        <input type="text" name="nome" value="<?php echo $item['nome']; ?>" required>
        <label>Quantidade Necessaria</label>
        <input type="number" name="qtd_necessaria" value="<?php echo $item['qtd_necessaria']; ?>" required>

        <input type="submit" value="Salvar">
    </form>
    <a href="painel.php">Voltar</a>
</body>
</html>