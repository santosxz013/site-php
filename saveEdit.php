<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data = $_POST['data'];

        $sqlUpdate = "UPDATE dados SET nome='$nome',email='$email',senha='$senha',data='$data' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: index.php');
?>