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
        <h1 class="text-center">Carros - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

            <?php
                if(isset($_POST['btnSubmitCarro'])){

                    $nomeCarro = $_POST['txtCarro'];
                    $intro = $_POST['txtIntro'];
                    $modelo = $_POST['selAno'];
                    $trailer = $_POST['txtTrailer'];

                    

                    $nomeimagem = array();

                    for ($i=0; $i < 3; $i++) { 
                        $nomeimagem[$i] = $_FILES['fileImagem'.$i]['name'];
                        if($nomeimagem[$i] <> "" && isset($_FILES['fileImagem'.$i]['name'])){
                            $nomeimagem[$i] = enviarImagem($_FILES['fileImagem'.$i]['name'], "carros", $_FILES['fileImagem'.$i]['tmp_name']);
                        }else{
                            $nomeimagem[$i] = "";
                        }
                    }
                    

                    /* motor */
                    $motor = $_POST['tipoMotor'];
                    $combustivel = $_POST['txtcombustivel'];
                    $cavalos = $_POST['txtcv'];
                    $velocidadeM = $_POST['txtvelocidade'];
                    $tempozero = $_POST['txtzero'];
                    $torque = $_POST['txttorque'];
                    $cambio = $_POST['txtcambio'];
                    $tracao = $_POST['txttracao'];
                    $diricao = $_POST['txtdirecao'];

                    /* dimensões */
                    $comprimento = $_POST['txtcom'];
                    $largura = $_POST['txtlargura'];
                    $altura = $_POST['txtaltura'];
                    $peso = $_POST['txtpeso'];
                    $tanque = $_POST['txttanque'];
                    $eixo = $_POST['txteixos'];
                    $malas = $_POST['txtmalas'];
                    $ocupantes = $_POST['txtocupantes'];

                    /* segurança */
                    $airbagM = $_POST['txtmotorista'];
                    $alerta = $_POST['txtalerta'];
                    $freioAbs = $_POST['txtfreio'];
                    $airbagP = $_POST['txtpassageiro'];

                    /* conforto*/
                    $ar1 = $_POST['txtar1'];
                    $travas = $_POST['txttravas'];
                    $ar2 = $_POST['txtar2'];
                    $auto = $_POST['txtauto'];

                    /*  janelas */
                    $vidros1 = $_POST['txtvidros1'];
                    $vidors2 = $_POST['txtvidros2'];
                    $teto = $_POST['txtteto'];
                    $desem = $_POST['txtdesem'];

                    /* bancos*/
                    $banco = $_POST['txtbanco'];
                    $ajuste1 = $_POST['txtajuste1'];
                    $ajuste2 = $_POST['txtajuste2'];


                    /* som */
                    $cd = $_POST['txtcd'];
                    $usb = $_POST['txtusb'];
                    $radio= $_POST['txtradio'];
                    $kit = $_POST['txtkit'];


                    /* preço*/
                    $preco = $_POST['txtpreco'];


                    $sql = "CALL sp_cadastra_carro('$nomeCarro','$intro','$modelo','$trailer','$motor','$combustivel','$cavalos','$velocidadeM','$tempozero','$torque','$cambio','$tracao','$diricao','$comprimento','$largura','$altura','$peso','$tanque','$eixo','$malas','$ocupantes','$airbagM','$alerta','$freioAbs','$airbagP','$ar1','$travas','$ar2','$auto','$vidros1','$vidors2','$teto','$desem','$banco','$ajuste1','$ajuste2','$cd','$usb','$radio','$kit','$preco','$nomeimagem[0]','$nomeimagem[1]','$nomeimagem[2]',@saida,@rotulo);";
                    if($res=mysqli_query($con,$sql)){
                        $reg=mysqli_fetch_assoc($res);
                        $saida = $reg['saida'];
                        $rotulo = $reg['rotulo'];
                        $codigoCarro = $reg['codigo_carro'];

                        switch($rotulo){
                            case 'TUDO CERTO!';
                            $alert = 'alert-success';
                             

                            /* marcas verificação */

                            $maxMarcas = $_SESSION['maxMarcas'];
                            unset($_SESSION['maxMarcas']);
                            for ($i=0; $i < $maxMarcas; $i++) { 
                                if(isset($_POST['chMarca_'.$i])){
                                    $codigoMarca = $_POST['chMarca_'.$i];
                                    $sqlSimples = "CALL sp_cadastra_carro_marca($codigoCarro,$codigoMarca,@saida);";
                                    QuerySimples($sqlSimples);
                                }
                            }
                            /* categoria verificação  */
                            $maxCategorias = $_SESSION['maxCategoria'];
                            unset($_SESSION['maxCategoria']);
                            for ($i=0; $i < $maxCategorias; $i++) { 
                                if(isset($_POST['chCategoria'.$i])){
                                    $codigoCategoria = $_POST['chCategoria'.$i];
                                    $sqlSimples = "CALL sp_cadastra_carro_categoria($codigoCarro,$codigoCategoria,@saida);";
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
                        <a href='carrosAdm.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                        <?php
                        
                        
                    }else{
                        echo "Erro";
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