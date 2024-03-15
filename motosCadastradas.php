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
        <h1 class="text-center">Motos - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">
                <h2>Motos Cadastradas</h2>
                    <div class="row">
                        <?php
                                $sql = 'SELECT * FROM vw_motos order by codigo_moto desc';
                                if($res=mysqli_query($con, $sql)){
                                    $nome = array();
                                    $codigoMoto = array();
                                    $imagemMoto = array();
                                    $i = 0;
                                    $linhas = 0;
                                    while($reg=mysqli_fetch_assoc($res)){
                                        $linhas = mysqli_affected_rows($con);
                                        $nome[$i] = $reg['nome_moto'];
                                        $codigoMoto[$i] = $reg['codigo_moto'];
                                        $imagemMoto[$i] = $reg['caminho_imagem'];

                                        $imagemMoto[$i] = isset($imagemMoto[$i]) ? $imagemMoto[$i] : "semimg.png";


                                        ?>
                                        
                                            <div class="col-md-3 itensCadastrados text-center">
                                                <img src="img/motos/<?php echo $imagemMoto[$i]; ?>" class="img-responsive img-thumbnail">
                                                <h4><?php echo $nome[$i]; ?></h4>
                                                <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                                <a href="editaMotoAdm.php?editaMotoAdm=<?php echo $codigoMoto[$i]; ?>&nome=<?php echo $nome[$i]; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                                <a href="editaMotoAdm.php?ExcluirMoto=<?php echo $codigoMoto[$i]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir essa Moto?')"><i class="fa-solid fa-trash"></i></a>
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