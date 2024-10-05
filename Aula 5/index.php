<?php 
    include('../Conexoes/conexao_estoque.php');

    $sql_codigo = 'SELECT * FROM itens';
    $resultado = $mysqli->query($sql_codigo);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>
        Padaria dos sonhos
    </h1>
    <main class="container">
        <table>
            <tr class="cabecalho">
                <th>nome</th>
                <th>quantidade</th>
                <th>ações</th>
            </tr>
            <?php 
                if ($resultado->num_rows >= 1){
                    while($item = $resultado->fetch_assoc()){
                        echo '<tr class="infos">';
                            echo '<td>'. $item['nome'] .'</td>';
                            echo '<td>'. $item['quantidade'].'</td>';
                            echo '<td class="ho"> <a href="editar.php?id='.$item['id'].'">editar</a> </td>';
                            echo '<td class="ho"> <a href="deletar.php?id='.$item['id'].'">deletar</a> </td>';
                        echo '</tr>';
                    }
                }
            ?>
            <tr>
                <td class="add" colspan="4"><?php
        echo '<a type="submit" class="botao_add" href="adicionar.php?">Adicionar</a>';
    ?></td>
            </tr>
        </table>
    </main>
</body>
</html>