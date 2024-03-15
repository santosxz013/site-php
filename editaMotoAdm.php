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
                    <div class="row">
                        <?php
                            if(isset($_GET['ExcluirMoto'])){
                                $codigoMoto = $_GET['ExcluirMoto'];

                                $sql = "CALL sp_deleta_moto($codigoMoto,@saida,@rotulo);";
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
                                    excluirTodasImagens($codigoMoto,"motos");
                                    ?>
                        
                                    <div class="alert <?php echo $alert;?>" role="alert">
                                        <h3><?php echo $rotulo; ?></h3>
                                            <?php echo $saida; ?>
                                           
                                    </div>
                                    <a href="motosCadastradas.php" class='btn btn-secondary' target='_self'>Voltar</a> 
                                    <?php
                                    
                                    
                                }else{
                                    echo "Erro";
                                }
                                excluirTodasImagens($codigoMoto,"motos");

                            }else if(isset($_GET['editaMotoAdm'])){
                                $codigoM = $_GET['editaMotoAdm'];
                                $_SESSION['codigoMoto'] = $_GET['editaMotoAdm'];
                                $sql = "SELECT * FROM imagens WHERE motos_id = $codigoM";
                                    if($res = mysqli_query($con,$sql)){
                                        $reg = mysqli_fetch_assoc($res);
                                        $imagem = $reg['caminho'];
                                    }    
                                $sql = "SELECT * FROM motos WHERE id = $codigoM";
                                if($res = mysqli_query($con,$sql)){
                                    $reg = mysqli_fetch_assoc($res);
                                    $nome = $reg['nome'];
                                    $intro = $reg['intro'];
                                    $modelo = $reg['modelo'];
                                    $trailer = $reg['trailer'];
                                    $motor = $reg['tipo_motor'];
                                    $refri = $reg['refrigeracao'];
                                    $cavalos = $reg['cavalos'];
                                    $velo = $reg['velocidade_max'];
                                    $tempo = $reg['tempo_0a100'];
                                    $torque = $reg['torque'];
                                    $admissao = $reg['adimissao'];
                                    $cubica = $reg['cubica'];
                                    $oleo = $reg['oleo'];
                                    $comprimento = $reg['comprimento'];
                                    $largura = $reg['largura'];
                                    $altura = $reg['altura'];
                                    $distan1 = $reg['distanciasolo'];
                                    $distan2 = $reg['distanciaeixo'];
                                    $caster = $reg['caster'];
                                    $trail = $reg['trail'];
                                    $esteco = $reg['esteco'];
                                    $assento = $reg['assento'];
                                    $peso = $reg['peso'];
                                    $alimentacao = $reg['alimentacao'];
                                    $diametro = $reg['diametro'];
                                    $combustivel = $reg['combustivel'];
                                    $tanque = $reg['tanque'];
                                    $ignicao = $reg['ignicao'];
                                    $partida = $reg['partida'];
                                    $bateria = $reg['bateria'];
                                    $farol = $reg['farois'];
                                    $embreagem = $reg['embreagem'];
                                    $cambio = $reg['cambio'];
                                    $reducao = $reg['reducao'];
                                    $transmissao = $reg['transmissao'];
                                    $suspensao1 = $reg['suspensaod'];
                                    $suspensao2 = $reg['suspensaot'];
                                    $roda1 = $reg['rodad'];
                                    $roda2 = $reg['rodat'];
                                    $freio1 = $reg['freiod'];
                                    $freio2 = $reg['freiot'];
                                    $preco = $reg['preco'];


                            }else{
                                echo "erro em puxar dados" . mysqli_error($con);
                            }
                            
                        ?>
                        <h2 class="text-center">Alteração de Moto</h2>
                            <form action="editaMotoAdm.php" name="fmMarcas" method="get" onsubmit="return validaCampos()">
                                <img src="img/motos/<?php echo $imagem; ?>" class="text-center test img-responsive img-thumbnail" width="40%" alt=""><br>
                                <label>Nome da Moto:</label><br>
                                <input type="text" name="txtCarro" value="<?php echo $nome; ?>" class="form-control" maxlength="50" require><br>
                                <label>Introdução da Moto:</label><br>
                                <input type="text" name="txtintro" value="<?php echo $intro; ?>" class="form-control" maxlength="79"><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Modelo do Moto:</label><br>
                                        <select name="selAno" class="form-control">
                                                <?php
                                                    $anoAtual = date('Y');
                                                    for ($i=$anoAtual; $i >= 1885; $i--) { 
                                                        ?>
                                                        <option value="<?php echo $modelo ?>"><?php echo $i ?></option>
                                                        <?php
                                                    }
                                                ?>
                                        </select><br>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Complemento da Moto:</label><br>
                                        <input type="text" name="trailer" value="<?php echo $trailer; ?>" class="form-control" maxlength="100"><br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Motor</b><br><br></label>
                                        <br>
                                    </div>
                                </div>   
                                <label>Tipo de Motor</label>
                                    <input type="text" name="tipoMotor" class="form-control" value="<?php echo $motor ?>" placeholder="exemplo: 4 tempos, 2 cilindros, em linhas, 2 vávulas por cilindro, DOHC/ SOHC, cárter seco">
                                    <br>
                                    <label>Refrigeração</label>
                                    <input type="text" name="txtrefri" class="form-control" value="<?php echo $refri ?>" placeholder="exemplo: Líquida">
                                    <br>
                                    <label>Cavalos</label>
                                    <input type="text" name="txtcv" class="form-control" value="<?php echo $cavalos ?>" placeholder="exemplo: 320cv">
                                    <br>
                                    <label>Velocidade Máxima</label>
                                    <input type="text" name="txtvelocidade" class="form-control" value="<?php echo $velo ?>" placeholder="exemplo: 220 km/h">
                                    <br>
                                    <label>Tempo de 0-100</label>
                                    <input type="text" name="txtzero" class="form-control" value="<?php echo $tempo ?>" placeholder="exemplo: 5,3 segundos">
                                    <br>
                                    <label>Torque Máximo</label>
                                    <input type="text" name="txttorque" class="form-control" value="<?php echo $torque ?>" placeholder="exemplo: 77,82 kfg.m">
                                    <br>
                                    <label>Sistema de admissão</label>
                                    <input type="text" name="txtadmissao" class="form-control" value="<?php echo $admissao ?>" placeholder="exemplo: Aspiração natural a ar">
                                    <br>
                                    <label>Capacidade cúbica</label>
                                    <input type="text" name="txtcubico" class="form-control" value="<?php echo $cubica ?>" placeholder="exemplo: 600 cm³">
                                    <br>
                                    <label>Capacidade de óleo (total)</label>
                                    <input type="text" name="txtoleo" class="form-control" value="<?php echo $oleo ?>" placeholder="exemplo: 3,5 litros">
                                <br> 
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Dimensões</b><br><br></label>
                                        <br>
                                    </div>
                                </div>
                                <label>Comprimento</label>
                                    <input type="text" name="txtcom" class="form-control" value="<?php echo $comprimento ?>" placeholder="exemplo: 2.090 mm">
                                    <br>
                                    <label>Largura</label>
                                    <input type="text" name="txtlargura" class="form-control" value="<?php echo $largura ?>" placeholder="exemplo: 740 mm">
                                    <br>
                                    <label>Altura</label>
                                    <input type="text" name="txtaltura" class="form-control" value="<?php echo $altura ?>" placeholder="exemplo: 1.095 mm">
                                    <br>
                                    <label>Distância mínima do solo	</label>
                                    <input type="text" name="txtpeso" class="form-control" value="<?php echo $distan1 ?>" placeholder="exemplo: 135 mm">
                                    <br>
                                    <label>Distância entre eixos</label>
                                    <input type="text" name="txttanque" class="form-control" value="<?php echo $distan2 ?>" placeholder="exemplo: 1.435 mm">
                                    <br>
                                    <label>Caster</label>
                                    <input type="text" name="txtcaster" class="form-control" value="<?php echo $caster ?>" placeholder="exemplo: 25°">
                                    <br>
                                    <label>Trail</label>
                                    <input type="text" name="txttrail" class="form-control" value="<?php echo $trail ?>" placeholder="exemplo: 99 mm">
                                    <br>
                                    <label>Ângulo de esterço</label>
                                    <input type="text" name="txtangulo" class="form-control" value="<?php echo $esteco ?>" placeholder="exemplo: 27°">
                                    <br>
                                    <label>Altura do assento</label>
                                    <input type="text" name="txtassento" class="form-control" value="<?php echo $assento ?>" placeholder="exemplo: 800 mm">
                                    <br>
                                    <label>Peso em ordem de marcha</label>
                                    <input type="text" name="txtpesomarcha" class="form-control" value="<?php echo $peso ?>" placeholder="exemplo: 198 kg">
                                <br> 
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Combustível</b><br><br></label>
                                        <br>
                                    </div>
                                </div> 
                                <label>Alimentação</label>
                                    <input type="text" name="txtalimentacao" class="form-control" value="<?php echo $alimentacao ?>" placeholder="exemplo: Injeção Eletrônica">
                                    <br>
                                    <label>Diâmetro da injeção eletrônica</label>
                                    <input type="text" name="txtinjecao" class="form-control" value="<?php echo $diametro ?>" placeholder="exemplo: 36 mm">
                                    <br>
                                    <label>Combustível</label>
                                    <input type="text" name="txtcombustivel" class="form-control" value="<?php echo $combustivel ?>" placeholder="exemplo: Gasolina">
                                    <br>
                                    <label>Tanque de combustível</label>
                                    <input type="text" name="txttanquecombus" class="form-control" value="<?php echo $tanque ?>" placeholder="exemplo: 19 litros">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Eletrônica</b><br><br></label>
                                        <br>
                                    </div>
                                </div> 
                                <label>Ignição</label>
                                    <input type="text" name="txtignicao" class="form-control" value="<?php echo $ignicao ?>" placeholder="exemplo: CDI/ECU">
                                    <br>
                                    <label>Partida</label>
                                    <input type="text" name="txtpartida" class="form-control" value="<?php echo $partida ?>" placeholder="exemplo: Elétrica">
                                    <br>
                                    <label>Bateria</label>
                                    <input type="text" name="txtbateria" class="form-control" value="<?php echo $bateria ?>" placeholder="exemplo: 12V 10Ah selada">
                                    <br>
                                    <label>Farois</label>
                                    <input type="text" name="txtfarol" class="form-control" value="<?php echo $farol ?>" placeholder="exemplo: 55w H7+ 60w h9">
                                <br> 
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Transmissão</b><br><br></label>
                                        <br>
                                    </div>
                                </div> 
                                <label>Embreagem</label>
                                    <input type="text" name="txtembreagem" class="form-control"value="<?php echo $embreagem ?>" placeholder="exemplo: Multidisco deslizante banhada a óleo">
                                    <br>
                                    <label>Câmbio</label>
                                    <input type="text" name="txtcambio" class="form-control" value="<?php echo $cambio ?>" placeholder="exemplo: Manual sequencial de 6 velocidade">
                                    <br>
                                    <label>Redução final</label>
                                    <input type="text" name="txtreducao" class="form-control" value="<?php echo $reducao ?>" placeholder="exemplo: 45/16">
                                    <br>
                                    <label>Transmissão final</label>
                                    <input type="text" name="txttramissao" class="form-control" value="<?php echo $transmissao ?>" placeholder="exemplo: Por corrente">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Suspensão</b><br><br></label>
                                        <br>
                                    </div>
                                </div>
                                <label>Suspensão dianteira</label>
                                    <input type="text" name="txtsuspensao1" class="form-control" value="<?php echo $suspensao1 ?>" placeholder="exemplo: Garfo telescópio invertido (up-side-down), 43 mm diâmetro, curso de 120 mm">
                                    <br>
                                    <label>Suspensão traseira</label>
                                    <input type="text" name="txtsuspensao2" class="form-control" value="<?php echo $suspensao2 ?>" placeholder="exemplo: Monochoque com link, curso de 128 mm, ajuste de pré-carga da mola">
                                    <br>
                                    <label>Roda dianteira</label>
                                    <input type="text" name="txtroda1" class="form-control" value="<?php echo $roda1 ?>" placeholder="exemplo: De liga leve, 17 polegadas">
                                    <br>
                                    <label>Roda traseira</label>
                                    <input type="text" name="txtroda2" class="form-control" value="<?php echo $roda2 ?>" placeholder="exemplo: De liga leve, 17 polegadas">
                                <br> 
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Freios</b><br><br></label>
                                        <br>
                                    </div>
                                </div>
                                <label>Freio dianteiro	</label>
                                    <input type="text" name="txtmalas" class="form-control" value="<?php echo $freio1 ?>"  placeholder="exemplo: Duplo disco flutuante e ventilado, de 296 mm, pinças, de 2 pistões, sem ABS">
                                    <br>
                                    <label>Freio traseiro	</label>
                                    <input type="text" name="txtocupantes" class="form-control" value="<?php echo $freio2 ?>" placeholder="exemplo: Disco ventilado, de 240 mm,pinça, de 1 pistão, sem ABS">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Preço medio do mercado</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                    <label>Preço</label>
                                    <input type="text" name="txtpreco" class="form-control" value="R$ <?php echo $preco ?>" placeholder="exemplo: R$ 33.739,03">
                                    <br><br>


                                <button type="submit" name="bntAtualizaMoto" class="btn btn-primary w-100">Alterar</button>
                            </form>
                        <?php
                        }else if(isset($_GET['bntAtualizaMoto'])){
                            $codigoMo = $_SESSION['codigoMoto'];
                            $nomeMoto = $_GET['txtCarro'];
                            $nomeintro = $_GET['txtintro'];
                            $nomeModelo = $_GET['selAno'];
                            $nomeComplemento = $_GET['trailer'];

                            /* motor */

                            $nomeMotor = $_GET['tipoMotor'];
                            $nomeRefri = $_GET['txtrefri'];
                            $nomeCavalos = $_GET['txtcv'];
                            $nomeVelo = $_GET['txtvelocidade'];
                            $nomeTempo = $_GET['txtzero'];
                            $nomeTorque = $_GET['txttorque'];
                            $nomeSistema = $_GET['txtadmissao'];
                            $nomeCubico = $_GET['txtcubico'];
                            $nomeOleo = $_GET['txtoleo'];

                            /* dimensoes */

                            $nomeComprimento = $_GET['txtcom'];
                            $nomeLargura = $_GET['txtlargura'];
                            $nomeAltura = $_GET['txtaltura'];
                            $nomeDis1 = $_GET['txtpeso'];
                            $nomeDis2 = $_GET['txttanque'];
                            $nomeCaster = $_GET['txtcaster'];
                            $nomeTrail = $_GET['txttrail'];
                            $nomeEsteco = $_GET['txtangulo'];
                            $nomeAssento = $_GET['txtassento'];
                            $nomePeso = $_GET['txtpesomarcha'];

                            /* Combustivel */

                            $nomeAli = $_GET['txtalimentacao'];
                            $nomeInjecao = $_GET['txtinjecao'];
                            $nomeCombustivel = $_GET['txtcombustivel'];
                            $nomeTanque = $_GET['txttanquecombus'];

                            /* eletronica */

                            $nomeIgnicao = $_GET['txtignicao'];
                            $nomePartida = $_GET['txtpartida'];
                            $nomeBateria = $_GET['txtbateria'];
                            $nomeFarol = $_GET['txtfarol'];

                            /* transmissao */

                            $nomeEmbreagem = $_GET['txtembreagem'];
                            $nomeCambio = $_GET['txtcambio'];
                            $nomeReducao = $_GET['txtreducao'];
                            $nomeFinal = $_GET['txttramissao'];

                            /* suspensao */

                            $nomeSus1 = $_GET['txtsuspensao1'];
                            $nomeSus2 = $_GET['txtsuspensao2'];
                            $nomeRoda1 = $_GET['txtroda1'];
                            $nomeRoda2 = $_GET['txtroda2'];

                            /* freios */

                            $nomeFreio1 = $_GET['txtmalas'];
                            $nomeFreio2 = $_GET['txtocupantes'];

                            /* preço*/

                            $nomePreco = $_GET['txtpreco'];

                            $sql = "CALL sp_edita_moto('$codigoMo','$nomeMoto','$nomeintro','$nomeModelo','$nomeComplemento','$nomeMotor','$nomeRefri','$nomeCavalos','$nomeVelo','$nomeTempo','$nomeTorque','$nomeSistema','$nomeCubico','$nomeOleo','$nomeComprimento','$nomeLargura','$nomeAltura','$nomeDis1','$nomeDis2','$nomeCaster','$nomeTrail','$nomeEsteco','$nomeAssento','$nomePeso','$nomeAli','$nomeInjecao','$nomeCombustivel','$nomeTanque','$nomeIgnicao','$nomePartida','$nomeBateria','$nomeFarol','$nomeEmbreagem','$nomeCambio','$nomeReducao','$nomeFinal','$nomeSus1','$nomeSus2','$nomeRoda1','$nomeRoda2','$nomeFreio1','$nomeFreio2','$nomePreco',@saida,@rotulo);";
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
                                <a href='motosCadastradas.php' class='btn btn-secondary' target='_self'>Voltar</a> 
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