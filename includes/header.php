<?php
// Garante que a sessão esteja iniciada, para podermos verificar se o usuário está logado
if (session_status() === PHP_SESSION_NONE) {
   // session_start();
}
?>

<header class="site-header">
    <div class="container">
        <h1 class="logo"><a href="index.php">Scriptum</a></h1>
        <nav class="nav-links">
            <a href="index.php">Início</a>

            <?php if (isset($_SESSION['usuario'])): ?>
                <!-- Se o usuário estiver logado, exibe a saudação com o nome -->
                <span>Olá, <?= htmlspecialchars($_SESSION['usuario']) ?>!</span>
                <a href="adicionarLivro.php">Adicionar Livro</a>
                <a href="logout.php">Sair</a>
            <?php else: ?>
                <!-- Se o usuário não estiver logado, exibe apenas o botão de login -->
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>

        </nav>
    </div>
</header>
