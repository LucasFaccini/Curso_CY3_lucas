<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>cadastrar fornecedor</h1>
        <form action="../../db/criar_fornecedor.php" method="post">
            <div>
                <label for="nome">nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="cidade">cidade</label>
                <input type="text" name="cidade" id="cidade" required>
            </div>
            <div>
                <button type="submit">cadastrar</button>
                <a href="fornecedores_painel.php">voltar</a>
            </div>
        </form>
    </main>
</body>
</html>