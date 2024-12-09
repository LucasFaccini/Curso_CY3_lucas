<?php
        require_once '../connection/conn.php';
        session_start();

        if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sim') {
            $nome = $_SESSION['nome'] ?? 'Usuário'; 
            $sql_codigo_usuario = "SELECT id FROM doc WHERE id='$id'";
            $resultado_id = $mysqli->query($sql_codigo_usuario);
            $conteudo = $resultado_id->fetch_assoc();
            $id = $conteudo['id'];
        } else {
            $id = $_SESSION['id'] ?? 0;
            $sql_codigo_usuario = "SELECT nome FROM doc WHERE id='$id'";
            $resultado_nome = $mysqli->query($sql_codigo_usuario);
            $nome_usuario = $resultado_nome->fetch_assoc();
            $nome = $nome_usuario['nome'] ?? 'Usuário';
        }

        $sql_codigo = "SELECT * FROM recursos WHERE id_doc='$id'";
        $resultado = $mysqli->query($sql_codigo);
            

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="icon" type="image/png" href="../imagens/abaimgs.png">
</head>
<body>   
    <main class="container">
        <h1>
            NECESSARY RESOURCES FOR UPGRADES TO - <?php echo $nome; ?>
        </h1>
        <table>
            <tr class="cabecalho">
                <th>Recurso</th>
                <th>Quantidade</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php 
                if ($resultado->num_rows >= 1){
                    while($item = $resultado->fetch_assoc()){
                        echo '<tr class="infos">';
                            echo '<td>'. $item['nome'] .'</td>';
                            echo '<td>'. number_format($item['qtd_necessaria'], 0, ',', '.') .'</td>';
                            echo '<td class="ho"> <a href="actions/editar.php?id='.$item['id'].'">Editar</a> </td>';
                            echo '<td class="ho"> <a href="actions/deletar.php?id='.$item['id'].'">Deletar</a> </td>';
                        echo '</tr>';
                    }
                }
            ?>
            <tr>
                <td class="add" colspan="4"><?php
        echo '<a type="submit" class="botao_add" href="actions/adicionar.php?">Adicionar</a>';
    ?></td>
            </tr>
        </table>
    </main>
    <div>
    <?php
        echo '<a type="submit" class="botao_logout" href="actions/logout.php?">Sair</a>';
    ?>
    </div>
</body>
</html>