<?php
ini_set('default_charset', 'UTF-8');
session_start();
include('db/verifica_login.php');
include('db/conecta.php');
$result_relatorio = "SELECT * FROM check_teste ORDER BY id desc";
$resultado_relatorio = mysqli_query($conexao, $result_relatorio);

?>

<!DOCTYPE html>
<html lang="PT-br">

<head>

    <script src="DataTables/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables/responsive.dataTables.min.css" />
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <table id="example" class="table table-bordered table-hover mobile-p">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Motor/Nº</th>
                <th>Data</th>
                <th>Técnico</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($rows_relatorio = mysqli_fetch_assoc($resultado_relatorio)) { ?>
                <tr>
                    <td><?php echo $rows_relatorio['id']; ?></td>
                    <td><?php echo $rows_relatorio['cliente']; ?></td>
                    <td><?php echo $rows_relatorio['motor']; ?></td>
                    <td><?php echo $rows_relatorio['data']; ?></td>
                    <td><?php echo $rows_relatorio['tecnico']; ?></td>
                    <td>
                        <a <?php echo "href='visualiza_relatorio.php?id=" . $rows_relatorio['id'] . "'"; ?>><button class="btn btn-primary">Acessar</button></a>
                        <?php

                        if ($rows_relatorio['imgBase64'] == 1 && $rows_relatorio['tecnico'] == $_SESSION['usuario']) {
                            $status = 'enabled';
                        } else {
                            $status = 'disabled';
                        };
                        ?>
                        <a <?php echo "href='touchpad.php?id=" . $rows_relatorio['id'] . "'"; ?>><button id="assinar" <?php echo $status; ?> class="btn btn-success">Assinar</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>