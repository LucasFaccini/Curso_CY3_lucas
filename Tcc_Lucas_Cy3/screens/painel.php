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
    <title>Lista</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="icon" type="image/png" href="../imagens/abaimgs.png">
</head>
<body>
    <main class="container">
        <h1>
            NECESSARY RESOURCES FOR UPGRADES TO - <?php echo $nome; ?>
        </h1>
        <div class="conteudo">
            <section class="lista">
                <table>
                    <tr class="cabecalho">
                        <th>Recurso</th>
                        <th>Quantidade</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    <?php 
                        if ($resultado->num_rows >= 1) {
                            while ($item = $resultado->fetch_assoc()) {
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
                        <td class="add" colspan="4">
                            <?php
                                echo '<a type="submit" class="botao_add" href="actions/adicionar.php?">Adicionar</a>';
                            ?>
                        </td>
                    </tr>
                </table>
            </section>

            <section class="calculadora">
                <h2>Calculadora</h2>
                <form id="calculadora-form">
                    <div>
                        <label for="valor1">Valor 1:</label>
                        <input type="number" id="valor1" required>
                    </div>
                    <div>
                        <label for="valor2">Valor 2:</label>
                        <input type="number" id="valor2" required>
                    </div>
                    <div class="botoes-calc">
                        <button type="button" onclick="calcular('+')">+</button>
                        <button type="button" onclick="calcular('-')">-</button>
                        <button type="button" onclick="calcular('*')">*</button>
                        <button type="button" onclick="calcular('/')">/</button>
                    </div>
                    <div>
                        <label>Resultado:</label>
                        <input type="text" id="resultado" readonly>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <div>
        <?php
            echo '<a type="submit" class="botao_logout" href="actions/logout.php?">Sair</a>';
        ?>
    </div>

    <script>
        function calcular(operador) {
            const valor1 = parseFloat(document.getElementById('valor1').value);
            const valor2 = parseFloat(document.getElementById('valor2').value);
            let resultado;

            switch (operador) {
                case '+':
                    resultado = valor1 + valor2;
                    break;
                case '-':
                    resultado = valor1 - valor2;
                    break;
                case '*':
                    resultado = valor1 * valor2;
                    break;
                case '/':
                    resultado = valor2 !== 0 ? valor1 / valor2 : 'Erro: Divisão por zero';
                    break;
            }

            document.getElementById('resultado').value = resultado;
        }
    </script>
</body>
</html>