<?php
ini_set('default_charset', 'UTF-8');
session_start();
include('db/verifica_login.php');
include('db/conecta.php');

$result_clientes = "SELECT * FROM clientes ORDER by cep";
$resultado_clientes = mysqli_query($conexao, $result_clientes);
?>
<!DOCTYPE html>
<html lang="Pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="DataTables/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="DataTables/responsive.dataTables.min.css" />
  <script type="text/javascript" charset="utf8" src="DataTables/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
    <table id="example" class=" table table-bordered table-hover mobile-p">
      <thead>
        <tr>
          <th>#</th>
          <th>Cliente</th>
          <th>Motor</th>
          <th>Potência</th>
          <th>CEP</th>
          <th></th>
      </thead>
      <tbody>
        <?php while ($rows_clientes = mysqli_fetch_assoc($resultado_clientes)) { ?>
          <tr>
            <td><?php echo $rows_clientes['id_cliente']; ?></td>
            <td><?php echo utf8_decode($rows_clientes['cliente']); ?></td>
            <td><?php echo $rows_clientes['motor']; ?></td>
            <td><?php echo $rows_clientes['potencia']; ?></td>
            <td><?php echo $rows_clientes['cep']; ?></td>
            <td>
              <a <?php echo "href='formulario.php?id_cliente=" . $rows_clientes['id_cliente'] . "'"; ?>><button class="btn btn-primary">Acessar</button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</body>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>