<?php
    if($_POST){
        if($_POST['senhaF'] == "0000") {
            header('Location: views/cadastro.php');
        }else{
            echo "&nbsp;&nbsp;&nbsp;&nbsp; Corona Vírus Sendo Instalado ....................";
        }
    }
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!doctype html><html lang="pt-br"><head><title>Title</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head><body>
    <div class="container" style="width: 200px">

        <form action="index.php" method="POST" style="width:150px; margin-top:50px">
            <input type="text" name="senhaF" placeholder="Senha:" class="form-control">
            <input type="submit" value="Entrar" class="btn btn-primary" style="margin-top:5px">
        </form>

    </div>
</body></html>






