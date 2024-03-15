<!DOCTYPE html>
<html lang="en">
<?php 
        if(!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['acesso'] == true){
            
        
    ?>
<head>
    
<?php include_once "head.html"; include_once "conexao.php"; include_once "funcao.php" ?>

<title>Garagem center</title>
    <script type="text/javascript">
        
    </script>
</head>
<body class="adm">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->


    <!--- Principal --->

    <main class="container">
        <br>
        <h1 class="text-center">Banner - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">
                <?php 
                    if(isset($_POST['btnSubmitBanner'])){
                        $link = $_POST['textLinkBanner'];
                        $desc = $_POST['txtDescricao'];
                        $nomeimagem = $_FILES['filiImagem0']['name'];
                            if($nomeimagem <> "" && isset($_FILES['filiImagem0']['name'])){
                                $nomeimagem = enviarImagem($_FILES['filiImagem0']['name'], "banner", $_FILES['filiImagem0']['tmp_name']);
                            }else{
                                $nomeimagem = "";
                            }

                        $sql = "CALL sp_edita_banner('','$desc','$link','$nomeimagem',@saida,@rotulo);";
                        
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
                            <a href='bannerAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                            <?php    
                        }else{
                            echo "Erro";
                        }

                    }else{
                    




                    $sql = 'SELECT * FROM vw_banner ORDER BY codigo_imagem DESC';
                    if($res = mysqli_query($con,$sql)){
                        $linhas = mysqli_affected_rows($con);
                        $codigoImagem = array();
                        $linkImagem = array();
                        $caminhoImagem = array();
                        $descImagem = array();
                        $codigoBanner = array();
                        $i = 0;

                        if($linhas > 0){
                            while($reg = mysqli_fetch_assoc($res)){
                                $codigoImagem[$i] = $reg['codigo_imagem'];
                                $linkImagem[$i] = $reg['link_imagemB'];
                                $caminhoImagem[$i] = $reg['caminho_imagemB'];
                                $descImagem[$i] = $reg['descrica_imagem'];
                                $codigoBanner[$i] = $reg['codigo_banner'];
                                $i++;
                            }
                        }else{
                            for ($i = 0; $i < 3; $i++) { 
                                $codigoImagem[$i] = "";
                                $linkImagem[$i] = "";
                                $caminhoImagem[$i] = "semimg.png";
                                $descImagem[$i] = "SEM DESCRIÇÃO";
                                $codigoBanner[$i] = "";
                            }
                        }
                    }else{
                        echo "erro";
                    }
                ?>
                <div class="alert alert-primary">
                    <h2 class="text-center">ATENÇÂO</h2>
                    <h4 class="text-center">Sempre utilize imagens com as mesma dimensões.
                        <br><strong>Recomendado: </strong>Lagura: 1140px X Altura: 350px
                    </h4>
                </div>

                <form action="bannerAdm.php" name="fmBanner" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <?php
                            for ($i=0; $i < 1; $i++) { 
                                ?>
                           
                        <div class="col-md-4 text-center">
                        
                            <label><strong>Alterar Imagem:</strong></label>
                            <img src="img/banner/<?php echo $caminhoImagem[$i]; ?>" class="img-responsive img-thumbnail">
                            <input type="file" name="filiImagem0" class="btn btn-secondary w-100">
                        </div>
                        
                        <div class="col-md-8 text-center">
                        <h5 class="text-center">Banner<?php echo $i+1 ?></h5>     
                        <br>
                            <label><strong>URL do Banner:</strong></label><br>
                            <input type="text" name="textLinkBanner" value="<?php echo $linkImagem[$i]; ?>" class="form-control" placeholder="link utilizado no Banner">
            <br><br>
                            <label><strong>Descrição do Banner:</strong></label><br>
                            <input type="text" name="txtDescricao" class="form-control" value="<?php echo $descImagem[$i]; ?>" placeholder="pequena descrição do Banner">
                            <br>
                        </div>
                        
                        <hr>
                            
                        <?php }?>
                    </div>
                    <br>
                    
                    <button class="btn btn-primary w-100" name="btnSubmitBanner" type="submit">Salvar alterações</button>
                                <br><br><br>
                </form>
            <?php }?>
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