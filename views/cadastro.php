<?php
    require_once __DIR__ . "/../source/autoload.php";            
    use source\model\despesamodel;
    use source\database\basedatabase;
    $modelDespesa = new despesamodel;
    $database = new basedatabase();
    $conexaoBD = $database->getConexao();
                        
    if (isset($_SESSION['ultimoId']) == "") {
        $_SESSION['ultimoId'] = "NA";
    } 

    if ($_POST) {
        $despesa = [
            'categ'  => $_POST['categ'],  'subCat'  => $_POST['subcat'], 'descr'   => $_POST['descr'],
            'valor'   => $_POST['valor'],   'funcio' => $_POST['funcio'], 'quant'   => $_POST['quant'],  'uMed'    => $_POST['uMed'],
            'datVenc' => $_POST['datVenc'], 'pago'   => $_POST['pago'],   'dataPag' => $_POST['datPag'], 'meioPag' => $_POST['meioPag'],
            'fornece' => $_POST['fornec'],  'observ' => $_POST['observ']
        ];

        $numeroXX = $despesa['valor'];
        $numero1  = trim(str_replace("R$ ", "", $numeroXX));
        $numero2  = str_replace(".", "", $numero1);
        $despesa['valor'] = $numero2; 

        if ($despesa['dataPag'] == "") {
            $despesa['dataPag'] = "2001-01-01 00:00:00";
        }

        if ($despesa['funcio'] == "Escolher Funcionário ...") {
            $despesa['funcio'] = "";
        }

        $modelDespesa->cadastrar($despesa);
        
        $listaUser = $modelDespesa->buscarTodos();
        if($listaUser){
            $ultimoReg = count($listaUser) - 1;
            $_SESSION['ultimoId'] = $listaUser["{$ultimoReg}"]['id']; 
        }

        header("Location: cadastro.php");
    }

?>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!doctype html><html lang="pt-br">
   
    <head>
        <title>Despesa - Cadastrar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="css/stylesheet.css">    
    </head>

    <body><div class="container" style="width:600px">

        <h5><nav class="navbar navbar-expand-sm navbar-dark bg-info" style="width:500px; height:55px">
            <a class="navbar-brand" href="cadastro.php"> Cadastrar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link ml-5" href="despesasaberta.php">Lista Despesas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                </li>
                <li class="nav-item" style="margin-top: 10px">
                    <?= date("d/m/Y"); ?> <br><br>
                </li>
            </ul>
        </nav></h5>

        <form action="cadastro.php" method="POST">

            <div class="form-group row container">
                <select id="cxCateg" name="categ" type="text" class="form-control" class="form-control" style="width:220px; font-weight:bold; margin-bottom:-10px;">
                    <option>Escolher Categoria ...</option>
                    <?php
                        $comandoSQL = "SELECT * FROM ".TABLE_DESPESA_CATEGORIA." ORDER BY nome_categoria ASC";
                        $executar   = $conexaoBD->query($comandoSQL);
                        $lista      = $executar->fetchall(PDO::FETCH_ASSOC);

                        foreach ($lista as $categoria) {
                            echo '<option value="' . $categoria['nome_categoria'] . '">' . $categoria['nome_categoria'] . '</option>';
                        }
                    ?>
                </select>
                <select id="cxSubCat" name="subcat" class="form-control ml-3" style="width:264px; font-weight:bold; margin-bottom:-10px;">
                    <option><b>Escolher SubCategoria ...</b></option>
                </select>
            </div>


            <input id="cxDesc"  name="descr" type="text" placeholder="Descrição:" class="form-control" style="width:500px; margin-bottom:5px;">
            

            <div class="form-group row container">
                <input id="cxValor" name="valor" type="text" placeholder="Valor R$:" class="form-control" style="width:220px; margin-bottom:-10px; font-weight:bold;" onKeyPress="return(moeda(this,'.',',',event))">
                <select id="cxFuncionario" name="funcio" class="form-control ml-3" style="width:264px; margin-bottom:-10px;">
                    <?php
                        $comandoSQL = "SELECT * FROM ".TABLE_CADASTRO_FUNCIONARIO." ORDER BY nome ASC";
                        $executar   = $conexaoBD->query($comandoSQL);
                        $lista      = $executar->fetchall(PDO::FETCH_ASSOC);

                        foreach ($lista as $nomeFuncionario) {
                            echo '<option value="' . $nomeFuncionario['nome'] . '">' . $nomeFuncionario['nome'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group row container">
                <input id="cxQuant" name="quant" type="text" placeholder="Qt:" class="form-control" style="width:107px; margin-bottom:-5px;">
                <select id="cxUMed" name="uMed" type="text" class="form-control ml-2" style="width:106px; margin-bottom:-5px;">
                    <option>Unid. Medida</option>
                    <option>un</option>
                    <option>kg</option>
                    <option>lts</option>
                    <option>pct</option>
                    <option>outros</option>
                </select>
            </div>


            <div class="form-group row container">
                <label><b>Data Vencimento:</b> &nbsp;&nbsp; </label>
                <input id="cxDataVenc" name="datVenc" type="date" class="form-control" style="width:180px; margin-bottom:5px">
            </div>


            <div style="width:500px; margin-bottom:5px;">
                <hr>
            </div>


            <div class="form-group row container">
                <label><b>**Pago?</b> &nbsp;&nbsp; </label>
                <select id="cxPago" name="pago" type="text" class="form-control" style="width:90px; font-weight:bold;">
                    <option>NAO</option>
                    <option>SIM</option>
                </select>
                <label>&nbsp;&nbsp;&nbsp<b>Data Pagamento:</b> &nbsp;&nbsp;</label>
                <input id="cxDatPag" name="datPag" type="date" class="form-control" style="width:180px; margin-bottom:5px;">   
            </div>


            <input id="cxMeioPag"  name="meioPag"  type="text"  placeholder="Meio Pagamento:" class="form-control" style="width:500px; margin-bottom:5px;">
            <input id="cxFornec"   name="fornec"   type="text"  placeholder="Fornecedor:"     class="form-control" style="width:500px; margin-bottom:5px;">
            <input id="cxObserv"   name="observ"   type="text"  placeholder="Observações:"    class="form-control" style="width:500px; margin-bottom:10px;">

            
            <div class="form-group row container">
                <input class="btn-success" type="submit" value="Salvar" onclick="return pegarDados()" /> <br>
                <div> <b><i> <?= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Código da Última Conta Cadastrada : {$_SESSION['ultimoId']}"; ?> </i></b></div>
            </div>

        </form>

        <script src="js/script.js"> </script>

        <script>
            $("#cxCateg").on("change", function() {
                $.ajax({
                    url: '../subcategoria.php',
                    type: 'POST',
                    data: { idSubCategoriaAjax: $("#cxCateg").val() },
                    success: function(data) { $("#cxSubCat").html(data); }
                });
            });
        </script>

    </div></body>

</html>

