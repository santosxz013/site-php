<!DOCTYPE html>

<html lang="en">
<?php 
        if(!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['acesso'] == true){
            
        
    ?>
<head>
    
<?php include_once "head.html"; include_once "conexao.php"; ?>

<title>Garagem center</title>
    <script type="text/javascript">
        function validaCampos(){
            if(document.fmUsuarios.txtNome.value == ""){
            alert("Por favor, preencha o nome!");
            document.fmUsuarios.txtNome.focus();
            return false;
        }
        if(document.fmUsuarios.txtEmail.value == ""){
            alert("Por favor, preencha o E-mail!");
            document.fmUsuarios.txtEmail.focus();
            return false;
        }
        if(document.fmUsuarios.txtLogin.value == ""){
            alert("Por favor, preencha o Login!");
            document.fmUsuarios.txtLogin.focus();
            return false;
        }
        }
    </script>
</head>
<body class="adm">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->


    <!--- Principal --->

    <main class="container">
        <h1 class="text-center">Usuarios - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

            <?php
                    if(isset($_GET['excluirUsuario'])){
                        $codigo = $_GET['excluirUsuario'];
                        $sql = "CALL sp_deleta_usuario('$codigo', @saida, @rotulo);";
                        if($res=mysqli_query($con,$sql)){
                            $reg = mysqli_fetch_assoc($res);
                            $saida = $reg['saida'];
                            $rotulo = $reg['rotulo'];

                            switch($rotulo){
                                case 'TUDO CERTO!';
                                $alert = 'alert-success';
                                break;
                                case 'OPS!';
                                $alert = 'alert-warning';
                                break;
                                case 'ERRO!';
                                $alert = 'alert-danger';
                                break;
                            }
                            ?>
                            <div class="alert <?php echo $alert;?>" role="alert">
                                <h3><?php echo $rotulo; ?></h3>
                                    <?php echo $saida; ?>
                                   
                            </div>
                            <a href='usuariosAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <meta http-equiv="refresh" content="1;url=usuariosAdm.php">
                            <?php
                            
                            
                        }else{
                            echo "Erro";
                        }
                    }else if(isset($_GET['editaUsuario'])){
                        $codigoUsuario = $_GET['editaUsuario'];
                        
                        

                        $sql = "SELECT * FROm vw_usuarios WHERE codigo_usuario = $codigoUsuario";
                        if($res = mysqli_query($con,$sql)){
                            $reg = mysqli_fetch_assoc($res);
                            $nomeUsuario = $reg['nome_usuario'];
                            $emailUsuario = $reg['email_usuario'];
                            $loginUsuario = $reg['user_usuario'];
                            $_SESSION['usuario'] = $loginUsuario;
                        }else{
                            echo "erro 2";
                        }


                        ?>



                        <h2 class="text-center">Alteração de Usuario</h2>
                        <form action="editaUsuario.php" name="fmUsuarios" method="post" onsubmit="return validaCampos()">
                            <label>Nome</label><br>
                            <input type="text" name="txtNome" value="<?php echo $nomeUsuario; ?>" class="form-control" maxlength="50"><br>
                            <label>Email</label><br>
                            <input type="text" name="txtEmail" value="<?php echo $emailUsuario; ?>" class="form-control" maxlength="100"><br>
                            <label>Login</label><br>
                            <input type="text" name="txtLogin" value="<?php echo $loginUsuario; ?>" class="form-control" maxlength="100"><br>
                            <button type="submit" name="btnSubmitusuario" class="btn btn-primary w-100">Alterar</button>
                        </form>



                        <?php
                    }else if(isset($_POST['btnSubmitusuario'])){
                        $nomeUsuario = $_POST['txtNome'];
                        $emailUsuario = $_POST['txtEmail'];
                        $loginNovo = $_POST['txtLogin'];
                        $loginAntigo = $_SESSION['usuario'];
                        
                        
                        $sql = "CALL sp_edita_usuario('$loginAntigo','$loginNovo','$nomeUsuario','$emailUsuario',@saida,@rotulo);";
                        if($res=mysqli_query($con,$sql)){
                            $reg=mysqli_fetch_assoc($res);
                            $saida = $reg['saida'];
                            $rotulo = $reg['rotulo'];

                            switch($rotulo){
                                case 'TUDO CERTO!';
                                $alert = 'alert-success';
                                if($loginAntigo != $loginNovo){
                                    $_SESSION['usuario'] = $loginNovo;
                                }
                                break;
                                case 'OPS!';
                                $alert = 'alert-warning';
                                break;
                                case 'ERRO!';
                                $alert = 'alert-danger';
                                break;
                            }
                            ?>

                            <div class="alert <?php echo $alert;?>" role="alert">
                                <h3><?php echo $rotulo; ?></h3>
                                    <?php echo $saida; ?>
                                   
                            </div>
                            <a href='usuariosAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <?php
                            
                            
                        }else{
                            echo "Erro aonde";
                        }
                    }else{
                
                    }
                ?>
                
                  
            </div>   
        </div>
    </main>

    <!--- Principal --->
        <?php if(isset($con)){ mysqli_close($con);} ?>
</body>
<?php
        }else{
            ?>
            <meta http-equiv="refresh" content="0;url=login.php">

            <?php
        }
?>
</html>