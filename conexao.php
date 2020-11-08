<?php

function conectar()
{
  $host = "localhost";
  $user = "root";
  $passoword = "mudar@123";
  $db = "sistema_escolar";

  $con = new mysqli($host, $user, $passoword, $db);
  return $con;
}

$conexao = conectar();

?>