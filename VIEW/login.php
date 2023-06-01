<?php
    include_once 'C:\xampp\htdocs\lpadst1php2023\BLL\bllUsuario.php';

    $usuario = trim($_POST['usuario']); 
    $senha = trim($_POST['senha']); 

   // echo "Usuario: " . $usuario . "</br>"; 
   // echo "Senha: " . $senha. "</br>". "</br>";;

    $bll = new  \BLL\bllUsuario();
    $objUsuario = $bll->SelectUser($usuario);

  //  echo "Usuario: " . $objUsuario->getUsuario() . "</br>"; 
  //  echo "Senha: " . $objUsuario->getSenha() . "</br>";
  if($objUsuario != null) {
    if (md5($senha) == $objUsuario->getSenha()){
         session_start();
         $_SESSION['login'] =  $objUsuario->getUsuario() ;
         header("location:menu.php");
     }
     else header("location:index.php");
 }
 else header("location:index.php");

?>