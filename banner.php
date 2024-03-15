<?php include_once "conexao.php"; ?>
<div class="carousel slide" id="meuBanner" data-ride="carousel">
    <div class="carousel-inner">

    <?php
    $sql = 'SELECT * FROM vw_banner ORDER BY codigo_imagem DESC';
    if ($res = mysqli_query($con, $sql)) {
        $i = 0;

        while ($reg = mysqli_fetch_assoc($res)) {
            $activeClass = $i === 0 ? 'active' : ''; // Define a classe 'active' para o primeiro item do carousel.
            $imagemBanner = $reg['caminho_imagemB'];

            // Gere os elementos do carousel com base nos resultados do banco de dados.
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<a href="' . $reg['link_imagemB'] . '">';
            echo '<img src="img/banner/'.$imagemBanner . '" class="d-block w-100" alt="' . $reg['descrica_imagem'] . '">';
            echo '</a>';
            echo '</div>';

            $i++;
            
            // Verificar se atingiu o limite de três banners
            if ($i >= 3) {
                break; // Sai do loop quando tiver três banners exibidos
            }
        }
    }
    ?>

    </div>
    <ol class="carousel-indicators">
        <?php
        for ($j = 0; $j < $i; $j++) {
            $activeClass = $j === 0 ? 'class="active"' : ''; // Define a classe 'active' para o primeiro indicador.
            echo '<li data-target="#meuBanner" data-slide-to="' . $j . '" ' . $activeClass . '></li>';
        }
        ?>
    </ol>

    <a href="#meuBanner" data-slide="prev" class="carousel-control-prev">
        <span class="material-symbols-outlined">arrow_back_ios</span>
    </a>
    <a href="#meuBanner" data-slide="next" class="carousel-control-next">
        <span class="material-symbols-outlined">arrow_forward_ios</span>
    </a>
</div>