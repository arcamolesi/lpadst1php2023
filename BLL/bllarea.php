<?php

namespace BLL; 
USE DAL\dalArea;
include_once 'C:\xampp\htdocs\lpadst1php2023\DAL\dalArea.php'; 
include_once 'C:\xampp\htdocs\lpadst1php2023\MODEL\Area.php'; 
include_once 'C:\xampp\htdocs\lpadst1php2023\MODEL\TipoArea.php'; 
include_once 'C:\xampp\htdocs\lpadst1php2023\BLL\blltipoarea.php'; 

class bllArea {

    public function Select (){
        $dalArea = new \DAL\dalArea(); 
        return $dalArea->Select();
    }
   

    public function Insert (\MODEL\Area $area){

        $bllTipoArea = new \bll\bllTipoArea(); 
        $tipoArea = new \MODEL\TipoArea(); 
        $tipoArea = $bllTipoArea->SelectID($area->getTipo()); 
        $novoValor = $tipoArea->getQuantidade() + 1; 
        $tipoArea->setQuantidade($novoValor);
        $bllTipoArea->Update($tipoArea); 

        $dal = new dalArea(); 
        $dal->Insert($area); 
          
        header("location: lstArea.php"); 
    }

}

?>