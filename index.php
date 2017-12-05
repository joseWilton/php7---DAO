<?php

require_once("config.php");
/*$sql = new Sql();
$usuario = $sql->select("SELECT * FROM td_usuarios");
$json= json_encode($usuario); // já joga em um json
print_r($usuario); // funciona normalmente sem passar pelo json.
*/
/*
  carregando um registro
$root = new Usuario();
$root->loadById(2);// carregando um cadastro pelo id
echo"<pre>";print_r( $root);
*/
/*
//carrega uma lista de usuarios
$lista = Usuario::getUsers();
//exibindo os registros
echo "<pre>";print_r($lista);
//exibindo o registro que se encontra na posição 1 do array de objetos
echo json_encode($lista[1]);
*/
//carrega uma lista de usuario buscando pelo login
/*$busca = Usuario::search("lu");
echo json_encode($busca);
*/
//carrega usuario usando o login e a senha
$usuario = new Usuario();
$usuario->login("thiago","2345");

echo"<pre>";print_r($usuario);
?>
