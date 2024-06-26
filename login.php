<?php
session_start();

// Usuário e senha de exemplo (substitua por verificação de banco de dados em produção)
$valid_username = "admin";
$valid_password = "admin";

// Pega os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verifica se os dados estão corretos
if ($username === $valid_username && $password === $valid_password) {
    // Login bem-sucedido
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    // Login falhou
    echo "Usuário ou senha inválidos.";
}
?>