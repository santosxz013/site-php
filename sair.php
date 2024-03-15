<?php
    if(!isset($_SESSION)){
        session_start();
    }

    unset($_SESSION['acesso']);
    unset($_SESSION['codigoCategoria']);

    session_destroy();
?>
<html>
    <?php if(isset($con)){ mysqli_close($con);} ?>
    <meta http-equiv="refresh" content="0;url=home.php">
</html>