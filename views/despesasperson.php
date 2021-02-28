<?php
    require_once __DIR__ . "/../source/autoload.php";             
    use source\model\despesamodel;                                    
    use source\model\despcategmodel;
    use source\model\funcionariomodel;

    $modelDespesas  = new despesamodel;                               
    $modelDespCateg = new despcategmodel;
    $modelFunciona  = new funcionariomodel;
    
    $categoriaDesp  = $modelDespCateg->despesasCategoria();
    $nomeFunc       = $modelFunciona->nomeFuncionarios();
    
    $listaDespesa = "";                                                

    if($_GET){
        
        if($_GET['funcaoPHP'] == "buscaID"){
            if($_GET['cxCod'] != ""){
                $dadosBD  = $modelDespesas->buscarId($_GET['cxCod']);
                $listaDespesa = $dadosBD;
            }
        }

        if($_GET['funcaoPHP'] == "buscaFunc"){
            if($_GET['cxFunc'] != "-- Escolher Funcionario --"){
                if($_GET['cxFuncBusca'] == "Periodo"){
                    $dadosBD  = $modelDespesas->buscaFuncionario($_GET['cxFunc'], $_GET['cxFuncDatI'], $_GET['cxFuncDatF']);
                    $listaDespesa = $dadosBD;
                }else{
                    $dadosBD  = $modelDespesas->buscaFuncionario2($_GET['cxFunc']);
                    $listaDespesa = $dadosBD;
                }
            }
        }

        if($_GET['funcaoPHP'] == "buscaPerso"){
            if($_GET['cxDespBusca'] != "Tipo de Busca ..."){
                
                if(isset($_GET['cxCategTd']) != "on"){

                    if($_GET['cxDespBusca'] == "Por Data Vencimento") {
                    
                        if($_GET['cxPago'] == "TODOS") {
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso01($categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }else{
                            $pago = $_GET['cxPago'];                
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso02($pago, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }

                    }else{

                        if($_GET['cxPago'] == "TODOS") {
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso03($categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }else{
                            $pago = $_GET['cxPago'];                
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso04($pago, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }

                    }
    
                }else{

                     if($_GET['cxDespBusca'] == "Por Data Vencimento") {
                    
                        if($_GET['cxPago'] == "TODOS") {
                            $subcat = $_GET['cxSubCat'];
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso05($subcat, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }else{
                            $subcat = $_GET['cxSubCat'];
                            $pago = $_GET['cxPago'];                
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso06($subcat, $pago, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }

                    }else{

                        if($_GET['cxPago'] == "TODOS") {
                            $subcat = $_GET['cxSubCat'];
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso07($subcat, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }else{
                            $subcat = $_GET['cxSubCat'];
                            $pago = $_GET['cxPago'];                
                            $categ = $_GET['cxCateg'];
                            $dataIn = $_GET['cxDespDatI']; 
                            $dataFi = $_GET['cxDespDatF']; 
                            $dadosBD  = $modelDespesas->buscaPerso08($subcat, $pago, $categ, $dataIn, $dataFi);
                            $listaDespesa = $dadosBD;
                        }

                    }


                }
                    
            }
        }
    }

?>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!doctype html><html lang="pt-br"><head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  <script src="https://code.jquery.com/jquery-3.4.1.js"></script></head><body><div class="container">

     <div class="container fixed-top" style="background: white">

        <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
            <a class="navbar-brand" href="cadastro.php"> Cadastro </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="despesasaberta.php">Em Aberto</a> </li>
                <li class="nav-item"><a class="nav-link" href="despesasperson.php">Personalizado</a></li>
                <li class="nav-item"><a class="nav-link" href="despesascateg.php">Categoria</a> </li>
            </ul>
        </nav>

        <form action="despesasperson.php" method="GET">
            <input  type="text"     name="funcaoPHP"    value="buscaID"     hidden>
            <input  type="text"     name="cxCod"        id="cxCod"          placeholder="Cód:" style="width:80px;  margin-top: 10px;">
            <input  type="submit"   value="Buscar"      class="btn-success" style="margin-left:20px"></input>
            <br>
        </form>


        <form action="despesasperson.php" method="GET">
            <input  type="text"     name="funcaoPHP"    value="buscaFunc"   hidden> 
            <select type="text"     name="cxFunc"       id="cxFunc"         style="width:200px; margin-top:10px;">
                <?php
                    foreach ($nomeFunc as $funcionario) {
                    echo '<option value="' . $funcionario['nome'] . '">' . $funcionario['nome'] . '</option>';
                }
                ?>
            </select>

            <select type="text"   id="cxFuncBusca"  name="cxFuncBusca"  style="width:80px; margin-top: 10px; margin-left:20px;">
                <option>Periodo</option>
                <option>Tudo</option>
            </select>

            <input  type="date"   id="cxFuncDatI"   name="cxFuncDatI"   style="width:160px; margin-top:10px; margin-left:20px">
            <input  type="date"   id="cxFuncDatF"   name="cxFuncDatF"   style="width:160px; margin-top:10px; margin-left:20px">
            <input class="btn-success" type="submit" value="Buscar"     style="margin-left:24px"></input>
        </form>
       

        <form action="despesasperson.php" method="GET">
            <input  type="text"   name="funcaoPHP"  value="buscaPerso"  hidden> 
            <select type="text"   id="cxDespBusca"  name="cxDespBusca"  style="width:150px; margin-top: 10px;">
                <option>Tipo de Busca ...</option>
                <option>Por Data Vencimento</option>
                <option>Por Data Pagamento</option>
            </select>

            <select type="text"   id="cxPago"   name="cxPago"   style="width:90px; margin-top: 10px; margin-left:10px;">
                <option>Pago?</option>
                <option>NAO</option>
                <option>SIM</option>
                <option>TODOS</option></b>
            </select>

            <select type="text"   id="cxCateg"  name="cxCateg"  style="width:180px; margin-top:10px; margin-left:10px">
                <option>Escolher Categoria ...</option>
                <?php
                    foreach ($categoriaDesp as $categoria) {
                        echo '<option value="' . $categoria['nome_categoria'] . '">' . $categoria['nome_categoria'] . '</option>';
                    }
                ?>
            </select>

            <select type="text"   id="cxSubCat" name="cxSubCat"     style="width:180px; margin-top:10px; margin-left:10px">
                <option><b>Escolher SubCategoria ...</b></option>
            </select>

            <input  type="date"     id="cxDespDatI" name="cxDespDatI" style="width:160px; margin-top:10px; margin-left:10px">
            <input  type="date"     id="cxDespDatF" name="cxDespDatF" style="width:160px; margin-top:10px; margin-left:10px">
            <input  type="checkbox" id="cxCategTd"  name="cxCategTd"  style="width:20px; margin-top:10px; margin-left:10px" checked> 
            <input class="btn-success" type="submit" value="Buscar"   style="margin-left:10px"></input>
        </form>
        <br>

        
        <div class="row" style="margin-top: -30px;">
            <div class="col-12">
                <hr>
            </div>
        </div>

        <div class="row" style="margin-top: -10px;">
            <div class="col-1"><b> Código </b></div>
            <div class="col-2"><b> Categoria </b></div>
            <div class="col-2"><b> SubCategoria </b></div>
            <div class="col-3"><b> Descrição </b></div>
            <div class="col-2"><b> Valor </b></div>
            <div class="col-2"><b> Vencimento </b></div>
        </div>
   
    </div>


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <?php
        $_SESSION['total'] = 0;
    ?>

    <div style="margin-top: 220px">

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

    <div style="top:70px; position:absolute; margin-left:920px">
        <label> <b>Total:</b> </label>
        <span style="margin-left: 10px"> <?= valorTotal() ?> </span>
    </div>

    <?php
        function valorTotal(){
            if (isset($_SESSION['total'])) {
                $totalTratada = number_format($_SESSION['total'], 2, ',', '.');
                $_SESSION['totalTrado'] = $totalTratada;
                return "R$ {$_SESSION['totalTrado']}";
            }
        }
    ?>


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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

</div></body></html>



