<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include 'bancoLivros.php';

if (isset($_POST['titulo'], $_POST['autor'], $_POST['categorias'], $_POST['imagem'], $_POST['descricao'])) {
    $novoLivro = [
        'id' => count($livros) + 1,
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'categorias' => is_array($_POST['categorias']) ? $_POST['categorias'] : array($_POST['categorias']),
        'imagem' => $_POST['imagem'],
        'descricao' => $_POST['descricao']
    ];
    // Adiciona o novo livro ao array de livros
    $livros[] = $novoLivro;
    // Atualiza o arquivo bancoLivros.php com os novos dados
    file_put_contents('bancoLivros.php', '<?php $livros = ' . var_export($livros, true) . ';');
    header("Location: index.php");
    exit;
} else {
    echo "Erro: Preencha todos os campos.";
}