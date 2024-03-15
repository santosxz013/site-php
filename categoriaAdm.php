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
        <br>
        <h1 class="text-center">Categorias - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php"; ?>
            </div>

            <div class="col-md-9 col-9">

                <?php
                    if(isset($_GET['btnSubmitCategoria'])){
                        $nomeCategoria = $_GET['txtCategoria'];
                        $link = $nomeCategoria;
                        $sql = "CALL sp_cadastra_categoria('$nomeCategoria','$link',@saida,@rotulo);";
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
                ?>

                <h2 class="text-center">Cadastro de categoria</h2>
                <form action="categoriaAdm.php" name="fmCategorias" method="get" onsubmit="return validaCampos()">
                    <label for="txtCategoria">Nome da categoria:</label><br>
                    <input type="text" name="txtCategoria" class="form-control" maxlength="50"><br>
                    <button type="submit" name="btnSubmitCategoria" class="btn btn-primary w-100">Cadastrar</button>
                </form>
                <br>
                <hr>
                <h2 class="text-center">Categorias Cadastradas:</h2>
                <br>
                <div class="row">
                    <?php
                        $sql = 'SELECT * FROM vw_retorna_categorias';
                        if($res=mysqli_query($con, $sql)){
                            $nomeCategoria = array();
                            $linkCategoria = array();
                            $idCategoria = array();
                            $i = 0;
                            while($reg=mysqli_fetch_assoc($res)){
                                $nomeCategoria[$i] = $reg['Nome_Categoria'];
                                $linkCategoria[$i] = $reg['Link_Categoria'];
                                $idCategoria[$i] = $reg['id_Categoria'];
                                ?>
                                
                                    <div class="col-md-3 itensCadastrados text-center">
                                        <h4><?php echo $nomeCategoria[$i]; ?></h4>
                                        <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                        <a href="editaCategoria.php?editaCategoria=<?php echo $idCategoria[$i]; ?>&nomeCategoria=<?php echo $nomeCategoria[$i]; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                        <a href="editaCategoria.php?excluirCategoria=<?php echo $idCategoria[$i]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa categoria?')"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                <?php
                                $i++;
                            }
                        }
                        
                    ?>
                </div>
                <?php
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
</html