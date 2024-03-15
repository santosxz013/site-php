<!DOCTYPE html>
<html lang="en">
<?php 
        if(!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['acesso'] == true){
            
        
    ?>
<head>
    
<?php include_once "head.html"; include_once "conexao.php"; include_once "funcao.php"; ?>

<title>Garagem center</title>
    <script type="text/javascript">
        function validaCampos(){
            if(document.fmmarcas.txtmarca.value == ""){
                alert("Por favor, preencha o nome da Marca.");
                document.fmmarcas.txtmarca.focus();
                return false;
            }
            if(document.fmmarcas.txtintroMarca.value == ""){
                alert("Por favor, preencha a introdução da marca.");
                document.fmmarcas.txtintroMarca.focus();
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
        <h1 class="text-center">Marcas - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

                <?php
                    if(isset($_POST['btnSubmitMarca'])){
                        $nomeMarca = $_POST['txtmarca'];
                        $link = $nomeMarca;
                        $intro = $_POST['txtintroMarca'];
                        $sobreM = $_POST['txtsobre'];

                        $nomeimagem = $_FILES['fileimg1']['name'];
                            if($nomeimagem <> "" && isset($_FILES['fileimg1']['name'])){
                                $nomeimagem = enviarImagem($_FILES['fileimg1']['name'], "marcas", $_FILES['fileimg1']['tmp_name']);
                            }else{
                                $nomeimagem = "";
                            }

                        $sql = "CALL sp_cadastra_marca('$nomeMarca','$link','$intro','$sobreM','$nomeimagem',@saida,@rotulo);";
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
                            echo "Erro no banco de dados: " . mysqli_error($con);
                        }

                    }else{
                ?>

                <h2 class="text-center">Cadastro de Marcas</h2>
                <form action="marcasAdm.php" name="fmmarcas" method="post" enctype="multipart/form-data" onsubmit="return validaCampos()">
                    <label for="txtmarca">Nome da Marca:</label><br>
                    <input type="text" name="txtmarca" class="form-control" placeholder="nome da marca:" maxlength="50"><br>
                    <label for="txtintroMarca">Introdução da Marca:</label><br>
                    <input type="text" name="txtintroMarca" class="form-control" placeholder="maximo de caracteres: 100"  maxlength="100"><br>
                    <label for="txtintroMarca">Sobre a Marca:</label><br>
                    <input type="text" name="txtsobre" class="form-control" placeholder="Fale sobre a marca"  maxlength="5000"><br>
                    
                    <label>Logo da Marca:</label>
                    <input type="file" name="fileimg1" class="btn btn-secondary w-100" accept="image/png, image/jpeg"><br><br>
                    <div class="alert alert-primary">
                                    <h2 class="text-center">ATENÇÂO</h2>
                                    <h4 class="text-center">Sempre utilize imagens com as mesma dimensões.</h4>
                                </div>
                    <button type="submit" name="btnSubmitMarca" class="btn btn-primary w-100">Cadastrar</button>
                </form>
                <br>
                <hr>
                <h2 class="text-center">Marcas Cadastradas:</h2>
                <div class="row">
                    <?php
                        $sql = 'SELECT * FROM vw_marcas';
                        if($res=mysqli_query($con, $sql)){
                            $nomeMarca = array();
                            $linkMarca = array();
                            $idMarca = array();
                            $imagemMarca = array();
                            $introdu = array();
                            $sobre = array();
                            $i = 0;
                            while($reg=mysqli_fetch_assoc($res)){
                                $nomeMarca[$i] = $reg['nome_marca'];
                                $linkMarca[$i] = $reg['link_marca'];
                                $idMarca[$i] = $reg['id_marca'];
                                $imagemMarca[$i] = $reg['caminho_imagem'];
                                $introdu[$i] = $reg['intro_marca'];
                                $sobre[$i] = $reg['sobre'];

                                if(!isset($imagemMarca[$i])){
                                    $imagemMarca[$i] = "semimg.png";
                                }

                                ?>
                                
                                    <div class="col-md-3 itensCadastrados text-center" style="margin-left: 30px">
                                        <img src="img/marcas/<?php echo $imagemMarca[$i]; ?>" class="img-responsive img-thumbnail">
                                        <h4><?php echo $nomeMarca[$i]; ?></h4>
                                        <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                        <a href="editaMarcasAdm.php?editaMarcasAdm=<?php echo $idMarca[$i]; ?>&nomeMarca=<?php echo $nomeMarca[$i]; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                        <a href="editaMarcasAdm.php?excluirMarca=<?php echo $idMarca[$i]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa Marca?')"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    
                                <?php
                                $i++;
                            }
                        }
                        
                    ?>
                </div>
                <br><br><br>
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
</html>