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
    </style>
</head>
<body class="pag-bloqueada">
    <?php include_once "menuSuperior.html" ?>
    <br>
    <h1 class="text-center">Marcas Disponíveis</h1>
    <main class="container">
        <br>
        <form action="" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Digite o nome da marca...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <hr>
        <br>

        <!-- Verifica se há um termo de busca -->
        <?php if (isset($_GET['q'])) : ?>
            <!-- Se houver um termo de busca, exibe os resultados da pesquisa -->
            <div class="row">
                <?php
                $termoDeBusca = $_GET['q'];
                $sql = "SELECT * FROM vw_marcas WHERE nome_marca LIKE '%$termoDeBusca%' ORDER BY nome_marca";
                if ($res = mysqli_query($con, $sql)) {
                    while ($reg = mysqli_fetch_assoc($res)) {
                        $nomeMarca = $reg['nome_marca'];
                        $linkMarca = $reg['link_marca'];
                        $idMarca = $reg['id_marca'];
                        $imagemMarca = $reg['caminho_imagem'];
                        $intro = $reg['intro_marca'];

                        if (!isset($imagemMarca)) {
                            $imagemMarca = "semimg.png";
                        }
                        ?>
                        <div class="col-md-2 col-lg-2 col-sm-8" id="tamcard" style="margin-bottom: 15px;">
                            <div class="card">
                                <div class="tesaa">
                                    <img src="img/marcas/<?php echo $imagemMarca; ?>" class="img-responsive img-thumbnail">
                                </div>
                                <div class="card-body">
                                    <h4><?php echo $nomeMarca; ?></h4>
                                    <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                        <a href="pubMostramarca.php?pubMostramarca=<?php echo $idMarca; ?>&nome=<?php echo $nomeMarca; ?>" class="btn btn-primary btn-sm">Saiba Mais...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>Nenhum resultado encontrado.</p>';
                }
                ?>
            </div>
        <?php else : ?>
            <!-- Se não houver termo de busca, exibe todas as marcas -->
            <div class="row">
                <?php
                $sql = 'SELECT * FROM vw_marcas ORDER BY nome_marca';
                if ($res = mysqli_query($con, $sql)) {
                    while ($reg = mysqli_fetch_assoc($res)) {
                        $nomeMarca = $reg['nome_marca'];
                        $linkMarca = $reg['link_marca'];
                        $idMarca = $reg['id_marca'];
                        $imagemMarca = $reg['caminho_imagem'];
                        $intro = $reg['intro_marca'];

                        if (!isset($imagemMarca)) {
                            $imagemMarca = "semimg.png";
                        }
                        ?>
                        <div class="col-md-2 col-lg-2 col-sm-8" id="tamcard" style="margin-bottom: 15px;">
                            <div class="card">
                                <div class="tesaa">
                                    <img src="img/marcas/<?php echo $imagemMarca; ?>" class="img-responsive img-thumbnail">
                                </div>
                                <div class="card-body">
                                    <h4><?php echo $nomeMarca; ?></h4>
                                    <div class="btn-group btn-group-sm" role="group" arial-label="Basic sample">
                                        <a href="pubMostramarca.php?pubMostramarca=<?php echo $idMarca; ?>&nome=<?php echo $nomeMarca; ?>" class="btn btn-primary btn-sm">Saiba Mais...</a>
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
