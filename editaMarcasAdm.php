<!DOCTYPE html>
<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<html lang="en">
<head>
    
<?php include_once "head.html"; include_once "conexao.php"; ?>

    <title>Car center</title>
    <script type="text/javascript">
        function validaCampos(){
            if(document.fmMarcas.txtMarca.value == ""){
                alert("Por favor, preencha o nome da Marca.");
                document.fmMarcas.txtMarca.focus();
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
        <h1 class="text-center">Marcas - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
            <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

                <?php
                    if(isset($_GET['excluirMarca'])){
                        $codigoMarca = $_GET['excluirMarca'];
                        $sql = "CALL sp_deleta_marca($codigoMarca, @saida, @rotulo);";
                        if($res=mysqli_query($con,$sql)){
                            $reg = mysqli_fetch_assoc($res);
                            $saida = $reg['saida'];
                            $rotulo = $reg['saida_rotulo'];

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
                            <a href='marcasAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <meta http-equiv="refresh" content="1;url=marcasAdm.php">
                            <?php
                            
                            
                        }else{
                            echo "Erro";
                        }
                    }else if(isset($_GET['editaMarcasAdm'])){
                        $codigoM = $_GET['editaMarcasAdm'];
                        $_SESSION['codigoMarca'] = $_GET['editaMarcasAdm'];
                        $nomeMarca = $_GET['nomeMarca'];

                        $sql = "SELECT * FROm vw_marcas WHERE id_marca = $codigoM";
                        if($res = mysqli_query($con,$sql)){
                            $reg = mysqli_fetch_assoc($res);
                            $introducao = $reg['intro_marca'];
                            $sobre = $reg['sobre'];
                        }else{
                            echo "erro 2";
                        }

                        ?>
                        <h2 class="text-center">Alteração de Marca</h2>
                        <form action="editaMarcasAdm.php" name="fmMarcas" method="get" onsubmit="return validaCampos()">
                            <label>Nome da Marca:</label><br>
                            <input type="text" name="txtMarca" value="<?php echo $nomeMarca; ?>" class="form-control" maxlength="50"><br>
                            <label for="txtintro">Introdução da Marca:</label><br>
                            <input type="text" name="txtintro" class="form-control" value="<?php echo $introducao; ?>"; placeholder="maximo de caracteres: 100"  maxlength="100"><br>
                            <label for="txtsobre">Sobre a Marca:</label><br>
                            <input type="text" name="txtsobre" class="form-control" value="<?php echo $sobre?>" maxlength="5000"><br>
                            <button type="submit" name="btnSubmitMarcaA" class="btn btn-primary w-100">Alterar</button>
                        </form>
                        <?php
                    }else if(isset($_GET['btnSubmitMarcaA'])){
                        $nomeMarca = $_GET['txtMarca'];
                        $codigoMarca = $_SESSION['codigoMarca'];
                        $intro2 = $_GET['txtintro'];
                        $sobree = $_GET['txtsobre'];
                        $sql = "CALL sp_edita_marca($codigoMarca,'$nomeMarca','$sobree','$intro2',@saida,@rotulo);";
                        if($res=mysqli_query($con,$sql)){
                            $reg=mysqli_fetch_assoc($res);
                            $saida = $reg['saida'];
                            $rotulo = $reg['saida_rotulo'];

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
                            <a href='marcasAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <?php
                            
                            
                        }else{
                            echo "Erro";
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
</html>