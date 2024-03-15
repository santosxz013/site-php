<?php 
    
    if(isset($_POST['submit']))
    {
        /* print_r('Nome: ' . $_POST['nome']);
        print_r('<br>');
        print_r('CPF: ' . $_POST['testaCPF']);
        print_r('<br>');
        print_r('E-mail: ' . $_POST['email']);
        print_r('<br>');
        print_r('Data de Nascimento: ' . $_POST['dataNascimento']); */


        include_once('config.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $data = $_POST['data'];


        $query = "INSERT INTO dados(nome,email,senha,data)
        VALUES('$nome','$email','$senha','$data')
        ";

        

        
        $result = mysqli_query($conexao, $query);

         if ($result) {
            header('Location: login.php');
        } else {
            
        } 

    }
  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .btn{
            padding: .6em;
            background-color:#ccc;
            color:black;
            border-radius:9px;
            margin:10px
        }
        .btn:hover{
            background-color:dodgerblue;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <br>
        <a href="index.php" class="btn ">Voltar</a>
    </div>
    <div class="box">
        <form action="cadastroADM.php" method="post">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="data"><b>Data de Nascimento</b></label>
                    <input type="date" name="data" id="data" class="inputUser" required>  
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Cadastrar">
                <br><br>
                <a href="login.php"><legend>Login</legend></a> 
            </fieldset>
        </form>
    </div>
</body>
</html>