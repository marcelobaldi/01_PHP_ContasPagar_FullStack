<?php
    namespace source\database;                                 
    require_once __DIR__ . "/../autoload.php";                
    use PDO;                                                   
    use PDOException;                                            

    class basedatabase {
        public function getConexao(){
            
            try{ 
                $dsn     = "mysql:host=".HOST.";dbname=".DATABASE_BASE."";
                $usuario = "" . USER . "";
                $senha   = "" . PASS . "";
                $opcoes  = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
                $objetoConexao = new PDO($dsn, $usuario, $senha, $opcoes);
            } catch (PDOException $erroCapturado) {var_dump($erroCapturado); }

            return $objetoConexao;
        }
    }



