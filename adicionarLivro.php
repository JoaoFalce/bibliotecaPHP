<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro - Scriptum</title> 
    <link rel="stylesheet" href="style.css?v=1"> 
</head>
<body>
    <?php include 'includes/header.php'; ?> 

    <div class="form-adicionar">
        <h2>Adicionar Novo Livro</h2>
        
        <form action="salvarLivro.php" method="post">
    
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>
            
            
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" required>
            
            
            <label for="categoria">Categoria:</label>
            <input type="text" name="categorias" id="categorias" required>
            
           
            <label for="imagem">URL da Imagem:</label>
            <input type="text" name="imagem" id="imagem" required>
            
            
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="5" required></textarea>
            
            
            <button type="submit">Adicionar Livro</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>