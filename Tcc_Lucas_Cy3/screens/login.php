<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" type="image/png" href="../imagens/abaimgs.png">
    <title>Arknights - Login</title>
    <script>
        window.onload = function() {
            document.getElementById("user").value = "";
            document.getElementById("pass").value = "";
        };
    </script>
</head>
<body>
    <main>
        <div>
            <h1 class="h1">Login</h1>
        </div>
        <form action="../db/verificar.php" method="post">
            <div class="mb-3">
                <label>Usuário</label>
                <input type="text" placeholder="Digite seu usuário" name="user" autocomplete="off">
            </div>
            <div>
                <label>Senha</label>
                <input type="pass" placeholder="Digite sua senha" name="pass" autocomplete="off">
            </div>
            <div>
                <button type="submit" class="">Entrar</button>
                <a href="cadastrar.php" class="">Cadastrar</a>
            </div>
        </form>
    </main>
</body>
</html>