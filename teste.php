<?php
//include('db/verifica_login.php');
include('db/conecta.php');
$id = 5; //filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_formulario = "SELECT * FROM check_teste WHERE id ='$id'";
$resultado_formulario = mysqli_query($conexao, $result_formulario);
$row_formulario = mysqli_fetch_assoc($resultado_formulario);
$cliente = $row_formulario['id_cliente'];
$result_cliente = "SELECT * FROM clientes WHERE id_cliente = '$cliente'";
$resultado_cliente = mysqli_query($conexao, $result_cliente);
$row_clientes = mysqli_fetch_assoc($resultado_cliente);
?>

<html>

<head>

</head>

<body>
    <h1><?php echo($row_formulario['cliente']);?></h1>
</body>

</html>