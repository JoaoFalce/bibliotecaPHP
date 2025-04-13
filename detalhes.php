<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1">

    <title>Scriptum</title>
</head>
<body>
    
<?php
include 'bancoLivros.php';
include 'includes/header.php';

$id = $_GET['id'] ?? null;
$livro = null;

// Procura o livro com o ID correspondente no array $livros
foreach ($livros as $l) {
    if ($l['id'] == $id) {
        $livro = $l; // Armazena o livro encontrado
        break; // Sai do loop
    }
}
if (!$livro) {
    echo "<div class='container'><p>Livro não encontrado.</p></div>";
    include 'includes/footer.php';
    exit;
}
?>



<div class="container detalhes">
    <div class="livro-detalhado">

        <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa de <?= htmlspecialchars($livro['titulo']) ?>">

        <div class="info">

            <h1><?= htmlspecialchars($livro['titulo']) ?></h1>

            <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>

            <p><strong>Categoria:</strong> <?= htmlspecialchars(implode(', ', (array)$livro['categorias'])) ?></p>

            <p><strong>Descrição:</strong></p>
            <p><?= nl2br(htmlspecialchars($livro['descricao'])) ?></p>

            <div class="voltar-catalogo">
                <a href="index.php" class="btn-voltar">← Voltar ao Catálogo</a>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
</body>
</html>