<?php
    function enviarImagem($imagem,$caminho,$imagemTemp){
        $extensao = pathinfo($imagem, PATHINFO_EXTENSION);
        $extensao = strtolower($extensao);

        if(strstr('.jpeg;.jpg;.png', $extensao)){
            $imagem = $caminho.mt_rand().".".$extensao;
            $diretorio = "img/".$caminho."/";
            move_uploaded_file($imagemTemp, $diretorio.$imagem);
        }else{?>
            <div class="alert alert-danger" role="alert">
                <h2>Apenas imagens do tipo *.jpg, *.jpeg e *.png São permitidas</h2>
            </div><br><br>
        <?php }
        return $imagem;
    }

    function excluirTodasImagens($codigo,$alvo){
        include "conexao.php";

        $linhas = 0;
        $where = $alvo."_id";

        $sql = "SELECT * FROM imagens WHERE ".$where." = ".$codigo;
        if($res = mysqli_query($con,$sql)){
            $linhas = mysqli_affected_rows($con);
            if($linhas > 0){
                while ($reg = mysqli_fetch_assoc($res)){
                    $delete = unlink("img/".$alvo."/".$reg['caminho']);
                    if(!$delete){
                        ?>
                        <div class="alert danger" role="alert">
                            <h3>ALGO DEU ERRADO</h3>
                            <p>Algo deu errado ao excluir a imagem: <?php echo $reg['caminho']; ?></p>
                            <br><br>
                        </div>

                        
                        <?php
                    }
                }
            }
        }else{
            ?>
            <div class="alert danger" role="alert">
                <h3>ERRO</h3>
                <p>Algo deu errado ao executar a query de imagem</p>
                <br><br>
            </div>
            <?php
        }
    }



    function executarQuery($sql, $paginaderetorno){
        include "conexao.php";
        if($res=mysqli_query($con,$sql)){
            $reg=mysqli_fetch_assoc($res);
            $saida = $reg['saida'];
            $rotulo = $reg['saida_rotulo'];

            switch($rotulo){
                case 'TUDO CERTO!';
                $alert = 'alert-success';
                break;
                case 'OPS!';
                $alert = 'alert-warning';
                break;
                case 'ERRO!';
                $alert = 'alert-danger';
                break;
            }
            ?>

            <div class="alert <?php echo $alert;?>" role="alert">
                <h3><?php echo $rotulo; ?></h3>
                    <?php echo $saida; ?>
                   
            </div>
            <a href="<?php echo $paginaderetorno; ?>" class='btn btn-secondary' target='_self'>Voltar</a> 
            <?php
            
            
        }else{
            echo "Erro";
        }
        if(isset($con)){ mysqli_close($con);}
    }

    function QuerySimples($sql){
        include "conexao.php";
        if($res=mysqli_query($con,$sql)){
            $reg=mysqli_fetch_assoc($res);
            $saida = $reg['saida'];


            switch($saida){
                case 'TUDO CERTO!';
                $alert = 'alert-success';
                break;
                case 'ERRO! Algo deu errado ao vincular a marca ao carro.';
                $alert = 'alert-danger';
                break;
            }
            ?>

            <div class="alert <?php echo $alert;?>" role="alert">
                    <?php echo $saida; ?>    
            </div>     
            <?php
        }else{
            echo "Erro";
        }
        if(isset($con)){ mysqli_close($con);}
    }
?>