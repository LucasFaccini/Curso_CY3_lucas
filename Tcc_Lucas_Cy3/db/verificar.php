<?php 
    require_once '../connection/conn.php';

    session_start();

    $usuario = $_POST['user'];
    $senha = $_POST['pass'];
    
    if(isset($usuario)  && isset($senha))
    {
        $sql_codigo = "SELECT * FROM doc WHERE usuario = '$usuario' AND senha = '$senha'";

        $sql_query = $mysqli -> query($sql_codigo);

        $quantidade_linhas = $sql_query->num_rows;

        if($quantidade_linhas == 1){
            $resultado = $sql_query->fetch_assoc();
            $_SESSION['id'] = $resultado['id'];
            header('Location: ../screens/painel.php?cadastro=nao');
        }else{
            header('Location: ../screens/login.php?error');
        }
    }
?>