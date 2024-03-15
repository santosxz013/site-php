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
</head>
<body class="adm">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->


    <!--- Principal --->

    <main class="container">
        <br>
        <h1 class="text-center">Carros - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">
                <h2>Carros Cadastradas</h2>
                    <div class="row">
                        <?php
                                $sql = 'SELECT * FROM vw_carros order by codigo_carro desc';
                                if($res=mysqli_query($con, $sql)){
                                    $nomeCarro = array();
                                    $codigoCarro = array();
                                    $imagemMoto = array();
                                    $i = 0;
                                    $linhas = 0;
                                    while($reg=mysqli_fetch_assoc($res)){
                                        $linhas = mysqli_affected_rows($con);
                                        $nomeCarro[$i] = $reg['nome_carro'];
                                        $codigoCarro[$i] = $reg['codigo_carro'];
                                        $imagemMoto[$i] = $reg['caminho_imagem'];

                                        $imagemMoto[$i] = isset($imagemMoto[$i]) ? $imagemMoto[$i] : "semimg.png";


                                        ?>
                                        
                                            <div class="col-md-3 itensCadastrados text-center">
                                                <img src="img/carros/<?php echo $imagemMoto[$i]; ?>" class="img-responsive img-thumbnail">
                                                <h4><?php echo $nomeCarro[$i]; ?></h4>
                                                <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                                <a href="editaCarroAdm.php?editaCarroAdm=<?php echo $codigoCarro[$i]; ?>&nome=<?php echo $nomeCarro[$i]; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                                <a href="editaCarroAdm.php?excluirCarro=<?php echo $codigoCarro[$i]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esse Carro?')"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </div>
                                            
                                        <?php
                                        $i++;
                                    }
                                }
                                
                        ?>
                    </div>
                <br><br><br>
            </div>
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