<?php
session_start(); // Inicie a sessão

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) { // Remova o ponto e vírgula aqui
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Use instruções preparadas para evitar injeção SQL
    $stmt = $conexao->prepare("SELECT * FROM dados WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        // Redirecionar em caso de falha no login
        header('Location: login.php?error=1');
        exit();
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: index.php');
        exit();
    }
}
?>
