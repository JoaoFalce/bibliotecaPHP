<?php
session_start();


$usuarioRoot = "admin";
$senhaRoot = "1234";

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($_POST['usuario'] === $usuarioRoot && $_POST['senha'] === $senhaRoot) {
    $_SESSION['usuario'] = $_POST['usuario'];
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?erro=1");
    exit;
}