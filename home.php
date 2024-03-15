<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php include_once "head.html" ?>


    <title>Garagem center</title>

    <style>
        .card-img-top {
            width: 100%; /* Defina a largura desejada para as imagens */
            height: 250px; /* Mantém a proporção original */
        }
        .card-img {
            width: 100%; /* Defina a largura desejada para as imagens */
            height: 200px; /* Defina a Altura desejada para as imagens *//* Mantém a proporção original 'auto' */
        }
        
        
    </style>

</head>
<body class="pag-bloqueada">
    <!--- menu superior --->
    
    <?php include_once "menuSuperior.html" ?>

    <!--- menu superior --->

    <!--- Banner --->

    <?php include_once "banner.php" ?>
    
    <!--- Banner --->
    
    <br>
    <h1 class="text-center">Carros em Destaques</h1>
    <main class="container">
    <br>
   <!--- vitrine --->


<!-----  destaque alternatico---- 

carros em destaque automatico!

ultimos carros adicionados!!!!!

<div class="row carroDestaque">
/*<?php
    $sql = 'SELECT * FROM vw_carros order by nome_carro';
    if ($res = mysqli_query($con, $sql)) {
        $nomeCarro = array();
        $codigoCarro = array();
        $imagemMoto = array();
        $intro = array();
        $i = 0;
        $linhas = 0;

        while ($reg = mysqli_fetch_assoc($res)) {
            $linhas = mysqli_affected_rows($con);
            $nomeCarro[$i] = $reg['nome_carro'];
            $codigoCarro[$i] = $reg['codigo_carro'];
            $imagemMoto[$i] = $reg['caminho_imagem'];
            $intro[$i] = $reg['intro_carro'];

            $imagemMoto[$i] = isset($imagemMoto[$i]) ? $imagemMoto[$i] : "semimg.png";

            ?>
            <div class="col-md-4 col-lg-4 col-sm-6" style="margin-bottom: 15px;">
                <div class="card">
                    <img src="img/carros/<?php echo $imagemMoto[$i]; ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $nomeCarro[$i]; ?></h3>
                        <p class="card-text"><?php echo $intro[$i]; ?></p>
                        <a href="pubMostracarro.php?pubMostracarro=<?php echo $codigoCarro[$i]; ?>&nome=<?php echo $nomeCarro[$i]; ?>" class="btn btn-primary stretched-link">saiba mais</a>
                    </div>
                </div>
            </div>
            <?php
            $i++;
            // Verificar se atingiu o limite de três carros
            if ($i >= 6) {
                break; // Sai do loop quando tiver três carros exibidos
            }
        }
    }
    ?> */
</div>

-----destaque alternatico ----fim-------->


   <div class="row carroDestaque">
    <?php
    /* mudar carros dos destaques pelo id */
    $carrosEspecificos = array(13, 14, 7, 11, 12, 8);
    
    // Use a função implode para transformar o array de IDs em uma string separada por vírgulas
    $ids = implode(',', $carrosEspecificos);

    // Modifique a consulta SQL para incluir a cláusula WHERE
    $sql = "SELECT * FROM vw_carros WHERE codigo_carro IN ($ids) ORDER BY nome_carro";

    if ($res = mysqli_query($con, $sql)) {
        $nomeCarro = array();
        $codigoCarro = array();
        $imagemMoto = array();
        $intro = array();
        $i = 0;

        while ($reg = mysqli_fetch_assoc($res)) {
            $nomeCarro[$i] = $reg['nome_carro'];
            $codigoCarro[$i] = $reg['codigo_carro'];
            $imagemMoto[$i] = $reg['caminho_imagem'];
            $intro[$i] = $reg['intro_carro'];

            $imagemMoto[$i] = isset($imagemMoto[$i]) ? $imagemMoto[$i] : "semimg.png";

            ?>
            <div class="col-md-4 col-lg-4 col-sm-6" style="margin-bottom: 15px;">
                <div class="card">
                    <img src="img/carros/<?php echo $imagemMoto[$i]; ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $nomeCarro[$i]; ?></h3>
                        <p class="card-text"><?php echo $intro[$i]; ?></p>
                        <a href="pubMostracarro.php?pubMostracarro=<?php echo $codigoCarro[$i]; ?>&nome=<?php echo $nomeCarro[$i]; ?>" class="btn btn-primary stretched-link">saiba mais</a>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
    }
    ?>
</div>
<!--- vitrine --->

    
  <!--- Marcas populares --->
  
<hr>
<div class="carousel slide container" id="marcasp" data-ride="carousel">
    <div class="carousel-inner">

        <?php
        $sql = 'SELECT * FROM vw_marcas order by nome_marca';
        if($res=mysqli_query($con, $sql)){
            $nomeMarca = array();
            $linkMarca = array();
            $idMarca = array();
            $imagemMarca = array();
            $intro = array();
            $i = 0;
            while($reg=mysqli_fetch_assoc($res)){
                $nomeMarca[$i] = $reg['nome_marca'];
                $linkMarca[$i] = $reg['link_marca'];
                $idMarca[$i] = $reg['id_marca'];
                $imagemMarca[$i] = $reg['caminho_imagem'];
                $intro[$i] = $reg['intro_marca'];

                if(!isset($imagemMarca[$i])){
                    $imagemMarca[$i] = "semimg.png";
                }
                ?>

                <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="img/marcas/<?php echo $imagemMarca[$i]; ?>" alt="" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $nomeMarca[$i]; ?></h3>
                                    <p class="card-text"><?php echo $intro[$i]; ?></p>
                                    <a href="pubMostramarca.php?pubMostramarca=<?php echo $idMarca[$i]; ?>&nome=<?php echo $nomeMarca[$i]; ?>" class="btn btn-success stretched-link">Saiba mais sobre a marca</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $i++;

                // Verificar se atingiu o limite de três marcas
                if ($i >= 5) {
                    break; // Sai do loop quando tiver três marcas no carrossel
                }
            }
        }
        ?>
    </div>

<!------- Marcas Fim ------->
    <ol class="carousel-indicators">
        <?php for ($j = 0; $j < $i; $j++) { ?>
            <li data-target="#marcasp" data-slide-to="<?php echo $j; ?>" <?php echo $j === 0 ? 'class="active"' : ''; ?>></li>
        <?php } ?>
    </ol>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#marcasp').carousel({
        interval: 100 // Altere esse valor para ajustar a velocidade em milissegundos
    });
});
</script>


<!--- Marcas populares --->





    <!---Motos em destaques ---->

    <hr>
    
    <h2 class="text-center">Motos mais buscadas</h2>
    <br>
    <div class="row">
        <?php
            $sql = 'SELECT * FROM vw_motos order by codigo_moto';
            if($res=mysqli_query($con, $sql)){
                $nome = array();
                $codigoMoto = array();
                $imagemMoto = array();
                $intro = array();
                $i = 0;
                $linhas = 0;
                while($reg=mysqli_fetch_assoc($res)){
                    $linhas = mysqli_affected_rows($con);
                    $nome[$i] = $reg['nome_moto'];
                    $codigoMoto[$i] = $reg['codigo_moto'];
                    $imagemMoto[$i] = $reg['caminho_imagem'];
                    $intro[$i] = $reg['intro_moto'];

                    $imagemMoto[$i] = isset($imagemMoto[$i]) ? $imagemMoto[$i] : "semimg.png";
        ?>
                                            
                                        

        <div class="col-lg-4 col-md-6 card md-3 motopopulares">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/motos/<?php echo $imagemMoto[$i]; ?>" class="rounded w-100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $nome[$i]; ?></h3>
                        <p class="card-text"><?php echo $intro[$i]; ?></p>
                    </div>
                </div>
                <a href="pubMostramoto.php?pubMostramoto=<?php echo $codigoMoto[$i]; ?>&nome=<?php echo $nome[$i]; ?>" class="btn btn-info w-100 stretched-link">saiba mais</a>
            </div>
        </div>

        
        <?php
                                        $i++;

                                        // Verificar se atingiu o limite de três marcas
                if ($i >= 3) {
                    break; // Sai do loop quando tiver três marcas no carrossel
                }
                                    }
                                }
                                
                        ?>
    </div>

    <!---Motos em destaques ---->
    
    </main>
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

    <!--- rodapé --->
    <?php include_once "rodape.html" ?>
    <!--- rodapé --->

</body>
</html>