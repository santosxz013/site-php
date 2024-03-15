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

    <title>Car center</title>
    
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

            <?php
                if(isset($_POST['btnSubmitMotos'])){

                    $nomeCarro = $_POST['txtCarro'];
                    $intro = $_POST['txtIntro'];
                    $modelo = $_POST['selAno'];
                    $trailer = $_POST['txtTrailer'];

                    

                    $nomeimagem = array();

                    for ($i=0; $i < 3; $i++) { 
                        $nomeimagem[$i] = $_FILES['fileImagem'.$i]['name'];
                        if($nomeimagem[$i] <> "" && isset($_FILES['fileImagem'.$i]['name'])){
                            $nomeimagem[$i] = enviarImagem($_FILES['fileImagem'.$i]['name'], "motos", $_FILES['fileImagem'.$i]['tmp_name']);
                        }else{
                            $nomeimagem[$i] = "";
                        }
                    }
                    

                    /* motor */
                    $motor = $_POST['tipoMotor'];
                    $refrigeracao = $_POST['txtrefri'];
                    $cilindrada = $_POST['txtcilin'];
                    $cavalos = $_POST['txtcv'];
                    $velocidadeM = $_POST['txtvelocidade'];
                    $tempozero = $_POST['txtzero'];
                    $torque = $_POST['txttorque'];
                    $adimissao = $_POST['txtadmissao'];
                    $cubica = $_POST['txtcubico'];
                    $oleo = $_POST['txtoleo'];

                    /* dimensões */
                    $comprimento = $_POST['txtcom'];
                    $largura = $_POST['txtlargura'];
                    $altura = $_POST['txtaltura'];
                    $distancia1 = $_POST['txtpeso'];
                    $distancia2 = $_POST['txttanque'];
                    $caster = $_POST['txtcaster'];
                    $trail = $_POST['txttrail'];
                    $angulo = $_POST['txtangulo'];
                    $assento = $_POST['txtassento'];
                    $marcha = $_POST['txtpesomarcha'];


                    /* combustivel*/
                    $alimentacao = $_POST['txtalimentacao'];
                    $injecao = $_POST['txtinjecao'];
                    $combustivel = $_POST['txtcombustivel'];
                    $tanque = $_POST['txttanquecombus'];

                    /*  eletronica */
                    $ignicao = $_POST['txtignicao'];
                    $partida = $_POST['txtpartida'];
                    $bateria = $_POST['txtbateria'];
                    $farol = $_POST['txtfarol'];

                    /* transmissao*/
                    $embreagem = $_POST['txtembreagem'];
                    $cambio = $_POST['txtcambio'];
                    $reducao = $_POST['txtreducao'];
                    $transmissao = $_POST['txttramissao'];


                    /* suspensao */
                    $suspensao1 = $_POST['txtsuspensao1'];
                    $suspensao2 = $_POST['txtsuspensao2'];
                    $roda1 = $_POST['txtroda1'];
                    $roda2 = $_POST['txtroda2'];

                    /* FREIO */

                    $freio1 = $_POST['txtmalas'];
                    $freio2 = $_POST['txtocupantes'];



                    /* preço*/
                    $preco = $_POST['txtpreco'];


                    $sql = "CALL sp_cadastra_moto('$nomeCarro','$intro','$modelo','$trailer','$motor','$refrigeracao','$cilindrada','$cavalos','$velocidadeM','$tempozero','$torque','$adimissao','$cubica','$oleo','$comprimento','$largura','$altura','$distancia1','$distancia2','$caster','$trail','$angulo','$assento','$marcha','$alimentacao','$injecao','$combustivel','$tanque','$ignicao','$partida','$bateria','$farol','$embreagem','$cambio','$reducao','$transmissao','$suspensao1','$suspensao2','$roda1','$roda2','$freio1','$freio2','$preco','$nomeimagem[0]','$nomeimagem[1]','$nomeimagem[2]',@saida,@rotulo);";
                    if($res=mysqli_query($con,$sql)){
                        $reg=mysqli_fetch_assoc($res);
                        $saida = $reg['saida'];
                        $rotulo = $reg['rotulo'];
                        $codigoMoto = $reg['codigo_moto'];

                        switch($rotulo){
                            case 'TUDO CERTO!';
                            $alert = 'alert-success';
                             

                            /* marcas verificação */

                            $maxMarcas = $_SESSION['maxMarcas'];
                            unset($_SESSION['maxMarcas']);
                            for ($i=0; $i < $maxMarcas; $i++) { 
                                if(isset($_POST['chMarcam_'.$i])){
                                    $codigoMarca = $_POST['chMarcam_'.$i];
                                    $sqlSimples = "CALL sp_cadastra_moto_marca($codigoMoto,$codigoMarca,@saida);";
                                    QuerySimples($sqlSimples);
                                }
                            }
                            /* categoria verificação  */
                            $maxCategorias = $_SESSION['maxCategoria'];
                            unset($_SESSION['maxCategoria']);
                            for ($i=0; $i < $maxCategorias; $i++) { 
                                if(isset($_POST['chCategoriam'.$i])){
                                    $codigoCategoria = $_POST['chCategoriam'.$i];
                                    $sqlSimples = "CALL sp_cadastra_moto_categoria($codigoMoto,$codigoCategoria,@saida);";
                                    QuerySimples($sqlSimples);
                                }
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
                        <a href='motosAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                        <?php
                        
                        
                    }else{
                        echo "Erro no banco de dados: " . mysqli_error($con);
                    }

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