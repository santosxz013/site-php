
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
<title>Garagem center</title>

    <?php include_once "head.html"; include_once "conexao.php"; include_once "funcao.php"; ?>
    <!--- links --->

    <style>
  .img-thumbnail {
    width: 25%; /* Defina a largura desejada para as imagens */
    height: 400px; /* Mantém a proporção original */
    align-items: center; /* Correção: propriedade correta para centralizar itens */
    margin-left: 37.6%;
  }

  .ss {
    font-size: 17px;
    line-height: 2;
    text-overflow: ellipsis;
    word-wrap: break-word; /* Quebra de palavra */
    max-width: 90ch; /* Largura máxima de 90 caracteres */
  
  }
  .card-img-top {
            width: 100%; /* Defina a largura desejada para as imagens */
            height: 220px; /* Mantém a proporção original */
        }
</style>

</head>
<body class="pag-bloqueada">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html" ?>
    <!--- menu superior --->


    <!--- Principal --->

    
    <?php 
        if(isset($_GET['pubMostramarca'])){
          $codigoM = mysqli_real_escape_string($con, $_GET['pubMostramarca']);
          $_SESSION['codigoMoto'] = $codigoM;
            $sql = "SELECT * FROM imagens WHERE marcas_id = $codigoM";
                if($res = mysqli_query($con,$sql)){
                    $reg = mysqli_fetch_assoc($res);
                    $imagem = $reg['caminho'];
                }    
            $sql = "SELECT * FROM marcas WHERE id = $codigoM";
            if($res = mysqli_query($con,$sql)){
                $reg = mysqli_fetch_assoc($res);
                $nome = $reg['nome'];
                $intro = $reg['introducao'];
                $sobre = $reg['sobre'];
                


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
        <img src="img/marcas/<?php echo $imagem?>"class="text-center test img-responsive img-thumbnail"  alt=""><br>

        <h4 class="text-center"><?php echo $intro ?></h4>
<table>    
    <tr>
      <th class="text-center">Sobre a Marca</th>
    </tr>
    <tr>
      <td class="ss text-center"><?php echo $sobre ?></td>
    </tr>
    

    </table>
    <table>    
    <tr>
      <th colspan="3" class="text-center">Veiculos da Marca</th>
    </tr>
    <tr>
      <?php 
        $sql = "SELECT * FROM vw_carros WHERE marca = $codigoM";
        if($res = mysqli_query($con,$sql)){
            

            while($reg=mysqli_fetch_assoc($res)){
            $nomeCarro = $reg['nome_carro'];
            $codigoCarro = $reg['codigo_carro'];
            $imagemCarro = $reg['caminho_imagem'];
            $introCarro = $reg['intro_carro'];
            

            ?>
            
        <td class="ss text-center">
          <div class="card">
            <img src="img/carros/<?php echo $imagemCarro; ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h3 class="card-title"><?php echo $nomeCarro; ?></h3>
                <p class="card-text"><?php echo $introCarro; ?></p>
                <a href="pubMostracarro.php?pubMostracarro=<?php echo $codigoCarro; ?>&nome=<?php echo $nomeCarro; ?>" class="btn btn-primary stretched-link">Saiba mais</a>
            </div>
          </div>
        </td>

      <?php
              
            }
            /* puxar do banco de dados*/
        }else{
            echo "erro 2";
        }  
      ?>

<?php


$sql = "SELECT * FROM vw_motos WHERE marca = $codigoM";
if($res=mysqli_query($con, $sql)){
    while($reg=mysqli_fetch_assoc($res)){
        $nome = $reg['nome_moto'];
        $codigoMoto = $reg['codigo_moto'];
        $imagemMoto = $reg['caminho_imagem'];
        $intromoto = $reg['intro_moto'];

        $imagemMoto = isset($imagemMoto) ? $imagemMoto : "semimg.png";


      ?>
      <td class="ss text-center">
      <div class="card">
                <img src="img/motos/<?php echo $imagemMoto; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $nome; ?></h3>
                    <p class="card-text"><?php echo $intromoto; ?></p>
                    <a href="pubMostramoto.php?pubMostramoto=<?php echo $codigoMoto; ?>&nome=<?php echo $nome; ?>" class="btn btn-primary stretched-link">Saiba mais</a>
                </div>
        </div></td>
      
    <?php    
    }
      /* puxar do banco de dados*/
    }else{
      echo "erro 3";
    }
    ?>

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