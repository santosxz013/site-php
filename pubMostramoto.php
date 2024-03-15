
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
        if(isset($_GET['pubMostramoto'])){
            $codigoM = $_GET['pubMostramoto'];
            $_SESSION['codigoMoto'] = $_GET['pubMostramoto'];
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
                $refrigeracao = $reg['refrigeracao'];
                $cilindrada = $reg['cilindrada'];
                $cavalos = $reg['cavalos'];
                $velocidade = $reg['velocidade_max'];
                $tempo = $reg['tempo_0a100'];
                $torque = $reg['torque'];
                $admissao = $reg['adimissao'];
                $cubica = $reg['cubica'];
                $oleo = $reg['oleo'];
                $comprimento = $reg['comprimento'];
                $largura = $reg['largura'];
                $altura = $reg['altura'];
                $dis1 = $reg['distanciasolo'];
                $dis2 = $reg['distanciaeixo'];
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
                $farois = $reg['farois'];
                $embreagem = $reg['embreagem'];
                $cambio = $reg['cambio'];
                $reducao = $reg['reducao'];
                $transmissao = $reg['transmissao'];
                $sus1 = $reg['suspensaod'];
                $sus2 = $reg['suspensaot'];
                $roda1 = $reg['rodad'];
                $roda2 = $reg['rodat'];
                $freio1 = $reg['freiod'];
                $freio2 = $reg['freiot'];
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
        <img src="img/motos/<?php echo $imagem?>"class="text-center test img-responsive img-thumbnail" width="40%" alt=""><br>
        <br>
        <h4 class="text-center"><?php echo $intro ?></h4><br>
<table>    
<tr>
      <th>Característica</th>
      <th colspan="2">Característica e Descrição</th>
    </tr>
    <tr>
      <th class="cor" rowspan="10">Motor</th>
      <td>Tipo de Motor</td>
      <td><?php echo $motor ;?></td>
    </tr>
    <tr>
      <td>Refrigeração</td>
      <td><?php echo $refrigeracao ;?></td>
    </tr>
    <tr>
      <td>Cilindrada</td>
      <td><?php echo $cilindrada ;?></td>
    </tr>
    <tr>
      <td>Cavalos</td>
      <td><?php echo  $cavalos;?></td>
    </tr>
    <tr>
      <td>Velocidade Máxima</td>
      <td><?php echo $velocidade ;?></td>
    </tr>
    <tr>
      <td>Tempo de 0-100</td>
      <td><?php echo $tempo ;?></td>
    </tr>
    <tr>
      <td>Torque máximo</td>
      <td><?php echo  $torque;?></td>
    </tr>
    <tr>
      <td>Sistema de admissão</td>
      <td><?php echo  $admissao;?></td>
    </tr>
    <tr>
      <td>Capacidade Cúbica</td>
      <td><?php echo $cubica ;?></td>
    </tr>
    <tr>
      <td>Capacidade de óleo (total)</td>
      <td><?php echo $oleo ;?></td>
    </tr>
    <tr>
        <th class="cor" rowspan="4">Combustível</th>
        <td>Alimentação</td>
        <td><?php echo $alimentacao ;?></td>
      </tr>
      <tr>
        <td>Diâmetro da injeção eletrônica</td>
        <td><?php echo $diametro ;?></td>
      </tr>
      <tr>
        <td>Combustível</td>
        <td><?php echo  $combustivel;?></td>
      </tr>
      <tr>
        <td>Tanque de combustível</td>
        <td><?php echo  $tanque;?></td>
      </tr>
      <tr>
        <th class="cor" rowspan="4">Eletrônica</th>
        <td>Ignição</td>
        <td><?php echo  $ignicao;?></td>
      </tr>
      <tr>
        <td>Partida</td>
        <td><?php echo  $partida;?></td>
      </tr>
      <tr>
        <td>Bateria</td>
        <td><?php echo  $bateria;?></td>
      </tr>
      <tr>
        <td>Farois</td>
        <td><?php echo  $farois;?></td>
      </tr>
      <tr>
        <th class="cor" rowspan="4">Transmissão</th>
        <td>Embreagem</td>
        <td><?php echo  $embreagem;?></td>
      </tr>
      <tr>
        <td>Câmbio</td>
        <td><?php echo  $cambio;?></td>
      </tr>
      <tr>
        <td>Redução final</td>
        <td><?php echo  $reducao;?></td>
      </tr>
      <tr>
        <td>Transmissão final</td>
        <td><?php echo  $transmissao;?></td>
      </tr>
        <!-- ... outras linhas ... -->
        <tr>
          <th class="cor" rowspan="10">Dimensões</th>
          <td>Comprimento</td>
          <td><?php echo  $comprimento;?></td>
        </tr>
        <tr>
          <td>Largura</td>
          <td><?php echo  $largura;?></td>
        </tr>
        <tr>
          <td>Altura</td>
          <td><?php echo  $altura;?></td>
        </tr>
        <tr>
          <td>Distância mínima do solo</td>
          <td><?php echo  $dis1;?></td>
        </tr>
        <tr>
          <td>Distância entre eixos</td>
          <td><?php echo  $dis2;?></td>
        </tr>
        <tr>
          <td>Caster</td>
          <td><?php echo  $caster;?></td>
        </tr>
        <tr>
          <td>Trail</td>
          <td><?php echo  $trail;?></td>
        </tr>
        <tr>
          <td>Ângulo de esterço</td>
          <td><?php echo $esteco;?></td>
        </tr>
        <tr>
          <td>Altura do assento</td>
          <td><?php echo  $assento;?></td>
        </tr>
        <tr>
          <td>Peso em ordem de marcha</td>
          <td><?php echo  $peso;?></td>
        </tr>
        <tr>
          <th class="cor" rowspan="4">Suspensão</th>
          <td>Suspensão dianteira</td>
          <td><?php echo  $sus1;?></td>
        </tr>
        <tr>
          <td>Suspensão traseira</td>
          <td><?php echo  $sus2;?></td>
        </tr>
        <tr>
          <td>Roda dianteira</td>
          <td><?php echo  $roda1;?></td>
        </tr>
        <tr>
          <td>Roda traseira</td>
          <td><?php echo  $roda2;?> </td>
        </tr>
        <!-- ... outras linhas ... -->
        <tr>
          <th class="cor" rowspan="2">Freios</th>
          <td>Freio dianteiro</td>
          <td><?php echo  $freio1;?></td>
        </tr>
        <tr>
          <td>Freio traseiro</td>
          <td><?php echo  $freio2;?></td>
        </tr>
        <tr>
          <th rowspan="2" class="cor">Preço médio do mercado</th>
          <td>Ano/Modelo <?php echo  $modelo;?></td>
          <td><?php echo  $preco;?></td>
        </tr>

    </table>
        
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