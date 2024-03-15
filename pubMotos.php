<?php
include_once "conexao.php";

// Verifica a conexão
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Obtém o termo de busca da query string
$termoDeBusca = isset($_GET['q']) ? $_GET['q'] : '';

// Início do HTML
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.html"; include_once "conexao.php"; include_once "funcao.php"; ?>
    <title>Garagem center</title>
    <style>
        .img-thumbnail {
            width: 100%; /* Defina a largura desejada para as imagens */
            height: 200px; /* Mantém a proporção original */
        }
        .clickable-card {
        cursor: pointer;
        }
    </style>
</head>
<body class="pag-bloqueada">
    <?php include_once "menuSuperior.html" ?>
    <br>
    <h1 class="text-center">Motos Disponíveis</h1>
    <main class="container">
        <br>
        <form action="" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Digite o nome da moto...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <hr>
        <br>

        <!-- Verifica se há um termo de busca -->
        <?php if (!empty($termoDeBusca)) : ?>
            <!-- Se houver um termo de busca, exibe os resultados da pesquisa -->
            <div class="row">
                <?php
                // Executa a consulta para buscar motos com base no termo de busca
                $sql = "SELECT * FROM vw_motos WHERE nome_moto LIKE '%$termoDeBusca%'";
                $result = mysqli_query($con, $sql);

                // Converte os resultados em um array associativo
                $resultsArray = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $resultsArray[] = $row;
                }

                // Exibe os resultados
                foreach ($resultsArray as $reg) {
                    $nomeMoto = $reg['nome_moto'];
                    $codigoMoto = $reg['codigo_moto'];
                    $imagemMoto = $reg['caminho_imagem'];
                    $introMoto = $reg['intro_moto'];

                    $imagemMoto = isset($imagemMoto) ? $imagemMoto : "semimg.png";
                    ?>
                    <div class="col-md-3">
                        <a href="pubMostramoto.php?pubMostramoto=<?php echo $codigoMoto; ?>&nome=<?php echo $nomeMoto; ?>" style="text-decoration: none; color: inherit;">
                            <div class="card" onclick="window.location='pubMostramoto.php?pubMostramoto=<?php echo $codigoMoto; ?>&nome=<?php echo $nomeMoto; ?>';" style="cursor: pointer;">
                                <img src="img/motos/<?php echo $imagemMoto; ?>" class="img-responsive img-thumbnail">
                                <div class="card-body">
                                    <h4><?php echo $nomeMoto; ?></h4>
                                    <p class="card-text"><?php echo $introMoto; ?></p>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic sample">
                                        Saiba Mais...
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php else : ?>
            <!-- Se não houver termo de busca, exibe todas as motos -->
            <div class="row">
                <?php
                $sql = 'SELECT * FROM vw_motos ORDER BY CASE WHEN nome_marca IS NULL THEN 1 ELSE 0 END, COALESCE(nome_marca, \'\') ASC, marca ASC';
                $marcaAnterior = null;

                if ($res = mysqli_query($con, $sql)) {
                    while ($reg = mysqli_fetch_assoc($res)) {
                        $marcaAtual = $reg['nome_marca'];

                        // Verifica se a marca mudou
                        if ($marcaAtual != $marcaAnterior) {
                            echo '<h2 class="marca-header">' . ($marcaAtual ?: 'Sem Marca') . '</h2>';
                            $marcaAnterior = $marcaAtual;
                        }

                        $nomeMoto = $reg['nome_moto'];
                        $codigoMoto = $reg['codigo_moto'];
                        $imagemMoto = $reg['caminho_imagem'];
                        $introMoto = $reg['intro_moto'];

                        $imagemMoto = isset($imagemMoto) ? $imagemMoto : "semimg.png";
                        ?>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="img/motos/<?php echo $imagemMoto; ?>" class="img-responsive img-thumbnail">
                                <div class="card-body">
                                    <h4><?php echo $nomeMoto; ?></h4>
                                    <p class="card-text"><?php echo $introMoto; ?></p>
                                    <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                        <a href="pubMostramoto.php?pubMostramoto=<?php echo $codigoMoto; ?>&nome=<?php echo $nomeMoto; ?>" class="btn btn-primary btn-sm">Saiba Mais...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <!-- Botão "Voltar para o Topo" -->
        <div id="scroll-to-top">
            <button onclick="scrollToTop()"><i class="fa-solid fa-arrow-up"></i></button>
        </div>

        <script type="text/javascript">
            // Função para rolar a página de volta ao topo
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            // Exibir o botão "Voltar para o Topo" quando o usuário rolar para baixo
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > 200) { // Altere esse valor para definir quando o botão deve aparecer
                    document.getElementById('scroll-to-top').style.display = 'block';
                } else {
                    document.getElementById('scroll-to-top').style.display = 'none';
                }
            });
        </script>
    </main>

    <!-- rodapé -->
    <?php include_once "rodape.html" ?>
</body>
</html>
