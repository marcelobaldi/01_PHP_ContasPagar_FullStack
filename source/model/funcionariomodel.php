<?php 
    namespace source\model;                                     
    require_once __DIR__ . "/../autoload.php";                 
    use source\database\basedatabase;                          
    use PDO;                                                  
    
    class funcionariomodel extends basedatabase {
        public function nomeFuncionarios(){
            $comandoSQL = "SELECT * FROM ".TABLE_CADASTRO_FUNCIONARIO." ORDER BY nome ASC";
            $executar   = $this->getConexao()->query($comandoSQL);
            $resultado  = $executar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    }




