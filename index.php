<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Escolar</title>

  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="shortcut icon" href="img/ico_escola.ico">
  <?php
    require "conexao.php";
  ?>
</head>
<body>
  <div id="logo">
    <img src="img/logo.png" title="Logo da Escola">
  </div>
  <div id="caixa-login">
    <?php
      if (isset($_POST['button'])) {
        $code = $_POST['code'];
        $password = $_POST['password'];

        if ($code == '')
          echo "<h2>Por favor, digite o número do cartão ou código de acesso! </h2>";
        else if ($password == '')
          echo "<h2>Por favor, digite sua senha! </h2>";
        else {
          $sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$password'";

          $result = mysqli_query($conexao, $sql);
          if (mysqli_num_rows($result) > 0){
            while ($res_1 = mysqli_fetch_assoc($result)) {
              $status = $res_1['status'];
              $code = $res_1['code'];
              $senha = $res_1['senha'];
              $nome = $res_1['nome'];
              $painel = $res_1['painel'];

              if ($status == 'Inativo')
                echo "<h2>Você está Inativo, procure a administração! </h2>";
              else {
                session_start();
                $_SESSION['code'] = $code;
                $_SESSION['nome'] = $nome;
                $_SESSION['senha'] = $senha;
                $_SESSION['painel'] = $painel;

                if ($painel == 'ADMIN')
                  echo "<script language='javascript'>window.location='admin';</script>";
                else if ($painel == 'ALUNO')
                  echo "<script language='javascript'>window.location='aluno';</script>";
                else if ($painel == 'PROFESSOR')
                  echo "<script language='javascript'>window.location='professor';</script>";
                else if ($painel == 'PORTARIA')
                  echo "<script language='javascript'>window.location='portaria';</script>";
                else if ($painel == 'TESOURARIA')
                  echo "<script language='javascript'>window.location='tesouraria';</script>";
              }
            }
          }
          else
            echo "<h2>Dados incorretos! </h2>";
        }
      }
    ?>
    <form action="" method="post" name="form" enctype="multipart/form-data">
      <table>
        <tr>
          <td><h1>Nº Cartão ou Código de Acesso:</h1></td>
        </tr>
        <tr>
          <td><input type="text" name="code"></td>
        </tr>
        <tr>
          <td><h1>Senha:</h1></td>
        </tr>
        <tr>
          <td><input type="password" name="password"></td>
        </tr>
        <tr>
          <td><input class="input" type="submit" name="button" value="Entrar"></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>