<?php

require_once("config.php");
	

//carrega um usuário
//$root = new Usuario();
//$root->loadById(2);
//echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("us");
//echo json_encode($search);


//carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("root", "123456");

echo $usuario;
?>