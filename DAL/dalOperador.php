<?php
    namespace DAL; 
    include 'conexao.php';

    include '../MODEL/Operador.php';
    
    
    class dalOperador{

        public function Select(){
          $sql = "select * from operador;";

          $con = Conexao::conectar(); 
          $result = $con->query($sql); 
          $con = Conexao::desconectar();

          //return $lstOperador; 
   
          foreach($result as $linha){
            
            $operador = new \model\Operador();  
    
            $operador->setId($linha['id']);
            $operador->setNome($linha['nome']); 
            $operador->setAniversario($linha['aniversario']); 
            $operador->setSalario($linha['salario']); 
    
            $lstOperador[] = $operador; 

            return $lstOperador;
        }
       




        }

        public function SelectID(int $id){

        }

        public function Insert(){

        }

        public function Update(){

        }

        public function Delete(){

        }   


    }

?> 