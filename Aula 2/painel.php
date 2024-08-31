<?php
    session_start();
    $usuario = $_SESSION['user'];
    $senha = $_SESSION['pass'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
<h1> <?php echo 'BEM VINDO'. $usuario; ?> </h1>
<p> <?php echo 'Sua senha: '. $senha; ?> </p>
</body>
</html>