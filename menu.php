<?php
session_start();
include('db/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="PT-br">

<head>
  <link rel="manifest" href="dunplab-manifest-7308.json">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/menu.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Document</title>
</head>

<body>
  <header class="container-fluid">
    <div class="text-center">
      <img src="img/PowerTech-logo.png" class="rounded" alt="..." />
    </div>
  </header>

  <section class="container-fluid">
    <h4>Selecione a opção desejada:</h4>
    <a href="lista_clientes.php"><button class="btn btn1">Clientes</button></a>
    <a href="lista_relatorio.php"><button class="btn btn2">Relatorios</button></a>
    <div class="container">
      <a href="db/logout.php"><button class="btn btn-danger btn3">Sair</button></a>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>