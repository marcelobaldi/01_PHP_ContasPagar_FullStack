<?php 
    namespace source\model;                                
    require_once __DIR__ . "/../autoload.php";              
    use source\database\basedatabase;                               
    use PDO;                                           
    session_start();                                        


    class despesamodel extends basedatabase {
    
        public function cadastrar(array $desp){
            $cat     = $desp['categ'];    $subCat  = $desp['subCat'];    $desc   = $desp['descr'];
            $funcio = $desp['funcio'];     $uMed    = $desp['uMed'];     $datVenc = $desp['datVenc'];   $pago    = $desp['pago'];
            $datPag  = $desp['dataPag'];   $meioPag = $desp['meioPag'];  $fornec  = $desp['fornece'];   $observ  = $desp['observ'];
                    
            $valorTrat  = (float) str_replace(",", ".", $desp['valor']);
            $quantTrat  = (float) str_replace(",", ".", $desp['quant']);

            $comandoSQL = "INSERT INTO `".TABLE_DESPESAS."` (`categoria`, `subcateg`, `descricao`, `valor`, `funcionario`, `quant`, `u_med`, 
                `dat_venc`, `pago`, `dat_pag`, `meio_pag`, `forneced`, `observ`) VALUES('$cat', '$subCat', '$desc', '$valorTrat', 
                '$funcio', '$quantTrat', '$uMed', '$datVenc', '$pago', '$datPag', '$meioPag', '$fornec', '$observ')";

            $this->getConexao()->query($comandoSQL);
            $_SESSION['ultimoId'] = $this->getConexao()->lastInsertId();
            return $_SESSION['ultimoId'];
        }


        public function buscarTodos(){
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESAS."";
            $executar   = $this->getConexao()->query($comandoSQL);
            $resultado  = $executar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }


        public function buscarId(int $id){
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESAS." WHERE id='{$id}'";
            $executar   = $this->getConexao()->query($comandoSQL);
            $resultado  = $executar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }


        public function buscarEmAberto(){  
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESAS." WHERE pago='NAO' ORDER BY dat_venc ASC";
            $executar   = $this->getConexao()->query($comandoSQL);
            $resultado  = $executar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }


        public function atualizar(array $desp, int $idRegistro){      
            $id      = $idRegistro;     
            
            $cat     = $desp['categ'];    $subCat  = $desp['subCat']; $desc   = $desp['descr'];   $uMed    = $desp['uMed'];
            $datVenc = $desp['datVenc'];  $pago    = $desp['pago'];   $datPag = $desp['dataPag']; $meioPag = $desp['meioPag'];
            $fornec  = $desp['fornece'];  $observ  = $desp['observ'];
            
            $valorTrat  = (float) str_replace(",", ".", $desp['valor']);
            $quantTrat  = (float) str_replace(",", ".", $desp['quant']);

            $comandoSQL = "UPDATE `".TABLE_DESPESAS."` SET `categoria`='$cat', `subcateg`='$subCat', `descricao`='$desc', 
                `valor`='$valorTrat', `quant`='$quantTrat', `u_med`='$uMed', `dat_venc`='$datVenc', `pago`='$pago', 
                `dat_pag`='$datPag', `meio_pag`='$meioPag', `forneced`='$fornec', `observ`='$observ' WHERE id='$id'";
            
            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        public function deletar(int $id){
            $comandoSQL = "DELETE FROM `".TABLE_DESPESAS."` WHERE id='$id'";
            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //Método - Em Aberto
        public function despCateg(string $datInicio, string $datTermino){

            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}'
            AND `pago`='SIM' ORDER BY dat_pag ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //Método - Funcionário (Por Período)
        public function buscaFuncionario(string $nomefunc, string $datInicio, string $datTermino){
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESAS." WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
            AND `funcionario`= '{$nomefunc}' ORDER BY dat_pag ASC";
            
            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }

        //Método - Funcionário (Tudo)
        public function buscaFuncionario2(string $nomefunc){
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESAS." WHERE `funcionario`= '{$nomefunc}' ORDER BY dat_pag ASC";
            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //Método - Data Vencimento, Pagto Todos (Sim e Nâo), Categoria Todas, DAta Inicial e Final
        public function buscaPerso01(string $categoria, string $datInicio, string $datTermino){

            if($categoria == "Escolher Categoria ..."){
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                ORDER BY dat_venc ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }else{
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `categoria`='{$categoria}' ORDER BY dat_venc ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }    
        }


        //Método - Data Vencimento, Pagto (Sim ou Nâo), Categoria Todas, DAta Inicial e Final
        public function buscaPerso02(string $pago, string $categoria, string $datInicio, string $datTermino){

            if($categoria == "Escolher Categoria ..."){
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `pago`='{$pago}' ORDER BY dat_venc ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }else{
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `pago`='{$pago}' AND `categoria`='{$categoria}' ORDER BY dat_venc ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }    
        }


        //Método - Data Vencimento, Pagto Todos (Sim e Nâo), Categoria Todas, DAta Inicial e Final
        public function buscaPerso03(string $categoria, string $datInicio, string $datTermino){

            if($categoria == "Escolher Categoria ..."){
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                ORDER BY dat_pag ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }else{
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `categoria`='{$categoria}' ORDER BY dat_pag ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }    
        }


        //Método - Data Vencimento, Pagto (Sim ou Nâo), Categoria Todas, DAta Inicial e Final
        public function buscaPerso04(string $pago, string $categoria, string $datInicio, string $datTermino){

            if($categoria == "Escolher Categoria ..."){
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `pago`='{$pago}' ORDER BY dat_venc ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }else{
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `pago`='{$pago}' AND `categoria`='{$categoria}' ORDER BY dat_pag ASC";

                $executar = $this->getConexao()->query($comandoSQL);
                return $executar;
            }    
        }



    /////////////////////////////////////////////// subcategoria !!!


    //Método - Data Vencimento, Pagto Todos (Sim e Nâo), Categoria Todas, DAta Inicial e Final
    public function buscaPerso05(string $subcat, string $categoria, string $datInicio, string $datTermino){

        if ($categoria == "Escolher Categoria ...") {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                ORDER BY dat_venc ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        } else {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `categoria`='{$categoria}' AND `subcateg`='{$subcat}' ORDER BY dat_venc ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }
    }


    //Método - Data Vencimento, Pagto (Sim ou Nâo), Categoria Todas, DAta Inicial e Final
    public function buscaPerso06(string $subcat, string $pago, string $categoria, string $datInicio, string $datTermino){

        if ($categoria == "Escolher Categoria ...") {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `pago`='{$pago}' ORDER BY dat_venc ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        } else {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `pago`='{$pago}' AND `categoria`='{$categoria}' AND `subcateg`='{$subcat}' ORDER BY dat_venc ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }
    }


    //Método - Data Vencimento, Pagto Todos (Sim e Nâo), Categoria Todas, DAta Inicial e Final
    public function buscaPerso07(string $subcat, string $categoria, string $datInicio, string $datTermino){

        if ($categoria == "Escolher Categoria ...") {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                ORDER BY dat_pag ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        } else {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `categoria`='{$categoria}' AND `subcateg`='{$subcat}' ORDER BY dat_pag ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }
    }


    //Método - Data Vencimento, Pagto (Sim ou Nâo), Categoria Todas, DAta Inicial e Final
    public function buscaPerso08(string $subcat, string $pago, string $categoria, string $datInicio, string $datTermino){

        if ($categoria == "Escolher Categoria ...") {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `pago`='{$pago}' ORDER BY dat_venc ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        } else {
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `pago`='{$pago}' AND `categoria`='{$categoria}' AND `subcateg`='{$subcat}' ORDER BY dat_pag ASC";

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }
    }


//////////////////////////////////////////////////


        //Método - Busca Personalizada
        public function buscaPerson(string $inicio, string $termino){      
            $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$inicio}'AND DATE(`dat_venc`) <='{$termino}'
            ORDER BY dat_venc ASC";
            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        //Método - Busca Personalizada
        public function buscaPersonlizada(string $categoria, string $pagto, string $datInicio, string $datTermino){

            if($categoria == "Escolher Categoria ..."){

                if($pagto == "TODOS"){
                    $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                    ORDER BY dat_venc ASC";
                }else{
                    $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                    AND `pago`='{$pagto}' ORDER BY dat_venc ASC";
                }

            }else {

                if ($pagto == "TODOS") {
                    $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                    ORDER BY dat_venc ASC";
                } else {
                    $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                    AND `categoria`='{$categoria}' AND `pago`='{$pagto}' ORDER BY dat_venc ASC";
                }

            }

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        //Método - Busca Personalizada Por Data de Pagamento
        public function buscaPersoPagamento(string $categoria, string $datInicio, string $datTermino){

            if ($categoria == "Escolher Categoria ...") {
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                ORDER BY dat_pag ASC";
            } else {
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_pag`) >='{$datInicio}' AND DATE(`dat_pag`) <='{$datTermino}' 
                AND `categoria`='{$categoria}' ORDER BY dat_pag ASC";
            }

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }


        //Método - Busca Personalizada Por Data de Pagamento
        public function buscaPersoVencimento(string $categoria, string $pagto, string $datInicio, string $datTermino){

            if ($categoria == "Escolher Categoria ...") {
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}'
                AND `pago`='{$pagto}' ORDER BY dat_venc ASC";
            } else {
                $comandoSQL = "SELECT * FROM `".TABLE_DESPESAS."` WHERE DATE(`dat_venc`) >='{$datInicio}' AND DATE(`dat_venc`) <='{$datTermino}' 
                AND `pago`='NAO' AND `categoria`='{$categoria}' ORDER BY dat_venc ASC";
            }

            $executar = $this->getConexao()->query($comandoSQL);
            return $executar;
        }

    }

