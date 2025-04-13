<?php 
session_start();
include 'bancoLivros.php'; 
include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Scriptum - Catálogo</title>
    <link rel="stylesheet" href="style.css?v=1">

</head>
<body>

<div class="container">
    <div class="boas-vindas">
        <h1>Bem-vindo ao <span>Scriptum</span></h1>
        <h2>Descubra nosso catálogo de livros</h2>

        <form method="GET" action="filtrar.php" class="form-categorias">
            <label for="categorias">Filtrar por categoria:</label>
            <select name="categorias" id="categorias" onchange="this.form.submit()">
                <option value="">Todas as Categorias</option>
            <?php
                $todasCategorias = []; 

                foreach ($livros as $livro) { 
                    // Para cada categoria do livro, adiciona ao array
                    foreach ($livro['categorias'] as $cat) { 
                        $todasCategorias[$cat] = true; // usando true só p garantir
                    }
                }
                // Exibe todas as categorias únicas como opções do select
                foreach (array_keys($todasCategorias) as $cat) { 
                    echo "<option value=\"$cat\">$cat</option>"; // Cria uma opção no seletor para cada categoria única
                }
            ?>

            </select>
        </form>
    </div>

    <div class="livros">
        <?php foreach ($livros as $livro): ?>
            <div class="livro">
                <a href="detalhes.php?id=<?= $livro['id'] ?>"> 
                    <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa de <?= htmlspecialchars($livro['titulo']) ?>"> 
                </a>
                
                <h3><?= htmlspecialchars($livro['titulo']) ?></h3> 

                <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p> 

                <p><strong>Categorias:</strong> 
                <?= is_array($livro["categorias"]) 
                    ? htmlspecialchars(implode(', ', $livro["categorias"])) 
                    : htmlspecialchars($livro["categorias"]) ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= include 'includes/footer.php'; ?> 
</body>
</html>