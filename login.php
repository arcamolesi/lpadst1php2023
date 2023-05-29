<?php
    include_once 'C:\xampp\htdocs\lpadst1php2023\BLL\bllUsuario.php';

    $usuario = trim($_POST['usuario']); 
    $senha = trim($_POST['senha']); 

    echo "Usuario: " . $usuario . "</br>"; 
    echo "Senha" . $senha;

    $bll = new  \BLL\bllUsuario();
    $objUsuario = $bll->SelectUser($usuario);

    echo "Usuario: " . $objUsuario->getUsuario() . "</br>"; 
    echo "Senha" . $objUsuario->getSenha();

?>