<?php 
    require_once '../connection/conn.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST['nome'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql_checar_user = "SELECT * FROM doc WHERE usuario = '$user'";
        $resultado_checagem = $mysqli->query($sql_checar_user);

        if ($resultado_checagem->num_rows > 0) {
            echo "Nome de usuário já está em uso. Por favor, escolha outro.";
        } else {
            $sql_codigo = "INSERT into doc (nome, usuario, senha) values ('$nome', '$user', '$pass')";

            if($mysqli->query($sql_codigo) === TRUE)
            {
                $_SESSION['nome'] = $nome;
                header('Location: painel.php?CADASTRADO=sim');
            }
            else{
                echo 'Erro ao atualizar, sadness' . $mysqli->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="icon" type="image/png" href="../imagens/abaimgs.png">
    <title>Cadastrar</title>
    <script>
        window.onload = function() {
            document.getElementById("nome").value = "";
            document.getElementById("user").value = "";
            document.getElementById("pass").value = "";
        };
    </script>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastrar Jogador</h1>
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Digite seu nome" required autocomplete="off">
        <label>Usuário</label>
        <input type="text" name="user" placeholder="Crie seu usuário" required autocomplete="off">
        <label>Senha</label>
        <input type="text" name="pass" placeholder="Crie sua senha" required autocomplete="off">

        <input type="submit" value="Cadastrar">
        <a href="login.php">Voltar</a>
    </form>
</body>
</html>