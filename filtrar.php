<?php 
include 'bancoLivros.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Scriptum - Resultado da busca</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

<div class="container">
    <div class="resultado-categoria">
        <div class="bloco-filtro">
            <h2>Filtrando por: <span><?= htmlspecialchars($_GET['categorias'] ?? 'Todas') ?></span></h2>
            <a href="index.php" class="btn-voltar">Voltar ao catálogo</a>
        </div>
    </div>
</div>


    <?php
    // Obtém a categoria selecionada da URL ou define como vazio
    $categoriaSelecionada = $_GET["categorias"] ?? '';
    $livrosFiltrados = [];

    foreach ($livros as $livro) {
        // Verifica se deve mostrar todos ou apenas os da categoria selecionada
        if (in_array($categoriaSelecionada, (array) $livro['categorias'])) {
            $livrosFiltrados[] = $livro;
        }
    }
    ?>

    <div class="livros">
        <?php if (count($livrosFiltrados) === 0): ?>
            <p style="text-align: center;">Nenhum livro encontrado para essa categoria.</p>
        <?php else: ?> <!-- Se encontrou livros -->
            <?php foreach ($livrosFiltrados as $livro): ?> <!-- Loop pelos livros -->
                <div class="livro">
                    <a href="detalhes.php?id=<?= $livro['id'] ?>">
                        <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa de <?= htmlspecialchars($livro['titulo']) ?>">
                    </a>
                    <h3><?= htmlspecialchars($livro['titulo']) ?></h3>
                    <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
                    <p><strong>Categorias:</strong> <?= htmlspecialchars(implode(', ', (array)$livro['categorias'])) ?></p>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= include 'includes/footer.php'; ?>
</body>
</html>