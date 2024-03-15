<?php 
    
    if(!empty($_GET['id']))
    {
        


        
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM dados WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
                $data = $user_data['data'];
            }
        }
        else{
            header('Location: index.php');
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
        
#update{
    background-image: linear-gradient(to right,rgb(0,92,197),rgb(90,20,220));
    width: 100%;
    outline: none;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
}
#update:hover{
    background-image: linear-gradient(to right,rgb(0,80,172),rgb(80,19,192));
}
        
    </style>
</head>
<body>
    <div class="box">
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="data"><b>Data de Nascimento</b></label>
                    <input type="date" name="data" id="data" class="inputUser" value="<?php echo $data ?>" required>  
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update" value="Salvar">
                <br><br>
                <a href="index.php"><legend>Voltar</legend></a> 
            </fieldset>
        </form>
    </div>
</body>
</html>