
<!DOCTYPE html>
<html lang="pt-br">
<?php 
        if(!isset($_SESSION)){
            session_start();
        }
        if($_SESSION['acesso'] == true){
            
        
    ?>
<head>
    <?php include_once "head.html"; include_once "conexao.php"; ?>
    <!--- links --->

    <title>Garagem center</title>
</head>
<body class="adm">

    <!--- menu superior --->
    <?php include_once "menuSuperior.html"; ?>
    <!--- menu superior --->


    <!--- Principal --->

    <main class="container">
        <h1 class="text-center">Administração</h1>
        <br>
        <div class="row text-center">

        <a href="motosAdm.php" class="opcoes2">
            <div class="col-md-3 opcoes">
                    <br>
                    <i class="fa-solid fa-motorcycle"></i>
                    <p>Cadastrar Nova Moto</p>
                    </a>
            </div>
        
            <div class="col-md-3 opcoes">
                <a href="motosCadastradas.php">
                <br>
                <i class="fa-solid fa-caret-down"></i>
                    <p>Motos Cadastradas</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="carrosAdm.php">
                <br>
                <i class="fa-solid fa-car"></i>
                    <p>Carros</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="carrosCadastrados.php">
                <br>
                <i class="fa-solid fa-caret-down"></i>
                    <p>Carros Cadastrados</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="marcasAdm.php">
                <br>
                <i class="fa-solid fa-plus"></i>
                    <p>Marcas</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="categoriaAdm.php">
                <br>
                <i class="fa-solid fa-bars-staggered"></i>
                    <p>Categoria</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="bannerAdm.php">
                <br>
                <i class="fa-solid fa-image"></i>
                    <p>Banner Principal</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="usuariosAdm.php">
                <br>
                <i class="fa-solid fa-user"></i>
                    <p>Usuarios</p>
                </a>
            </div>

            <div class="col-md-3 opcoes">
                <a href="sair.php">
                <br>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>Sair</p>
                </a>
            </div>

        </div>
    </main>

    <!--- Principal --->

</body>
<?php
        }else{
            ?>
            <meta http-equiv="refresh" content="0;url=login.php">

            <?php
        }
?>
</html>