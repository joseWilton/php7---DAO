<?php

require_once("config.php");
/*$sql = new Sql();
$usuario = $sql->select("SELECT * FROM td_usuarios");
$json= json_encode($usuario); // já joga em um json
print_r($usuario); // funciona normalmente sem passar pelo json.
*/
$root = new Usuario();
$root->loadById(2);// carregando um cadastro pelo id
echo"<pre>";print_r( $root);
?>
