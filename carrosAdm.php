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
            /* motor */
            if(document.fmCarros.txtCarro.value == ""){
                alert("Por favor, preencha o nome do carro.");
                document.fmCarros.txtCarro.focus();
                return false;
            }
            if(document.fmCarros.selAno.value == ""){
                alert("Por favor, escolha o modelo do carro.");
                document.fmCarros.selAno.focus();
                return false;
            }
            if(document.fmCarros.txtIntro.value == ""){
                alert("Por favor, preencha a introdução.");
                document.fmCarros.txtIntro.focus();
                return false;
            }

                /* imagem */

            if(document.fmCarros.fileImagem0.value == ""){
                alert("Por favor, preencha pelo menos uma imagem.");
                document.fmCarros.fileImagem0.focus();
                return false;
            }


            if(document.fmCarros.tipoMotor.value == ""){
                alert("Por favor, preencha o tipo de motor.");
                document.fmCarros.tipoMotor.focus();
                return false;
            }
            if(document.fmCarros.txtcombustivel.value == ""){
                alert("Por favor, preencha o tipo de combustivel.");
                document.fmCarros.txtcombustivel.focus();
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
            if(document.fmCarros.txtcambio.value == ""){
                alert("Por favor, preencha o cambio.");
                document.fmCarros.txtcambio.focus();
                return false;
            }
            if(document.fmCarros.txttracao.value == ""){
                alert("Por favor, preencha a traçao.");
                document.fmCarros.txttracao.focus();
                return false;
            }
            if(document.fmCarros.txtdirecao.value == ""){
                alert("Por favor, preencha a direção.");
                document.fmCarros.txtdirecao.focus();
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
                alert("Por favor, preencha o peso.");
                document.fmCarros.txtpeso.focus();
                return false;
            }
            if(document.fmCarros.txttanque.value == ""){
                alert("Por favor, preencha o tanque.");
                document.fmCarros.txttanque.focus();
                return false;
            }
            if(document.fmCarros.txteixos.value == ""){
                alert("Por favor, preencha a distancia entre eixos.");
                document.fmCarros.txteixos.focus();
                return false;
            }
            if(document.fmCarros.txtmalas.value == ""){
                alert("Por favor, preencha o tamanho do porta malas.");
                document.fmCarros.txtmalas.focus();
                return false;
            }
            if(document.fmCarros.txtocupantes.value == ""){
                alert("Por favor, preencha o numero de ocupantes.");
                document.fmCarros.txtocupantes.focus();
                return false;
            }
            /* Segurança */

            if(document.fmCarros.txtmotorista.value == "..."){
                alert("Por favor, preencha airbag do motorista.");
                document.fmCarros.txtmotorista.focus();
                return false;
            }
            if(document.fmCarros.txtalerta.value == "..."){
                alert("Por favor, preencha o alerta.");
                document.fmCarros.txtalerta.focus();
                return false;
            }
            if(document.fmCarros.txtfreio.value == "..."){
                alert("Por favor, preencha o freio.");
                document.fmCarros.txtfreio.focus();
                return false;
            }
            if(document.fmCarros.txtpassageiro.value == "..."){
                alert("Por favor, preencha o airbag passageiro.");
                document.fmCarros.txtpassageiro.focus();
                return false;
            }
            /* conforto */

            if(document.fmCarros.txtar1.value == "..."){
                alert("Por favor, preencha ar condicionado.");
                document.fmCarros.txtar1.focus();
                return false;
            }
            if(document.fmCarros.txttravas.value == "..."){
                alert("Por favor, preencha a travas eletricas.");
                document.fmCarros.txttravas.focus();
                return false;
            }
            if(document.fmCarros.txtar2.value == "..."){
                alert("Por favor, preencha o ar quente.");
                document.fmCarros.txtar2.focus();
                return false;
            }
            if(document.fmCarros.txtauto.value == "..."){
                alert("Por favor, preencha o piloto automatico.");
                document.fmCarros.txtauto.focus();
                return false;
            }
            /* janelas */

            if(document.fmCarros.txtvidros1.value == "..."){
                alert("Por favor, preencha vidros dianteiros.");
                document.fmCarros.txtvidros1.focus();
                return false;
            }
            if(document.fmCarros.txtvidros2.value == "..."){
                alert("Por favor, preencha vidros traseiros.");
                document.fmCarros.txtvidros2.focus();
                return false;
            }
            if(document.fmCarros.txtteto.value == "..."){
                alert("Por favor, preencha o teto solar.");
                document.fmCarros.txtteto.focus();
                return false;
            }
            if(document.fmCarros.txtdesem.value == "..."){
                alert("Por favor, preencha o desembaçador traseiro.");
                document.fmCarros.txtdesem.focus();
                return false;
            }


            /* Bancos */

            if(document.fmCarros.txtbanco.value == "..."){
                alert("Por favor, preencha Bancos de couro.");
                document.fmCarros.txtbanco.focus();
                return false;
            }
            if(document.fmCarros.txtajuste1.value == "..."){
                alert("Por favor, preencha ajuste de altura.");
                document.fmCarros.txtajuste1.focus();
                return false;
            }
            if(document.fmCarros.txtajuste2.value == "..."){
                alert("Por favor, preencha ajuste eletrico.");
                document.fmCarros.txtajuste2.focus();
                return false;
            }

            /* som */

            if(document.fmCarros.txtcd.value == "..."){
                alert("Por favor, preencha CD Player.");
                document.fmCarros.txtcd.focus();
                return false;
            }
            if(document.fmCarros.txtusb.value == "..."){
                alert("Por favor, preencha entrada USB.");
                document.fmCarros.txtusb.focus();
                return false;
            }
            if(document.fmCarros.txtradio.value == "..."){
                alert("Por favor, preencha radio.");
                document.fmCarros.txtradio.focus();
                return false;
            }
            if(document.fmCarros.txtkit.value == "..."){
                alert("Por favor, preencha kit.");
                document.fmCarros.txtkit.focus();
                return false;
            }

            /* preco */

            if(document.fmCarros.txtpreco.value == ""){
                alert("Por favor, preencha o preço.");
                document.fmCarros.txtpreco.focus();
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
        <h1 class="text-center">Carros - Administração</h1>
        <br>
        <div class="row">

            <div class="col-md-3  col-3">
                <?php include_once "menuADM.php" ?>
            </div>

            <div class="col-md-9 col-9">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabCarros" class="nav-link active" id="linkCarros" data-toggle="tab" role="tab" aria-controls="tabCarros">Cadastro carros</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabMarca" class="nav-link" id="linkMarca" data-toggle="tab" role="tab" aria-controls="tabMarca">Marca</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabCategoria" class="nav-link" id="linkCategoria" data-toggle="tab" role="tab" aria-controls="tabCategoria">Categoria</a>
                    </li>
                </ul>

                <form action="cadastracarrosAdm.php" name="fmCarros" method="post" enctype="multipart/form-data" onsubmit="return validaCampos()">
                   
                    <div class="tab-content" id="meusConteudos">

                        <!------Carro-------->

                        <div class="tab-pane fade show active" id="tabCarros" role="tabpanel" aria-labelledby="linkCarros">
                                <br>
                                <label>Nome do Carro:</label><br>
                                <input type="text" name="txtCarro" class="form-control">
                                <br>
                                <label>Introdução do carro:</label>
                                <textarea name="txtIntro" class="form-control"  maxlength="100"></textarea>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Selecione o Modelo:</label>
                                        <select name="selAno" class="form-control">
                                            <?php
                                                $anoAtual = date('Y');
                                                for ($i=$anoAtual; $i >= 1886; $i--) { 
                                                    ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                    <label>Complemento <h9>(opicional)</h9></label>
                                    <input type="text" name="txtTrailer" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="alert alert-primary">
                                    <h2 class="text-center">ATENÇÂO</h2>
                                    <h4 class="text-center">Sempre utilize imagens com as mesma dimensões.
                                        <br><strong>Recomendado: </strong>Lagura: 1920px X Altura: 1080px
                                    </h4>
                                </div>
                                <label>Imagens:</label>
                                <div>
                                <input type="file" name="fileImagem0" class="btn btn-success w-100" accept="image/png, image/jpeg"/><br>    <br>
                                </div>
                                <div>
                                <input type="file" name="fileImagem1" class="btn btn-success w-100" accept="image/png, image/jpeg"/><br><br>
                                </div>
                                <div>
                                <input type="file" name="fileImagem2" class="btn btn-success w-100" accept="image/png, image/jpeg"/><br>
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
                                    <input type="text" name="tipoMotor" class="form-control" placeholder="exemplo: 1.8">
                                    <br>
                                    <label>Combustível</label>
                                    <input type="text" name="txtcombustivel" class="form-control" placeholder="exemplo: Gasolina">
                                    <br>
                                    <label>Cavalos</label>
                                    <input type="text" name="txtcv" class="form-control" placeholder="exemplo: 320cv">
                                    <br>
                                    <label>Velocidade Máxima</label>
                                    <input type="text" name="txtvelocidade" class="form-control" placeholder="exemplo: 220 km/h">
                                    <br>
                                    <label>Tempo de 0-100</label>
                                    <input type="text" name="txtzero" class="form-control" placeholder="exemplo: 5,3 segundos">
                                    <br>
                                    <label>Torque Máximo</label>
                                    <input type="text" name="txttorque" class="form-control" placeholder="exemplo: 77,82 kgf.m">
                                    <br>
                                    <label>Cãmbio</label>
                                    <input type="text" name="txtcambio" class="form-control" placeholder="exemplo: automático">
                                    <br>
                                    <label>Tração</label>
                                    <input type="text" name="txttracao" class="form-control" placeholder="exemplo: traseira">
                                    <br>
                                    <label>Direção</label>
                                    <input type="text" name="txtdirecao" class="form-control" placeholder="exemplo: Elétrica">
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
                                    <input type="text" name="txtcom" class="form-control" placeholder="exemplo: 4.966 mm">
                                    <br>
                                    <label>Largura</label>
                                    <input type="text" name="txtlargura" class="form-control" placeholder="exemplo: 1.903 mm">
                                    <br>
                                    <label>Altura</label>
                                    <input type="text" name="txtaltura" class="form-control" placeholder="exemplo: 1.473 mm">
                                    <br>
                                    <label>Peso</label>
                                    <input type="text" name="txtpeso" class="form-control" placeholder="exemplo: 1.930 kg">
                                    <br>
                                    <label>Tanque</label>
                                    <input type="text" name="txttanque" class="form-control" placeholder="exemplo: 60 litros">
                                    <br>
                                    <label>Distancia entre eixos</label>
                                    <input type="text" name="txteixos" class="form-control" placeholder="exemplo: 2.982 mm">
                                    <br>
                                    <label>Porta-Malas</label>
                                    <input type="text" name="txtmalas" class="form-control" placeholder="exemplo: 530 litros">
                                    <br>
                                    <label>Ocupantes</label>
                                    <input type="text" name="txtocupantes" class="form-control" placeholder="exemplo: 5">
                                <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Segurança</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                    <br>
                                    <label>Airbag Motorista</label>
                                    <select name="txtmotorista" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Alerta</label>
                                    <select name="txtalerta" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Freio ABS</label>
                                    <select name="txtfreio" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Airbag passageiro</label>
                                    <select name="txtpassageiro" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Conforto</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Ar-Condicionado</label>
                                    <select name="txtar1" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Travas Eletricas</label>
                                    <select name="txttravas" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ar-Quente</label>
                                    <select name="txtar2" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Piloto Automatico</label>
                                    <select name="txtauto" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Janelas</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Vidros Elétricos Dianteiros</label>
                                    <select name="txtvidros1" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Vidros Elétricos Traseiros</label>
                                    <select name="txtvidros2" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Teto Solar</label>
                                    <select name="txtteto" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Desembaçador Traseiro</label>
                                    <select name="txtdesem" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Bancos</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>Bancos de Couro</label>
                                    <select name="txtbanco" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ajuste de Altura</label>
                                    <select name="txtajuste1" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Ajuste Elétrico</label>
                                    <select name="txtajuste2" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <label><b>Som</b></label>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="border">
                                <br>
                                    <label>CD Player</label>
                                    <select name="txtcd" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Entrada USB</label>
                                    <select name="txtusb" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Rádio FM/AM</label>
                                    <select name="txtradio" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
                                    <br>
                                    <label>Kit Multimidia</label>
                                    <select name="txtkit" class="form-control">
                                        <option value="...">...</option>
                                        <option value="sim">sim</option>
                                        <option value="não">não</option>
                                    </select>
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
                                            <input type="text" name="txtpreco" class="form-control" placeholder="exemplo: R$ 200.000,00">
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
                                                    <input type="checkbox" name="chMarca_<?php echo $i; ?>"  value="<?php echo $reg['id_marca']; ?>">
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
                                                    <input type="checkbox" name="chCategoria<?php echo $i; ?>"  value="<?php echo $reg['id_Categoria']; ?>">
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
                            <button type="submit" class="btn btn-primary w-100" name="btnSubmitCarro">Cadastrar Carro</button> 
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