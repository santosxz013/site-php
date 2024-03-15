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
        if(document.fmUsuarios.txtSenha1.value == ""){
            alert("Por favor, preencha uma senha!");
            document.fmUsuarios.txtSenha1.focus();
            return false;
        }
        if(document.fmUsuarios.txtSenha2.value == ""){
            alert("Por favor, repita a senha");
            document.fmUsuarios.txtSenha2.focus();
            return false;
        }
        if(document.fmUsuarios.txtSenha1.value != document.fmUsuarios.txtSenha2.value){
            alert("As senhas devem ser iguais");
            document.fmUsuarios.txtSenha2.focus();
            return false;
        }
    }
</script>

<title>Garagem center</title>

</head>
<body class="adm">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->


    <!--- Principal --->

    <main class="container">
        <br>
        <h1 class="text-center">Usuarios - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">
                <?php
                        if(isset($_POST['btnSubmitUsuario'])){
                            $nome = $_POST['txtNome'];
                            $email = $_POST['txtEmail'];
                            $login = $_POST['txtLogin'];
                            $senha = $_POST['txtSenha1'];
                            $nivel = $_POST['selNivel'];
                            $salt = '123';

                            $sql = "CALL sp_cadastra_usuario('$nome','$login','$email','$senha','$salt','$nivel',@saida,@rotulo)";
                            if($res=mysqli_query($con,$sql)){
                                $reg=mysqli_fetch_assoc($res);
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
                                <?php
                                
                                
                            }else{
                                echo "Erro";
                            }
                        }else{
                    ?>

                        <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#tabForm" class="nav-link active" id="linkform" data-toggle="tab" role="tab" aria-controls="tabForm">Cadastro</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#tabExibicao" class="nav-link" id="linkExibicao" data-toggle="tab" role="tab" aria-controls="tabExibicao">Usuarios cadastrados</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="meusConteudos">
                                        <br>
                                        <div class="tab-pane fade show active" id="tabForm" role="tabpanel" aria-labelledby="linkform">
                                            
                                        <h3 class="text-center">Cadastrar novo usuario</h3><br>
                                <form action="usuariosAdm.php" method="post" name="fmUsuarios" onsubmit="return validaCampos()">
                                    <label for="txtNome">Nome:</label><br>
                                    <input type="text" name="txtNome" class="form-control" maxlentgh="70"><br>
                                    
                                    <label for="txtEmail">E-mail:</label><br>
                                    <input type="email" name="txtEmail" class="form-control" maxlentgh="50" aria-describedby="emailHelp"><br>

                                    <label for="txtLogin">Login:</label><br>
                                    <input type="text" name="txtLogin" class="form-control" maxlentgh="30"><br>

                                    <label for="txtSenha1">Senha:</label><br>
                                    <input type="password" name="txtSenha1" class="form-control" maxlentgh="16"><br>
                                
                                    <label for="txtSenha2">Repita a Senha:</label><br>
                                    <input type="password" name="txtSenha2" class="form-control" maxlentgh="16"><br>
                                
                                    <label for="">Nível de Usuario</label>
                                    <select name="selNivel" class="form-control" id="">
                                        <option value="2">2 - Moderador</option>
                                        <option value="1">1 - Administrador</option>
                                    </select>
                                    <br><br>
                                    <button type="submit" name="btnSubmitUsuario" class="btn btn-primary w-100">Cadastrar Usuario</button><br><br><br>
                                </form>
                            <?php } ?>

                            </div>
                            <div class="tab-pane fade" id="tabExibicao" role="tabpanel" aria-labelledby="linkExibicao">
                                <br>
                                <h2 class="text-center">Usuarios Cadastrados</h2><br>
                                <div class="row">
                                    <?php 
                                        $sql = "SELECT * FROM vw_usuarios";
                                        if($res=mysqli_query($con,$sql)){
                                            $nomeUsuario = array();
                                            $codigoUsuario = array();
                                            $i = 0;

                                            while($reg=mysqli_fetch_assoc($res)){
                                                $nomeUsuario[$i] = $reg['nome_usuario'];
                                                $codigoUsuario[$i] = $reg['codigo_usuario'];
                                                ?>
                                                
                                                <div class="col-md-4 itensCadastrados text-center">
                                                <h4><?php echo $nomeUsuario[$i]; ?></h4>
                                                    <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                                    <a href="editaUsuario.php?editaUsuario=<?php echo $codigoUsuario[$i]; ?>&nomeCategoria=<?php echo $nomeUsuario[$i]; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                                    <a href="editaUsuario.php?excluirUsuario=<?php echo $codigoUsuario[$i]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa categoria?')"><i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </div>
                                                
                                                <?php
                                                $i++;    
                                            }
                                        }else{
                                            echo "erro query";
                                        }
                                    ?>
                                </div>
                                
                            </div>
                        </div>

                        <br><br><br>

               
                
                
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