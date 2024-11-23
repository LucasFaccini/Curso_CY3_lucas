<?php
    require_once'../connection/conn.php';

    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];

    $sql_codigo = "INSERT INTO fornecedores (nome,cidade) VALUES ('$nome','$cidade)";

    $resultado = $mysqli->query($sql_codigo);

    if ($resultado === TRUE) {
        header('Location: ../screens/fornecedores/fornecedores_painel.php');
    }
    else {
        header('Location: ../screens/fornecedores/fornecedores_painel.php?error');
    }
?>