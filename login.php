<!DOCTYPE html>
<html lang="en">
    <?php 
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['acesso'])){
            ?>
            <meta http-equiv="refresh" content="0;url=homeAdm.php">
            <?php
        }
    ?>
<head>
    
<?php include_once "head.html"; include_once "conexao.php"; ?>

<script type="text/javascript">
    function validaCampos(){
        if(document.fmLogin.txtLogin.value == ""){
            alert("Por favor, preencha o Login!");
            document.fmLogin.txtLogin.focus();
            return false;
        }
        if(document.fmLogin.txtSenha.value == ""){
            alert("Por favor, preencha uma senha!");
            document.fmLogin.txtSenha.focus();
            return false;
        }   
    }
</script>

<title>Garagem center</title>
</head>
<body class="adm pag-bloqueada">

    <!--- menu superior --->
    
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->

    <!--- Principal --->

    <main class="container">
        <h1 class="text-center">Login - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-6  col-6">
                <img src="img/f.png" class="w-100" alt="">
            </div>

            <div class="col-md-6 col-6">
                <?php 
                    if(isset($_POST['btnSubmitLogin'])){
                        $usuario = $_POST['txtLogin'];
                        $senha = $_POST['txtSenha'];
                        $sql = "SELECT usern, senha FROM usuarios WHERE usern = '$usuario' AND senha = '$senha'";
                        if($res=mysqli_query($con,$sql)){
                            $linhas = mysqli_affected_rows($con);
                            if($linhas > 0){
                                $_SESSION['acesso']=true;
                                $_SESSION['usuario'] = $usuario;

                               ?>
                            <div class="alert alert-success" role="alert">
                                   <h2 class="text-center">Login efetuado com sucesso!</h2>
                                   <br>
                            </div>   
                            <meta http-equiv="refresh" content="1;url=homeAdm.php">
                               <?php
                            }else{ ?>

                            <div class="alert alert-danger" role="alert">
                                   <h2 class="text-center">Usuário ou Senha inválido!</h2>
                                   <br>
                            </div>
                            <a href='login.php' class='btn btn-secondary' target='_self'>Voltar</a>  

                            <?php   
                            }
                        }else{
                            echo "<h3>Erro query</h3>";
                        }
                    }else{
                ?>
                <form action="login.php" name="fmLogin" method="post" onsubmit="return validaCampos();">
                    <h2 class="text-center">Login adm</h2><br>
                    <label for="txtLogin">Login</label>
                    <input type="text" name="txtLogin" placeholder="**" class="form-control text-center"><br>
                    <label for="txtSenha">Senha</label>
                    <input type="password" name="txtSenha" placeholder="**" class="form-control text-center"><br>
                    <button type="submit" name="btnSubmitLogin" class="btn btn-primary w-100">Logar</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </main>

    <!--- Principal --->
    <?php if(isset($con)){ mysqli_close($con);} ?>
</body>
</html>