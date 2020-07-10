<?php 

require_once("config.php");


// Carrega apenas 1 usuario
//$root = new Usuario();

//$root->loadById(5);

//echo $root;


//carrega uma lista de usuarios

//$lista = Usuario::getList();

//echo json_encode($lista);


//CARREGA UMA LISTA DE USUARIOS BUSCANDO PELO LOGUIN

//$search = Usuario::search("us");

//echo json_encode($search);


//Carrega um usuarios usando o login e a senha

$usuario = new Usuario();
$usuario->login("root", "!@#$");
echo $usuario;

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

 ?>