<?php
    require_once ('../../connection/conn.php');

    $sql_codigo = 'SELECT * FROM fornecedores';
    $resultado = $mysqli->query($sql_codigo);

    if ($resultado->num_rows > 0) {
        $infos = $resultado->fetch_all();
    }else{
        $infos = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>
<body>
    <main>
        <h1>
            Fornecedores
        </h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
            <?php
            if (count($infos) == 0){
                echo '<tr>
                        <td colspan="4">Nenhum registrado</td>
                    </tr>';
            }else{
                foreach($infos as $item){
                    $id = $item[0];
                    $nome = $item[1];
                    $cidade = $item[2];
                    echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$nome.'</td>
                        <td>'.$cidade.'</td>
                        <td><a href="formulario_editar.php?id='.$id.'">editar</a> | <a href="../../db/deletar_fornecedor.php?id='.$id.'">deletar</a></td>
                    </tr>';
                }
            }
            ?>
            <tr>
                <td colspan="4"><a href="formulario.php">+</a></td>
            </tr>
        </table>
    </main>
</body>
</html>