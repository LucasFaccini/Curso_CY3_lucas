<?php
    require_once ('../connection/conn.php');

    $id = $_GET['id'];

     $sql_codigo = "DELETE FROM itens WHERE Id = '$id'";
     
     if($mysqli->query($sql_codigo) === TRUE)
     {
         header('Location: ../screens/fornecedores/fornecedores_painel.php');
     }
     else{
         echo 'RUIm' . $mysqli->error;
     }
?>