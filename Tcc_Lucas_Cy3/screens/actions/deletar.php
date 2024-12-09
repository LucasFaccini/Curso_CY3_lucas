<?php
     require_once '../../connection/conn.php';

     $id = $_GET['id'];

     $sql_codigo = "DELETE FROM recursos WHERE id = '$id'";
     
     if($mysqli->query($sql_codigo) === TRUE)
     {
         header('Location: ../painel.php');
     }
     else{
         echo 'RUIm' . $mysqli->error;
     }
?>
