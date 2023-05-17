<?php
    namespace DAL; 
    include_once 'C:\xampp\htdocs\lpadst1php2023\DAL\conexao.php';
    include_once 'C:\xampp\htdocs\lpadst1php2023\MODEL\Operador.php';
    
    
    class dalOperador{

        public function Select(){
          $sql = "select * from operador;";

          $con = Conexao::conectar(); 
          $result = $con->query($sql); 
          $con = Conexao::desconectar();

          //return $result; não vai retornar como linha e sim como objeto

          foreach ($result as $linha){
              $operador = new \MODEL\Operador(); 

              $operador->setId($linha['id']); 
              $operador->setNome($linha['nome']);
              
             //$operador->setAniversario($linha['aniversario']);
              $data = date_create($linha['aniversario']);
              $operador->setAniversario(date_format($data, 'd-m-Y')); 

              $operador->setSalario($linha['salario']);

              $lstOperador[] = $operador; 
          }

          return $lstOperador; 
   
        }

        public function SelectID(int $id){
            $sql = "select * from operador where id=?;";
            $pdo = Conexao::conectar(); 
            $query = $pdo->prepare($sql);
            $query->execute (array($id));
            $linha = $query->fetch(\PDO::FETCH_ASSOC);
            Conexao::desconectar(); 

            $operador = new \MODEL\Operador(); 
            $operador->setId($linha['id']);
            $operador->setNome($linha['nome']); 
            $operador->setAniversario($linha['aniversario']); 
            $operador->setSalario($linha['salario']); 

            return $operador; 

        }

        public function Insert(\MODEL\Operador $operador){
            $con = Conexao::conectar(); 
            $sql = "INSERT INTO operador (nome, aniversario, salario) 
                   VALUES  ('{$operador->getNome()}', '{$operador->getAniversario()}',
                            '{$operador->getSalario()}');";
     
            $result = $con->query($sql); 
            $con = Conexao::desconectar();
            return $result; 

        }

        public function Update(\MODEL\Operador $operador){
            $sql = "UPDATE operador SET nome=?, aniversario=?, salario=? WHERE id=?";

            $pdo = Conexao::conectar(); 
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $query = $pdo->prepare($sql);
            $result = $query->execute(array($operador->getNome(), $operador->getAniversario(), 
                                            $operador->getSalario(), $operador->getId()));
            $con = Conexao::desconectar();
            return  $result; 
        }

        public function Delete(int $id){
            $sql = "DELETE from operador WHERE id=?";

            $pdo = Conexao::conectar(); 
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $query = $pdo->prepare($sql);
            $result = $query->execute(array($id));
            $con = Conexao::desconectar();
            return  $result; 
        }


    }

?> 