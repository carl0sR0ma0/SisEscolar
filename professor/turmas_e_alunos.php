<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/turmas_e_alunos.css">
  <link rel="shortcut icon" href="../img/ico_escola.ico">
</head>
<body>
  <?php require "header.php"; ?>
  <div id="caixa_preta"></div>

  <div id="box">
    <h1>Abaixo mostra seu histórico de disciplinas e alunos!</h1>
    <?php
      $sql_1 = "SELECT * FROM disciplinas WHERE professor = '$code'";
      $result = mysqli_query($conexao, $sql_1);
      if (mysqli_num_rows($result) == '')
        echo "Você não ministra nenhuma disciplina!";
      else {
        while ($res_1 = mysqli_fetch_assoc($result)) {
          $curso = $res_1['curso']; ?>

          <table widht="955" border="0">
            <tr>
              <td width="400">
                <strong>Disciplina ministrada:</strong>
                <?php echo $res_1['disciplina']; ?>
              </td>
              <td width="400">
                <strong>Total de alunos desta disciplina:</strong>
                <?php
                  $sql_2 = "SELECT * FROM estudantes WHERE serie = '$curso'";
                  echo mysqli_num_rows(mysqli_query($conexao, $sql_2));
                ?>
              </td>
              <td width="123">
                <a href="fazer_chamada.php?curso=<?php echo base64_encode($res_1['curso']); ?>&dis=<?php echo base64_encode($res_1['disciplina']); ?>">Fazer Chamada</a>
              </td>
            </tr>
          </table>
        <?php }
      } ?>
  </div> <!-- Fechamento da div box -->
  <?php require "footer.php"; ?>
</body>
</html>