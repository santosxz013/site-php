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
                    <div class="row">
                        <?php
                        
                            if(isset($_GET['excluirCarro'])){
                                $codigoCarro = $_GET['excluirCarro'];

                                $sql = "CALL sp_deleta_carro($codigoCarro, @saida, @rotulo);";
                                if($res=mysqli_query($con,$sql)){
                                    $reg = mysqli_fetch_assoc($res);
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
                                    excluirTodasImagens($codigoCarro,"carros");
                                    ?>
                        
                                    <div class="alert <?php echo $alert;?>" role="alert">
                                        <h3><?php echo $rotulo; ?></h3>
                                            <?php echo $saida; ?>
                                           
                                    </div>
                                    <a href="carrosCadastrados.php" class='btn btn-secondary' target='_self'>Voltar</a> 
                                    <?php
                                    
                                    
                                }else{
                                    echo "Erro";
                                }
                                
                            }else if(isset($_GET['editaCarroAdm'])){
                                $codigoC = $_GET['editaCarroAdm'];
                                $_SESSION['codigoCarro'] = $_GET['editaCarroAdm'];
                                $sql = "SELECT * FROM imagens WHERE carros_id = $codigoC";
                                    if($res = mysqli_query($con,$sql)){
                                        $reg = mysqli_fetch_assoc($res);
                                        $imagem = $reg['caminho'];
                                    }    
                                $sql = "SELECT * FROM carros WHERE id = $codigoC";
                                if($res = mysqli_query($con,$sql)){
                                    $reg = mysqli_fetch_assoc($res);
                                    $nome = $reg['nome'];
                                    $intro = $reg['intro'];
                                    $modelo = $reg['modelo'];
                                    $trailer = $reg['trailer'];
                                    $motor = $reg['tipo_motor'];
                                    $combustivel = $reg['combustivel'];
                                    $cavalos = $reg['cavalos'];
                                    $velocidade = $reg['velocidade_max'];
                                    $tempo = $reg['tempo_0a100'];
                                    $torque = $reg['torque'];
                                    $cambio = $reg['cambio'];
                                    $tracao = $reg['tracao'];
                                    $direcao = $reg['direcao'];
                                    $comprimento = $reg['comprimento'];
                                    $largura = $reg['largura'];
                                    $altura = $reg['altura'];
                                    $peso = $reg['peso'];
                                    $tanque = $reg['tanque'];
                                    $eixo = $reg['eixos'];
                                    $malas = $reg['pmalas'];
                                    $ocupantes = $reg['ocupantes'];
                                    $airbag = $reg['airbagm'];
                                    $alerta = $reg['alerta'];
                                    $freio = $reg['freio'];
                                    $airbag1 = $reg['airbagp'];
                                    $ar1 = $reg['arcondicionado'];
                                    $travas = $reg['travas'];
                                    $ar2 = $reg['arquente'];
                                    $piloto = $reg['pilotoauto'];
                                    $vidro1 = $reg['vidrosd'];
                                    $vidro2 = $reg['vidrost'];
                                    $teto = $reg['tetosolar'];
                                    $desem = $reg['desemt'];
                                    $banco = $reg['bancoc'];
                                    $ajuste1 = $reg['ajustea'];
                                    $ajuste2 = $reg['ajusteeletrico'];
                                    $cd = $reg['cd'];
                                    $usb = $reg['usb'];
                                    $radio = $reg['radiofm'];
                                    $kit = $reg['kit'];
                                    $preco = $reg['preco'];


                                    /* puxar do banco de dados*/
                                }else{
                                    echo "erro 2";
                                }
                                ?>
                                <h2 class="text-center">Alteração de Carro</h2>
                                <form action="editaCarroAdm.php" name="fmMarcas" method="get" onsubmit="return validaCampos()">
                                    <img src="img/carros/<?php echo $imagem; ?>" class="text-center test img-responsive img-thumbnail" width="40%" alt=""><br>
                                    <label>Nome do Carro:</label><br>
                                    <input type="text" name="txtCarro" value="<?php echo $nome; ?>" class="form-control" maxlength="50" require><br>
                                    <label>Introdução do Carro:</label><br>
                                    <input type="text" name="txtintro" value="<?php echo $intro; ?>" class="form-control" maxlength="100"><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Modelo do Carro:</label><br>
                                            <select name="selAno" class="form-control">
                                                    <?php
                                                        $anoAtual = date('Y');
                                                        for ($i=$anoAtual; $i >= 1886; $i--) { 
                                                            ?>
                                                            <option value="<?php echo $modelo ?>"><?php echo $i ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                            </select><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Complemento do Carro:</label><br>
                                            <input type="text" name="trailer" value="<?php echo $trailer; ?>" class="form-control" maxlength="100"><br>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 text-center">
                                        <label><b>Motor</b><br></label>
                                    </div>
                                    <label>Motor do Carro:</label><br>
                                    <input type="text" name="txtmotor" value="<?php echo $motor; ?>" class="form-control" maxlength="100"><br>
                                    <label>Compustivel do Carro:</label><br>
                                    <input type="text" name="txtcombustivel" value="<?php echo $combustivel; ?>" class="form-control" maxlength="50"><br>
                                    <label>Cavalos do Carro:</label><br>
                                    <input type="text" name="txtCavalos" value="<?php echo $cavalos; ?>" class="form-control" maxlength="50"><br>
                                    <label>Velocidade Máxima do Carro:</label><br>
                                    <input type="text" name="txtVelocidade" value="<?php echo $velocidade; ?>" class="form-control" maxlength="50"><br>
                                    <label>Tempo de 0-100 do Carro:</label><br>
                                    <input type="text" name="txttempo" value="<?php echo $tempo; ?>" class="form-control" maxlength="50"><br>
                                    <label>Torque do Carro:</label><br>
                                    <input type="text" name="txtTorque" value="<?php echo $torque; ?>" class="form-control" maxlength="50"><br>
                                    <label>Cambio do Carro:</label><br>
                                    <input type="text" name="txtcambio" value="<?php echo $cambio; ?>" class="form-control" maxlength="50"><br>
                                    <label>Tração do Carro:</label><br>
                                    <input type="text" name="txttracao" value="<?php echo $tracao; ?>" class="form-control" maxlength="50"><br>
                                    <label>Direção do Carro:</label><br>
                                    <input type="text" name="txtdirecao" value="<?php echo $direcao; ?>" class="form-control" maxlength="50"><br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Dimensões</b><br></label>
                                    </div>

                                    <label>Comprimento do Carro:</label><br>
                                    <input type="text" name="txtcomprimento" value="<?php echo $comprimento; ?>" class="form-control" maxlength="50"><br>
                                    <label>Largura do Carro:</label><br>
                                    <input type="text" name="txtlargra" value="<?php echo $largura; ?>" class="form-control" maxlength="50"><br>
                                    <label>Altura do Carro:</label><br>
                                    <input type="text" name="txtaltura" value="<?php echo $altura; ?>" class="form-control" maxlength="50"><br>
                                    <label>Peso do Carro:</label><br>
                                    <input type="text" name="txtpeso" value="<?php echo $peso; ?>" class="form-control" maxlength="50"><br>
                                    <label>Tanque do Carro:</label><br>
                                    <input type="text" name="txttanque" value="<?php echo $tanque; ?>" class="form-control" maxlength="50"><br>
                                    <label>Distancia entre eixos do Carro:</label><br>
                                    <input type="text" name="txteixo" value="<?php echo $eixo; ?>" class="form-control" maxlength="50"><br>
                                    <label>Porta-Malas do Carro:</label><br>
                                    <input type="text" name="txtmala" value="<?php echo $malas; ?>" class="form-control" maxlength="50"><br>
                                    <label>Ocupantes do Carro:</label><br>
                                    <input type="text" name="txtocupantes" value="<?php echo $ocupantes; ?>" class="form-control" maxlength="50"><br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Segurança</b><br></label>
                                    </div>

                                    <label>Airbag Motorista</label>
                                    <select name="txtmotorista" class="form-control">
                                        <option value="<?php echo $airbag ?>"><?php echo $airbag ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Alerta</label>
                                    <select name="txtalerta" class="form-control">
                                        <option value="<?php echo $alerta ?>"><?php echo $alerta ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Freio ABs</label>
                                    <select name="txtfreio" class="form-control">
                                        <option value="<?php echo $freio ?>"><?php echo $freio ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Airbag Passageiro</label>
                                    <select name="txtpassageiro" class="form-control">
                                        <option value="<?php echo $airbag1 ?>"><?php echo $airbag1 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Conforto</b><br></label>
                                    </div>

                                    <label>Ar-Condicionado</label>
                                    <select name="txtar1" class="form-control">
                                        <option value="<?php echo $ar1 ?>"><?php echo $ar1 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Travas Eletricas</label>
                                    <select name="txttravas" class="form-control">
                                        <option value="<?php echo $travas ?>"><?php echo $travas ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ar-Quente</label>
                                    <select name="txtar2" class="form-control">
                                        <option value="<?php echo $ar2 ?>"><?php echo $ar2 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Piloto Automatico</label>
                                    <select name="txtpiloto" class="form-control">
                                        <option value="<?php echo $piloto ?>"><?php echo $piloto ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Janelas</b><br></label>
                                    </div>

                                    <label>Vidros Elétricos Dianteiros</label>
                                    <select name="txtvidros1" class="form-control">
                                        <option value="<?php echo $vidro1 ?>"><?php echo $vidro1 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Vidros Elétricos Traseiros</label>
                                    <select name="txtvidros2" class="form-control">
                                        <option value="<?php echo $vidro2 ?>"><?php echo $vidro2 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Teto Solar</label>
                                    <select name="txtteo" class="form-control">
                                        <option value="<?php echo $teto ?>"><?php echo $teto ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Desembaçador Traseiro</label>
                                    <select name="textdesem" class="form-control">
                                        <option value="<?php echo $desem ?>"><?php echo $desem ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Bancos</b><br></label>
                                    </div>

                                    <label>Bancos de Couro</label>
                                    <select name="txtbanco" class="form-control">
                                        <option value="<?php echo $banco ?>"><?php echo $banco ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ajuste de Altura</label>
                                    <select name="txtajuste1" class="form-control">
                                        <option value="<?php echo $ajuste1 ?>"><?php echo $ajuste1 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ajuste Eletrico</label>
                                    <select name="txtajuste2" class="form-control">
                                        <option value="<?php echo $ajuste2 ?>"><?php echo $ajuste2 ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>

                                    <div class="col-md-12 text-center">
                                        <label><b>Som</b><br></label>
                                    </div>

                                    <label>CD Player</label>
                                    <select name="txtcd" class="form-control">
                                        <option value="<?php echo $cd ?>"><?php echo $cd ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Entrada USB</label>
                                    <select name="txtusb" class="form-control">
                                        <option value="<?php echo $usb ?>"><?php echo $usb ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Radio FM/AM</label>
                                    <select name="txtradio" class="form-control">
                                        <option value="<?php echo $radio ?>"><?php echo $radio ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Kit Multimidia</label>
                                    <select name="txtkit" class="form-control">
                                        <option value="<?php echo $kit ?>"><?php echo $kit ?></option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    
                                    <div class="col-md-12 text-center">
                                        <label><b>Preço Medio do Mercado</b></label>
                                    </div>

                                    <label>Preço</label>
                                    <input type="text" name="txtpreco" value=" <?php echo $preco; ?>" class="form-control" maxlength="50"><br>




                                    <button type="submit" name="bntAtualizaCarro" class="btn btn-primary w-100">Alterar</button>
                                </form>
                                <?php
                            }else if(isset($_GET['bntAtualizaCarro'])){
                                $codigoCarro = $_SESSION['codigoCarro'];
                                $nomeCarro = $_GET['txtCarro'];
                                $nomeIntro = $_GET['txtintro'];
                                $nomeModelo = $_GET['selAno'];
                                $complemento = $_GET['trailer'];

                                /*motor */
                                $nomeMotor = $_GET['txtmotor'];
                                $nomeCombustivel = $_GET['txtcombustivel'];
                                $nomeCavalos = $_GET['txtCavalos'];
                                $nomeVelo = $_GET['txtVelocidade'];
                                $nomeTempo = $_GET['txttempo'];
                                $nomeTorque = $_GET['txtTorque'];
                                $nomeCambio = $_GET['txtcambio'];
                                $nomeTracao = $_GET['txttracao'];
                                $nomeDirecao = $_GET['txtdirecao'];

                                /* dimensoes*/

                                $nomeComprimento = $_GET['txtcomprimento'];
                                $nomeLargura = $_GET['txtlargra'];
                                $nomeAltura = $_GET['txtaltura'];
                                $nomePeso = $_GET['txtpeso'];
                                $nomeTanque = $_GET['txttanque'];
                                $nomeeixo = $_GET['txteixo'];
                                $nomeMalas = $_GET['txtmala'];
                                $nomeOcupantes = $_GET['txtocupantes'];

                                /* SEgurança */

                                $nomeAirbag1 = $_GET['txtmotorista'];
                                $nomeAlerta = $_GET['txtalerta'];
                                $nomeFreio = $_GET['txtfreio'];
                                $nomeAirbag2 = $_GET['txtpassageiro'];

                                /* conforto */

                                $ar1 = $_GET['txtar1'];
                                $travas = $_GET['txttravas'];
                                $ar2 = $_GET['txtar2'];
                                $auto = $_GET['txtpiloto'];



                                /* janelas*/

                                $nomeVidros1 = $_GET['txtvidros1'];
                                $nomeVidros2 = $_GET['txtvidros2'];
                                $nomeTeto = $_GET['txtteo'];
                                $nomeDesem = $_GET['textdesem'];
                                
                                /* bancos*/

                                $nomeBanco = $_GET['txtbanco'];
                                $nomeAjuste1 = $_GET['txtajuste1'];
                                $nomeAjuste2 = $_GET['txtajuste2'];
                                
                                /* som */

                                $nomeCd = $_GET['txtcd'];
                                $nomeUsb = $_GET['txtusb'];
                                $nomeRadio = $_GET['txtradio'];
                                $nomeKit = $_GET['txtkit'];

                                $nomePreco = $_GET['txtpreco'];


                                $sql = "CALL sp_edita_carros('$codigoCarro','$nomeCarro','$nomeIntro','$nomeModelo','$complemento','$nomeMotor','$nomeCombustivel','$nomeCavalos','$nomeVelo','$nomeTempo','$nomeTorque','$nomeCambio','$nomeTracao','$nomeDirecao','$nomeComprimento','$nomeLargura','$nomeAltura','$nomePeso','$nomeTanque','$nomeeixo','$nomeMalas','$nomeOcupantes','$nomeAirbag1','$nomeAlerta','$nomeFreio','$nomeAirbag2','$ar1','$travas','$ar2','$auto','$nomeVidros1','$nomeVidros2','$nomeTeto','$nomeDesem','$nomeBanco','$nomeAjuste1','$nomeAjuste2','$nomeCd','$nomeUsb','$nomeRadio','$nomeKit','$nomePreco',@saida,@rotulo);";
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
                                    <a href='carrosCadastrados.php' class='btn btn-secondary' target='_self'>Voltar</a> 
                                    <?php
                                    
                                    
                                }else{
                                    echo "Erro no banco de dados: " . mysqli_error($con);
                                }
                            }else{
                        
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