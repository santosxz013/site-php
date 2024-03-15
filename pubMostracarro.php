
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
<title>Garagem center</title>

    <?php include_once "head.html"; include_once "conexao.php"; include_once "funcao.php"; ?>
    <!--- links --->
</head>
<body class="pag-bloqueada">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>
    <!--- menu superior --->


    <!--- Principal --->

    
    <?php 
        if(isset($_GET['pubMostracarro'])){
            $codigoC = $_GET['pubMostracarro'];
            $_SESSION['codigoCarro'] = $_GET['pubMostracarro'];
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
        }
    ?>
<a href="javascript:void(0);" onclick="history.back();"><div class="volta">
<i class="fa-solid fa-arrow-left"></i>
    </div></a>
        <br><br><br>
        <h2 class="text-center"><b><?php echo $nome?></b></h2><br>
        <img src="img/carros/<?php echo $imagem?>"class="text-center test img-responsive img-thumbnail" width="40%" alt=""><br>

        <h4 class="text-center"><?php echo $intro ?></h4>
<table>
    <tr class="top1">
      <th>Característica</th>
      <th colspan="2">Característica e Descrição</th>
    </tr>
    <tr>
      <th rowspan="9" class="cor">Motor</th>
      <td>Tipo de Motor</td>
      <td><?php echo $motor; ?></td>
    </tr>
    <tr>
      <td>Combustível</td>
      <td><?php echo $combustivel; ?></td>
    </tr>
    <tr>
      <td>Cavalos</td>
      <td><?php echo $cavalos; ?></td>
    </tr>
    <tr>
      <td>Velociade Máxima</td>
      <td><?php echo $velocidade; ?></td>
    </tr>
    <tr>
      <td>Tempo de 0-100</td>
      <td><?php echo $tempo; ?></td>
    </tr>
    <tr>
      <td>Torque máximo</td>
      <td><?php echo $torque; ?></td>
    </tr>
    <tr>
      <td>Câmbio</td>
      <td><?php echo $cambio ;?></td>
    </tr>
    <tr>
      <td>Tração</td>
      <td><?php echo $tracao ;?></td>
    </tr>
    <tr>
      <td>Direção</td>
      <td><?php echo $direcao ;?></td>
    </tr>

    <tr>
          <th rowspan="8" class="cor">Dimensões</th>
          <td>Comprimento</td>
          <td><?php echo $comprimento;?></td>
        </tr>
        <tr>
          <td>Largura</td>
          <td><?php echo $largura ;?></td>
        </tr>
        <tr>
          <td>Altura</td>
          <td><?php echo $altura;?></td>
        </tr>
        <tr>
          <td>Peso</td>
          <td><?php echo $peso ;?></td>
        </tr>
        <tr>
          <td>Tanque</td>
          <td><?php echo $tanque;?></td>
        </tr>
        <tr>
          <td>Entre-eixos </td>
          <td><?php echo $eixo;?></td>
        </tr>
        <tr>
          <td>Porta-Malas</td>
          <td><?php echo $malas;?></td>
        </tr>
        <tr>
          <td>Ocupantes</td>
          <td><?php echo $ocupantes;?></td>
        </tr>

        <tr>
          <th rowspan="5" class="cor">Janelas</th>
        </tr>
        <tr>
          <td>Vidros elétricos dianteiros</td>
          <td><?php echo $vidro1;?></td>
        </tr>
        <tr>
          <td>Desemb. traseiro</td>
          <td><?php echo $desem;?></td>
        </tr>
        <tr>
          <td>Teto solar</td>
          <td><?php echo $teto;?></td>
        </tr>
        <tr>
          <td>Vidros elétricos traseiros</td>
          <td><?php echo $vidro2;?></td>
        </tr>
        <!-- ... outras linhas ... -->

        <tr>
          <th rowspan="4" class="cor">Bancos</th>
        </tr>
        <tr>
          <td>bancos de couro</td>
          <td><?php echo $banco;?></td>
        </tr>
        <tr>
          <td>ajuste de altura</td>
          <td><?php echo $ajuste1;?></td>
        </tr>
        <tr>
          <td>ajuste elétrico</td>
          <td><?php echo $ajuste2;?></td>
        </tr>


    <tr>
        <th rowspan="5" class="cor">Conforto</th>
      </tr>
      <tr>
        <td>ar-condicionado</td>
        <td><?php echo $ar1;?></td>
      </tr>
      <tr>
        <td>Travas elétricas</td>
        <td><?php echo  $travas;?></td>
      </tr>
      <tr>
        <td>Ar-quente</td>
        <td><?php echo $ar2 ;?></td>
      </tr>
      <tr>
        <td>Piloto automático</td>
        <td><?php echo $piloto;?></td>
      </tr>
      <tr>
        <th rowspan="4" class="cor">Segurança</th>
        <td>Airbag motorista</td>
        <td><?php echo $airbag;?></td>
      </tr>
      <tr>
        <td>Alarme</td>
        <td><?php echo $alerta;?></td>
      </tr>
      <tr>
        <td>Freios ABS</td>
        <td>Sim</td>
      </tr>
      <tr>
        <td>Airbag passageiro</td>
        <td>Sim</td>
      </tr>
      <tr>
        <th rowspan="4" class="cor">Som</th>
        <td>Cd player</td>
        <td><?php echo $cd;?></td>
      </tr>
      <tr>
        <td>Entrada USB</td>
        <td><?php echo $usb;?></td>
      </tr>
      <tr>
        <td>Rádio FM/AM</td>
        <td><?php echo $radio;?></td>
      </tr>
      <tr>
        <td>Kit Multimídia</td>
        <td><?php echo $kit;?></td>
      </tr>
      
        <!-- ... outras linhas ... -->
        

       
        
        <tr>
          <th rowspan="2" class="cor">Preço médio do mercado</th>
        </tr>
        <tr>
          
          <td><?php echo $preco;?></td>
          <td>Ano/Modelo <?php echo $modelo?></td>
        </tr>
      </table><br>
        
      <div id="scroll-to-top">
    <button onclick="scrollToTop()"><i class="fa-solid fa-arrow-up"></i></button>
  </div>

  <script type="text/javascript" >
    // Função para rolar a página de volta ao topo
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

// Exibir o botão "Voltar para o Topo" quando o usuário rolar para baixo
window.addEventListener('scroll', function() {
  if (window.pageYOffset > 200) { // Altere esse valor para definir quando o botão deve aparecer
    document.getElementById('scroll-to-top').style.display = 'block';
  } else {
    document.getElementById('scroll-to-top').style.display = 'none';
  }
});

  </script>

    

    <!--- Principal --->

</body>
</html>