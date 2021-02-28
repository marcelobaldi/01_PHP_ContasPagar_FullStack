<?php 
    namespace source\model;                                    
    require_once __DIR__ . "/../autoload.php";                 
    use source\database\basedatabase;                          
    use PDO;                                                   

    class despcategmodel extends basedatabase {
        public function despesasCategoria(){
            $comandoSQL = "SELECT * FROM ".TABLE_DESPESA_CATEGORIA." ORDER BY nome_categoria ASC";
            $executar   = $this->getConexao()->query($comandoSQL);
            $resultado  = $executar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }



