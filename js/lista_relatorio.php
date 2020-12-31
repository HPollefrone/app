<?php
ini_set('default_charset', 'UTF-8');
session_start();
include('db/verifica_login.php');
include('db/conecta.php');
$result_relatorio = "SELECT * FROM check_teste ORDER BY id desc";
$resultado_relatorio = mysqli_query($conexao, $result_relatorio);
$result_assinatura = "SELECT * FROM assinatura ORDER BY id asc";
$resultado_assinatura = mysqli_query($conexao, $result_assinatura);
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <header>
        <h2>Relatórios</h2>
    </header>
    <section>
        <div class="row">
            <div class=" col-md-10 container-theme-showcase" role="main">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Motor/Nº</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rows_relatorio = mysqli_fetch_assoc($resultado_relatorio)) { ?>
                            <tr>
                                <td><?php echo $rows_relatorio['id']; ?></td>
                                <td><?php echo $rows_relatorio['cliente']; ?></td>
                                <td><?php echo $rows_relatorio['motor']; ?></td>
                                <td><?php echo $rows_relatorio['data']; ?></td>
                                <td>
                                    <a <?php echo "href='visualiza_relatorio.php?id=" . $rows_relatorio['id'] . "'"; ?>><button class="btn btn-primary">Acessar</button></a>
                                    <?php
                                    $rows_assinatura = mysqli_fetch_assoc($resultado_assinatura);
                                    if ($rows_assinatura['id'] == $rows_relatorio['id']) {
                                        $status = 'disabled';
                                    } else {
                                        $status = 'enabled';
                                    };
                                    ?>
                                    <a <?php echo "href='touchpad.php?id=" . $rows_relatorio['id'] . "'"; ?>><button id="assinar" <?php echo $status; ?> class="btn btn-success">Assinar</button></a>
                                    <button><?php echo $status; ?></button>
                                    <button><?php echo $rows_assinatura['id']; ?></button>
                                    <button><?php echo $rows_relatorio['id']; ?></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>