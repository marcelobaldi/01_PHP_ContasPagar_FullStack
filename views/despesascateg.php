<?php
    require_once __DIR__ . "/../source/autoload.php";
    use source\model\despesamodel;
    $modelDespesas = new despesamodel;

    $_SESSION['total'] = 0;
    $_SESSION['totalTrado'] = 0;
    $_SESSION['datIni'] = "";
    $_SESSION['datTerm'] = "";

    if($_POST){
        $_SESSION['datIni']   = $_POST['dataInicio'];
        $_SESSION['datTerm']  = $_POST['dataTermino'];
        
        $dados = $modelDespesas->despCateg($_SESSION['datIni'], $_SESSION['datTerm']);
        $dadosBD = $dados->fetchall(PDO::FETCH_ASSOC);
    }

   
    if (!empty($dadosBD)) {
        $dadosIndexados = [];
        foreach ($dadosBD as $k => $v) {
            $dadosIndexados['categoria'][$k] = $v['categoria'];
        }
        array_multisort($dadosIndexados['categoria'], SORT_ASC, $dadosBD);
    }


    $dadosCateg = [];      
    $i = 0;
    $ii = 1;               

    if (!empty($dadosBD)) {

        if (count($dadosBD) == 1) {
            array_push($dadosCateg, $dadosBD[0]);
        }

        if (count($dadosBD) == 2) {
            if ($dadosBD[0]['categoria'] == $dadosBD[1]['categoria']) {
                $valor = $dadosBD[0]['valor'] + $dadosBD[1]['valor'];
                array_push($dadosCateg, ['categoria' => "{$dadosBD[0]['categoria']}", 'valor' => $valor]);
            } else {
                array_push($dadosCateg, $dadosBD[0]);
                array_push($dadosCateg, $dadosBD[1]);
            }
        }

        if (count($dadosBD) >= 3) {

            for ($i = 0; $i <= (count($dadosBD) - 2); $i++) {

                if ($dadosBD[$i]['categoria'] != $dadosBD[$ii]['categoria']) {
                    array_push($dadosCateg, $dadosBD[$i]);
                }

                if ($dadosBD[$i]['categoria'] == $dadosBD[$GLOBALS["ii"]]['categoria']) {

                    $valor = 0;
                    $uReg = count($dadosBD) - 1;
                    while ($dadosBD[$i]['categoria'] == $dadosBD[$ii]['categoria']) {

                        $valor = $valor + $dadosBD[$i]['valor'];

                        $i++;
                        $ii++;

                        if ($GLOBALS["i"] == $GLOBALS["uReg"]) {
                            break;
                        }
                    }
                    $valor = $valor + $dadosBD[$i]['valor'];
                    array_push($dadosCateg, ['categoria' => "{$dadosBD[$i]['categoria']}", 'valor' => $valor]);
                }

                $GLOBALS["ii"] = $GLOBALS["ii"] + 1;
            }

            if (count($dadosBD) > 2) {
                $penU = (count($dadosBD) - 2);
                $ult  = (count($dadosBD) - 1);

                if ($dadosBD[$penU]['categoria'] != $dadosBD[$ult]['categoria']) {
                    array_push($dadosCateg, $dadosBD[$ult]);
                }
            }
        }
     

        $valorTot = 0;
        foreach ($dadosBD as $valor) {
            $valorTot = $valorTot + $valor['valor'];
        }

        if (!empty($dadosBD)) {
            $_SESSION['totalTrado'] = "R$ " . number_format($valorTot, 2, ',', '.');
        }
    } else {
        //echo "Não Foram Encontrados Dados";
    }

    function valorTotal(){
        $totalTratada = number_format($_SESSION['total'], 2, ',', '.');
        $_SESSION['totalTrado'] = $totalTratada;
        return "R$ {$_SESSION['totalTrado']}";
    }

?>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!doctype html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

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

         
            <form action="despesascateg.php" method="POST">
            <div class="row container">
          
                <div class="row container">
                    <h5><u><i><b> <p>Despesas Por Categoria</p> </b></i></u></h5>
                </div>

                <div class="row container" style="margin-top: -10px;">
                    <?= "<b>Total:</b>" ?> &nbsp; <?= $_SESSION['totalTrado'] ?> 

                        <input id="cxDatPag" name="dataInicio"  type="date" class="form-control ml-5" style="width:180px;"
                        value=<?= "{$_SESSION['datIni']}" ?> >
                        
                         <input id="cxDatPag" name="dataTermino" type="date" class="form-control ml-4" style="width:180px; margin-left:10px;"
                        value=<?= "{$_SESSION['datTerm']}" ?> >
                        <input class="btn-success" type="submit" value="Buscar" style="margin-left:20px"></input>
                    </form>

                </div>
               
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-4">
                    <b> Despesa </b>
                </div>
                <div class="col-2">
                    <b> Valor </b>
                </div>
            </div>

            <div class="row" style="margin-top: -10px;">
                <div class="col-10">
                    <hr>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 190px">

        <?php if ($dadosCateg) {                                                      ?>
            <?php foreach ($dadosCateg as $despesa) {                                 ?>
                
                <div class="linhaAcende row">
                    <div class="col-4">
                        <?= "{$despesa['categoria']}" ?>
                    </div>

                    <div class="col-2">
                        <?php $valor = number_format($despesa['valor'], 2, ',', '.');   ?>
                        <?= "R$ {$valor}" ?>
                    </div>
                </div>

                <?php $_SESSION['total'] = $_SESSION['total'] + $despesa['valor'];      ?>
            <?php       }                                                               ?>

        <?php } else {
            echo "<p> Despesas Não Encontradas </p>";
        }                       ?>

    </div>

</body>

</html>