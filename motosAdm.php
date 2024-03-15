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
            /* motor */
            if(document.fmCarros.txtCarro.value == ""){
                alert("Por favor, preencha o nome da moto.");
                document.fmCarros.txtCarro.focus();
                return false;
            }
            
            if(document.fmCarros.selAno.value == ""){
                alert("Por favor, escolha o modelo da moto.");
                document.fmCarros.selAno.focus();
                return false;
            }
            if(document.fmCarros.tipoMotor.value == ""){
                alert("Por favor, preencha o tipo de motor.");
                document.fmCarros.tipoMotor.focus();
                return false;
            }
            if(document.fmCarros.txtrefri.value == ""){
                alert("Por favor, preencha o tipo de refrigeração.");
                document.fmCarros.txtrefri.focus();
                return false;
            }
            if(document.fmCarros.txtcv.value == ""){
                alert("Por favor, preencha a quantidades de cavalos.");
                document.fmCarros.txtcv.focus();
                return false;
            }
            if(document.fmCarros.txtvelocidade.value == ""){
                alert("Por favor, preencha a velociade maxima.");
                document.fmCarros.txtvelocidade.focus();
                return false;
            }
            if(document.fmCarros.txtzero.value == ""){
                alert("Por favor, preencha a velociade de 0 a 100.");
                document.fmCarros.txtzero.focus();
                return false;
            }
            if(document.fmCarros.txttorque.value == ""){
                alert("Por favor, preencha o torque maximo.");
                document.fmCarros.txttorque.focus();
                return false;
            }
            if(document.fmCarros.txtadmissao.value == ""){
                alert("Por favor, preencha o sistema de admissão.");
                document.fmCarros.txtadmissao.focus();
                return false;
            }
            if(document.fmCarros.txtcubico.value == ""){
                alert("Por favor, preencha a Capacidade cúbica.");
                document.fmCarros.txtcubico.focus();
                return false;
            }
            if(document.fmCarros.txtoleo.value == ""){
                alert("Por favor, preencha a Capcidade de Óleo.");
                document.fmCarros.txtoleo.focus();
                return false;
            }


            /* dimensões */
            if(document.fmCarros.txtcom.value == ""){
                alert("Por favor, preencha o comprimento.");
                document.fmCarros.txtcom.focus();
                return false;
            }
            if(document.fmCarros.txtlargura.value == ""){
                alert("Por favor, preencha a largura.");
                document.fmCarros.txtlargura.focus();
                return false;
            }
            if(document.fmCarros.txtaltura.value == ""){
                alert("Por favor, preencha a Altura.");
                document.fmCarros.txtaltura.focus();
                return false;
            }
            if(document.fmCarros.txtpeso.value == ""){
                alert("Por favor, preencha a Distância mínima do solo.");
                document.fmCarros.txtpeso.focus();
                return false;
            }
            if(document.fmCarros.txttanque.value == ""){
                alert("Por favor, preencha a Distância entre eixos.");
                document.fmCarros.txttanque.focus();
                return false;
            }
            if(document.fmCarros.txteixos.value == ""){
                alert("Por favor, preencha a distancia entre eixos.");
                document.fmCarros.txteixos.focus();
                return false;
            }
            if(document.fmCarros.txtcaster.value == ""){
                alert("Por favor, preencha o Caster.");
                document.fmCarros.txtcaster.focus();
                return false;
            }
            if(document.fmCarros.txttrail.value == ""){
                alert("Por favor, preencha o Trail.");
                document.fmCarros.txttrail.focus();
                return false;
            }

            if(document.fmCarros.txtangulo.value == ""){
                alert("Por favor, preencha o Angulo do Esterço.");
                document.fmCarros.txtangulo.focus();
                return false;
            }
            if(document.fmCarros.txtassento.value == ""){
                alert("Por favor, preencha a altura do assento.");
                document.fmCarros.txtassento.focus();
                return false;
            }
            if(document.fmCarros.txtpesomarcha.value == ""){
                alert("Por favor, preencha o peso em ordem de marcha.");
                document.fmCarros.txtpesomarcha.focus();
                return false;
            }


            /* Combustivel */

            if(document.fmCarros.txtalimentacao.value == ""){
                alert("Por favor, preencha a alimentação.");
                document.fmCarros.txtalimentacao.focus();
                return false;
            }
            if(document.fmCarros.txtinjecao.value == ""){
                alert("Por favor, preencha o diametro da injeção.");
                document.fmCarros.txtinjecao.focus();
                return false;
            }
            if(document.fmCarros.txtcombustivel.value == ""){
                alert("Por favor, preencha o combustível.");
                document.fmCarros.txtcombustivel.focus();
                return false;
            }
            if(document.fmCarros.txttanquecombus.value == ""){
                alert("Por favor, preencha o tanque de combustível.");
                document.fmCarros.txttanquecombus.focus();
                return false;
            }


            /* eletronica */

            if(document.fmCarros.txtignicao.value == ""){
                alert("Por favor, preencha a Ignição.");
                document.fmCarros.txtignicao.focus();
                return false;
            }
            if(document.fmCarros.txtpartida.value == ""){
                alert("Por favor, preencha a Partida.");
                document.fmCarros.txtpartida.focus();
                return false;
            }
            if(document.fmCarros.txtbateria.value == ""){
                alert("Por favor, preencha A Bateria.");
                document.fmCarros.txtbateria.focus();
                return false;
            }
            if(document.fmCarros.txtfarol.value == ""){
                alert("Por favor, preencha o farol.");
                document.fmCarros.txtfarol.focus();
                return false;
            }


            /* Transmissão  */

            if(document.fmCarros.txtembreagem.value == ""){
                alert("Por favor, preencha a Embreagem.");
                document.fmCarros.txtembreagem.focus();
                return false;
            }
            if(document.fmCarros.txtcambio.value == ""){
                alert("Por favor, preencha o Câmbio.");
                document.fmCarros.txtcambio.focus();
                return false;
            }
            if(document.fmCarros.txtreducao.value == ""){
                alert("Por favor, preencha a Redução final.");
                document.fmCarros.txtreducao.focus();
                return false;
            }
            if(document.fmCarros.txttramissao.value == ""){
                alert("Por favor, preencha a Transmissão final.");
                document.fmCarros.txttramissao.focus();
                return false;
            }


            /* Suspensão */

            if(document.fmCarros.txtsuspensao1.value == ""){
                alert("Por favor, preencha a Suspensão dianteira.");
                document.fmCarros.txtsuspensao1.focus();
                return false;
            }
            if(document.fmCarros.txtsuspensao2.value == ""){
                alert("Por favor, preencha a Suspensão traseira.");
                document.fmCarros.txtsuspensao2.focus();
                return false;
            }
            if(document.fmCarros.txtroda1.value == ""){
                alert("Por favor, preencha a Roda dianteira.");
                document.fmCarros.txtroda1.focus();
                return false;
            }
            if(document.fmCarros.txtroda2.value == ""){
                alert("Por favor, preencha a Roda traseira.");
                document.fmCarros.txtroda2.focus();
                return false;
            }

      
            /* preco */

            if(document.fmCarros.txtpreco.value == ""){
                alert("Por favor, preencha o preço.");
                document.fmCarros.txtpreco.focus();
                return false;
            }

            /* imagem */

            if(document.fmCarros.fileImagem0.value == ""){
                alert("Por favor, preencha pelo menos uma imagem.");
                document.fmCarros.fileImagem0.focus();
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
        <h1 class="text-center">Motos - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabCarros" class="nav-link active" id="linkCarros" data-toggle="tab" role="tab" aria-controls="tabCarros">Cadastro Motos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabMarca" class="nav-link" id="linkMarca" data-toggle="tab" role="tab" aria-controls="tabMarca">Marca</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabCategoria" class="nav-link" id="linkCategoria" data-toggle="tab" role="tab" aria-controls="tabCategoria">Categoria</a>
                    </li>
                </ul>

                <form action="cadastramotosAdm.php" name="fmCarros" method="post" enctype="multipart/form-data" onsubmit="return validaCampos()">
                   
                    <div class="tab-content" id="meusConteudos">

                        <!------Carro-------->

                            <div class="tab-pane fade show active" id="tabCarros" role="tabpanel" aria-labelledby="linkCarros">
                                <br>
                                <label>Nome da Moto:</label><br>
                                <input type="text" name="txtCarro" class="form-control">
                                <br>
                                <label>Introdução da Moto: <h9>(opicional)</h9></label>
                                <textarea name="txtIntro" class="form-control"  maxlength="79"></textarea>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Selecione o Modelo:</label>
                                        <select name="selAno" class="form-control">
                                            <?php
                                                $anoAtual = date('Y');
                                                for ($i=$anoAtual; $i >= 1885; $i--) { 
                                                    ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                    <label>Complemento: <h9>(opicional)</h9></label>
                                    <input type="text" name="txtTrailer" class="form-control">
                                    </div>
                                </div>

                                <label><br>Imagens:</label>
                                <div>
                                <input type="file" name="fileImagem0" class="btn btn-success w-100" accept="image/png, image/jpeg"/><br><br>
                                </div>
                                <div>
                                <input type="file" name="fileImagem1" class="btn btn-success w-100" accept="image/png, image/jpeg"><br><br>
                                </div>
                                <div>
                                <input type="file" name="fileImagem2" class="btn btn-success w-100" accept="image/png, image/jpeg"><br><br>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label><b>Motor</b><br><br></label>
                                        <br>
                                    </div>
                                    <br>
                                <div class="border">
                                <br>
                                    <label>Tipo de Motor</label>
                                    <input type="text" name="tipoMotor" class="form-control" placeholder="exemplo: 4 tempos, 2 cilindros, em linhas, 2 vávulas por cilindro, DOHC/ SOHC, cárter seco">
                                    <br>
                                    <label>Refrigeração</label>
                                    <input type="text" name="txtrefri" class="form-control" placeholder="exemplo: Líquida">
                                    <br>
                                    <label>Cavalos</label>
                                    <input type="text" name="txtcv" class="form-control" placeholder="exemplo: 320cv">
                                    <br>
                                    <label>Cilindradas</label>
                                    <input type="text" name="txtcilin" class="form-control" placeholder="exemplo: 160cc">
                                    <br>
                                    <label>Velocidade Máxima</label>
                                    <input type="text" name="txtvelocidade" class="form-control" placeholder="exemplo: 220 km/h">
                                    <br>
                                    <label>Tempo de 0-100</label>
                                    <input type="text" name="txtzero" class="form-control" placeholder="exemplo: 5,3 segundos">
                                    <br>
                                    <label>Torque Máximo</label>
                                    <input type="text" name="txttorque" class="form-control" placeholder="exemplo: 77,82 kfg.m">
                                    <br>
                                    <label>Sistema de admissão</label>
                                    <input type="text" name="txtadmissao" class="form-control" placeholder="exemplo: Aspiração natural a ar">
                                    <br>
                                    <label>Capacidade cúbica</label>
                                    <input type="text" name="txtcubico" class="form-control" placeholder="exemplo: 600 cm³">
                                    <br>
                                    <label>Capacidade de óleo (total)</label>
                                    <input type="text" name="txtoleo" class="form-control" placeholder="exemplo: 3,5 litros">
                                <br>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Dimensões</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Comprimento</label>
                                    <input type="text" name="txtcom" class="form-control" placeholder="exemplo: 2.090 mm">
                                    <br>
                                    <label>Largura</label>
                                    <input type="text" name="txtlargura" class="form-control" placeholder="exemplo: 740 mm">
                                    <br>
                                    <label>Altura</label>
                                    <input type="text" name="txtaltura" class="form-control" placeholder="exemplo: 1.095 mm">
                                    <br>
                                    <label>Distância mínima do solo	</label>
                                    <input type="text" name="txtpeso" class="form-control" placeholder="exemplo: 135 mm">
                                    <br>
                                    <label>Distância entre eixos</label>
                                    <input type="text" name="txttanque" class="form-control" placeholder="exemplo: 1.435 mm">
                                    <br>
                                    <label>Caster</label>
                                    <input type="text" name="txtcaster" class="form-control" placeholder="exemplo: 25°">
                                    <br>
                                    <label>Trail</label>
                                    <input type="text" name="txttrail" class="form-control" placeholder="exemplo: 99 mm">
                                    <br>
                                    <label>Ângulo de esterço</label>
                                    <input type="text" name="txtangulo" class="form-control" placeholder="exemplo: 27°">
                                    <br>
                                    <label>Altura do assento</label>
                                    <input type="text" name="txtassento" class="form-control" placeholder="exemplo: 800 mm">
                                    <br>
                                    <label>Peso em ordem de marcha</label>
                                    <input type="text" name="txtpesomarcha" class="form-control" placeholder="exemplo: 198 kg">
                                <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Combustível</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Alimentação</label>
                                    <input type="text" name="txtalimentacao" class="form-control" placeholder="exemplo: Injeção Eletrônica">
                                    <br>
                                    <label>Diâmetro da injeção eletrônica</label>
                                    <input type="text" name="txtinjecao" class="form-control" placeholder="exemplo: 36 mm">
                                    <br>
                                    <label>Combustível</label>
                                    <input type="text" name="txtcombustivel" class="form-control" placeholder="exemplo: Gasolina">
                                    <br>
                                    <label>Tanque de combustível</label>
                                    <input type="text" name="txttanquecombus" class="form-control" placeholder="exemplo: 19 litros">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Eletrônica</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Ignição</label>
                                    <input type="text" name="txtignicao" class="form-control" placeholder="exemplo: CDI/ECU">
                                    <br>
                                    <label>Partida</label>
                                    <input type="text" name="txtpartida" class="form-control" placeholder="exemplo: Elétrica">
                                    <br>
                                    <label>Bateria</label>
                                    <input type="text" name="txtbateria" class="form-control" placeholder="exemplo: 12V 10Ah selada">
                                    <br>
                                    <label>Farois</label>
                                    <input type="text" name="txtfarol" class="form-control" placeholder="exemplo: 55w H7+ 60w h9">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Transmissão</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Embreagem</label>
                                    <input type="text" name="txtembreagem" class="form-control" placeholder="exemplo: Multidisco deslizante banhada a óleo">
                                    <br>
                                    <label>Câmbio</label>
                                    <input type="text" name="txtcambio" class="form-control" placeholder="exemplo: Manual sequencial de 6 velocidade">
                                    <br>
                                    <label>Redução final</label>
                                    <input type="text" name="txtreducao" class="form-control" placeholder="exemplo: 45/16">
                                    <br>
                                    <label>Transmissão final</label>
                                    <input type="text" name="txttramissao" class="form-control" placeholder="exemplo: Por corrente">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Suspensão</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Suspensão dianteira</label>
                                    <input type="text" name="txtsuspensao1" class="form-control" placeholder="exemplo: Garfo telescópio invertido (up-side-down), 43 mm diâmetro, curso de 120 mm">
                                    <br>
                                    <label>Suspensão traseira</label>
                                    <input type="text" name="txtsuspensao2" class="form-control" placeholder="exemplo: Monochoque com link, curso de 128 mm, ajuste de pré-carga da mola">
                                    <br>
                                    <label>Roda dianteira</label>
                                    <input type="text" name="txtroda1" class="form-control" placeholder="exemplo: De liga leve, 17 polegadas">
                                    <br>
                                    <label>Roda traseira</label>
                                    <input type="text" name="txtroda2" class="form-control" placeholder="exemplo: De liga leve, 17 polegadas">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Freios</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Freio dianteiro	</label>
                                    <input type="text" name="txtmalas" class="form-control" placeholder="exemplo: Duplo disco flutuante e ventilado, de 296 mm, pinças, de 2 pistões, sem ABS">
                                    <br>
                                    <label>Freio traseiro	</label>
                                    <input type="text" name="txtocupantes" class="form-control" placeholder="exemplo: Disco ventilado, de 240 mm,pinça, de 1 pistão, sem ABS">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Preço medio do mercado</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                    <br>
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <label>Preço</label>
                                            <input type="text" name="txtpreco" class="form-control" placeholder="exemplo: R$ 33.739,03">
                                        </div>
                                    </div>
                                    <br>
                                </div>
                        </div>
                    </div>

                    <!-----------------       Marcas   --------------------------->

                            <div class="tab-pane fade" id="tabMarca" role="tabpanel" aria-labelledby="linkMarca">
                                <br>
                                <div class="row">
                                    <?php 
                                        $sql = "SELECT  nome_marca, id_marca, caminho_imagem FROM vw_marcas";
                                        if($res=mysqli_query($con,$sql)){
                                            $i = 0;
                                            while($reg= mysqli_fetch_assoc($res)){
                                                ?>
                                                
                                                <div class="col-md-2 itensCadastrados text-center" style="margin-left:30px; margin-bottom:10px " >
                                                    <img src="img/marcas/<?php if($reg['caminho_imagem'] == "" || $reg['caminho_imagem'] == NULL){
                                                        echo "semimg.png";   
                                                    }else{
                                                        echo $reg['caminho_imagem'];
                                                    } ?>" class="img-responsive img-thumbnail">
                                                    <h4><?php echo $reg['nome_marca']; ?></h4>
                                                    <input type="checkbox" name="chMarcam_<?php echo $i; ?>"  value="<?php echo $reg['id_marca']; ?>">
                                                </div>
                                                <?php
                                                $i++;
                                            }
                                            $_SESSION['maxMarcas'] = $i;
                                        }else{?>
                                        <div class="alert alert-danger" role="alert">
                                            <h2>Erro banco de bados</h2>
                                        </div><br><br>
                                    <?php }
                                    ?>
                                </div>
                            </div>

                           <!------------Categorias--------------->                 


                            <div class="tab-pane fade" id="tabCategoria" role="tabpanel" aria-labelledby="linkCategoria">
                                <br>
                                <div class="row">
                                    <?php 
                                        $sql = "SELECT  id_Categoria, Nome_Categoria FROM vw_retorna_categorias";
                                        if($res=mysqli_query($con,$sql)){
                                            $i = 0;
                                            while($reg= mysqli_fetch_assoc($res)){
                                                ?>
                                                
                                                <div class="col-md-3 itensCadastrados text-center">
                                                    
                                                    <h4><?php echo $reg['Nome_Categoria']; ?></h4>
                                                    <input type="checkbox" name="chCategoriam<?php echo $i; ?>"  value="<?php echo $reg['id_Categoria']; ?>">
                                                </div>
                                                <?php
                                                $i++;
                                            }
                                            $_SESSION['maxCategoria'] = $i;
                                        }else{?>
                                        <div class="alert alert-danger" role="alert">
                                            <h2>Erro banco de bados</h2>
                                        </div><br><br>
                                    <?php }
                                    ?>
                                </div>
                                <br><br>
                                
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary w-100" name="btnSubmitMotos">Cadastrar Moto</button> 
                            <br><br>
                    </div>
                </form>   
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