<?php
    require_once __DIR__ . "/../source/autoload.php";
    use source\model\despesamodel;
    $modelDespesas = new despesamodel;

    if ($_GET) {
        $modelDespesas->deletar($_GET['id']);
        header('Location: despesasaberta.php');
    }
?>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!doctype html><html lang="pt-br">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .linhaAcende:hover{
                background-color: cornflowerblue;
                cursor: pointer;
            }
        </style>

    </head>
    <body><div class="container">   

    <div class="container fixed-top" style="background: white">

        <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
            <a class="navbar-brand" href="cadastro.php"> Cadastro </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="despesasaberta.php">Em Aberto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="despesasperson.php">Personalizado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="despesascateg.php">Categoria</a>
                </li>
            </ul>
        </nav>

        <div class="row">
            <div class="col-6" style="margin-top: 5px">
                <h5><u><i><b><p>Despesas em Aberto</p></b></i></u></h5>
                <div class="row container" style="margin-top: -5px;">
                    <?= "<b>Total:</b>" ?> &nbsp; <?= valorTotal() ?>
                    <a href="despesasaberta.php" class="ml-2">
                        <input class="btn-success" type="button" value="Atualizar Total!"></input>
                    </a>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 15px;">
             <div class="col-1">
                <b> Código </b>
            </div>
            <div class="col-2">
                <b> Categoria </b>
            </div>
            <div class="col-2">
                <b> SubCategoria </b>
            </div>
            <div class="col-3">
                <b> Descrição </b>
            </div>
            <div class="col-2">
                <b> Valor </b>
            </div>
            <div class="col-2">
                <b> Vencimento </b>
            </div>
        </div>

        <div class="row" style="margin-top: -10px;">
            <div class="col-12">
                <hr>
            </div>
        </div>
    </div>


    <?php
        $listaDespesa = $modelDespesas->buscarEmAberto();
        $_SESSION['total'] = 0;
    ?>

  
    <div style="margin-top: 190px">

        <?php if ($listaDespesa) {                                                      ?>
            <?php foreach ($listaDespesa as $despesa) {                                 ?>
                <div class="linhaAcende row">
                        
                        <div class="col-1">
                            <a href="editar.php?id=<?= "{$despesa['id']}" ?>">
                                <?= "{$despesa['id']}" ?>
                            </a>
                        </div>

                        <div class="col-2">
                            <a href="editar.php?id=<?= "{$despesa['id']}" ?>">
                                <?= "{$despesa['categoria']}" ?>
                            </a>
                        </div>

                        <div class="col-2">
                            <a href="editar.php?id=<?= "{$despesa['id']}" ?>">
                                <?= "{$despesa['subcateg']}" ?>
                            </a>
                        </div>
                        
                        <div class="col-3">
                            <a href="editar.php?id=<?= "{$despesa['id']}" ?>">
                                <?= "{$despesa['descricao']}" ?>
                            </a>
                        </div>

                        <div class="col-2">
                            <?php $valor = number_format($despesa['valor'], 2, ',', '.');   ?>
                            <?= "R$ {$valor}" ?>
                        </div>
                        
                        <div class="col-2">
                            <?php $data = date('d/m/Y', strtotime($despesa['dat_venc']));   ?>
                            <?= "{$data}" ?>
                        </div>
                
                </div>
                <?php $_SESSION['total'] = $_SESSION['total'] + $despesa['valor'];      ?>
            <?php       }                                                               ?>

        <?php } else {
            echo "<p> Despesas Não Encontradas </p>";
        }                       ?>

    </div>


    <?php
        function valorTotal(){
            if(isset($_SESSION['total'])){
                $totalTratada = number_format($_SESSION['total'], 2, ',', '.');
                $_SESSION['totalTrado'] = $totalTratada;
                return "R$ {$_SESSION['totalTrado']}";
            }
        }
    ?>

</div></body>
</html>



