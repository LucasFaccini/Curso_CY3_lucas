<?php 
    include('../Conexoes/conexao_estoque.php');

    $id = $_GET['id'];

    $sql_codigo = "SELECT * FROM itens WHERE Id = '$id'";
    $resultado = $mysqli->query($sql_codigo);
    $item = $resultado->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];

        $sql_codigo = "UPDATE itens SET nome = '$nome', quantidade = '$quantidade'
        WHERE id = '$id'";

        if($mysqli->query($sql_codigo) === TRUE)
        {
            header('Location: index.php');
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
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $item['nome']; ?>" required>
        <label>Quantidade</label>
        <input type="number" name="quantidade" value="<?php echo $item['quantidade']; ?>" required>

        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>