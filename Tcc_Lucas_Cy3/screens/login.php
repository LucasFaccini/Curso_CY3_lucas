<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <div>
            <h1 class="h1">Login</h1>
        </div>
        <form action="../db/verificar.php" method="post">
            <div class="mb-3">
                <label>Usuario</label>
                <input type="text" placeholder="Digite seu usuario" name="user">
            </div>
            <div>
                <label>Senha</label>
                <input type="pass" placeholder="Digite sua senha" name="pass">
            </div>
            <div>
                <button type="submit" class="">Entrar</button>
                <a href="cadastrar.php" class="">Cadastrar</a>
            </div>
        </form>
    </main>
</body>
</html>