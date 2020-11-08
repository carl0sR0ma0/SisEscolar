<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">  
  <title>Sistema Escolar</title>
</head>
<body>
  <?php
    require "conexao.php";

    @session_start();

    $code = $_SESSION['code'];
    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
    $painel = $_SESSION['painel'];

    if ($code == '')
      echo "<script language='javascript'>window.location='../index.php';</script>";
    else if ($nome == '')
      echo "<script language='javascript'>window.location='../index.php';</script>";
    else if ($senha == '')
      echo "<script language='javascript'>window.location='../index.php';</script>";
  ?>

  <?php
    if (@$_GET['acao'] == 'quebra') {
      session_destroy();

      $_SESSION['code'];
      $_SESSION['nome'];
      $_SESSION['senha'];
      $_SESSION['painel'];

      echo "<script language='javascript'>window.location='index.php';</script>";
    }
  ?>
</body>
</html>