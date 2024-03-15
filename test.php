<?php   include_once "conexao.php";

// Verifica a conexão
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Obtém o termo de busca da query string
$termoDeBusca = isset($_GET['q']) ? $_GET['q'] : '';

// Executa a consulta no banco de dados
$sql = "SELECT * FROM vw_carros WHERE nome_carro LIKE '%$termoDeBusca%'";
$result = mysqli_query($con, $sql);

// Converte os resultados em um array associativo
$resultsArray = [];
while ($row = mysqli_fetch_assoc($result)) {
    $resultsArray[] = $row;
}

// Fecha a conexão


// Início do HTML
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once "head.html"; include "conexao.php"; include_once "funcao.php"; ?>
    <title>Garagem center</title>
</head>
<body class="pag-bloqueada">
    <?php include_once "menuSuperior.html" ?>
    <br>
    <h1 class="text-center">Carros Disponíveis</h1>
    <main class="container">
    <br>
    <form action="" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Digite o nome do carro...">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <hr>
    <br>

    <!-- Restante do seu código PHP para exibir os resultados -->
    <div class="row carroDestaque">
        <?php
        // Verifica se há resultados da busca
        if (!empty($resultsArray)) {
            foreach ($resultsArray as $reg) {
                // Restante do código para exibir os resultados
                $nomeCarro = $reg['nome_carro'];
                $codigoCarro = $reg['codigo_carro'];
                $imagemCarro = $reg['caminho_imagem'];
                $introCarro = $reg['intro_carro'];
        
                $imagemCarro = isset($imagemCarro) ? $imagemCarro : "semimg.png";
                ?>
                <div class="col-md-4 col-lg-4 col-sm-6" style="margin-bottom: 15px;">
                    <div class="card">
                        <img src="img/carros/<?php echo $imagemCarro; ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $nomeCarro; ?></h3>
                            <p class="card-text"><?php echo $introCarro; ?></p>
                            <a href="pubMostracarro.php?pubMostracarro=<?php echo $codigoCarro; ?>&nome=<?php echo $nomeCarro; ?>" class="btn btn-primary stretched-link">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Mensagem para resultados vazios
            echo '<p>Nenhum resultado encontrado.</p>';
        }
        ?>
    </div>

    <!--- Botão "Voltar para o Topo" --->
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
    <!--- rodapé --->
    <?php include_once "rodape.html" ?>
    <!--- rodapé --->
</body>
</html>