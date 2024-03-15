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
            if(document.fmCategorias.txtCategoria.value == ""){
                alert("Por favor, preencha o nome da categoria.");
                document.fmCategorias.txtCategoria.focus();
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
        <h1 class="text-center">Categorias - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php"; ?>
            </div>

            <div class="col-md-9 col-9">

                <?php
                    if(isset($_GET['excluirCategoria'])){
                        $codigoCategoria = $_GET['excluirCategoria'];
                        $sql = "CALL sp_deleta_categoria('$codigoCategoria', @saida, @rotulo);";
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
                            <a href='categoriaAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <?php
                            
                            
                        }else{
                            echo "Erro";
                        }
                    }else if(isset($_GET['editaCategoria'])){
                        $_SESSION['codigoCategoria'] = $_GET['editaCategoria'];
                        $nomeCategoria = $_GET['nomeCategoria'];
                        ?>
                        <h2 class="text-center">Alteração de categoria</h2>
                        <form action="editaCategoria.php" name="fmCategorias" method="get" onsubmit="return validaCampos()">
                            <label>Nome da categoria:</label><br>
                            <input type="text" name="txtCategoria" value="<?php echo $nomeCategoria; ?>" class="form-control" maxlength="50"><br>
                            <button type="submit" name="btnSubmitCategoria" class="btn btn-primary w-100">Alterar</button>
                        </form>
                        <?php
                    }else if(isset($_GET['btnSubmitCategoria'])){
                        $nomeCategoria = $_GET['txtCategoria'];
                        $codigoCategoria = $_SESSION['codigoCategoria'];
                        $sql = "CALL sp_edita_categoria($codigoCategoria,'$nomeCategoria',@saida,@rotulo);";
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
                            <a href='categoriaAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
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