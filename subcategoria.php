<?php
    require_once __DIR__ . "/source/autoload.php";
    use source\database\basedatabase;
    $conexao = new basedatabase;
    $conexaoBD = $conexao->getConexao();

    $comandoSQL = "SELECT * FROM despesa_subcategoria WHERE nome_categoria='" . $_POST['idSubCategoriaAjax'] . "'";
    $executar = $conexaoBD->query($comandoSQL);
    $lista = $executar->fetchall(PDO::FETCH_ASSOC);

    foreach ($lista as $subcategorias) {
        echo '<option>' . $subcategorias['nome_subcategoria'] . '</option>';
    }






    