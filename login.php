<?php
session_start();

if (isset($_SESSION['usuario'])) { 
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Scriptum</title>
    <link rel="stylesheet" href="style.css?v=1">

</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container login-form">
        <h2>Login</h2>
        <?php if (isset($_GET['erro'])): ?>
            <p class="mensagem-erro">Usuário ou senha inválidos.</p>
        <?php endif; ?>
        <form action="autenticar.php" method="post"> 
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>