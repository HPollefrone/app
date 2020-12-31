<?php
    session_start();
    if(!$_SESSION['usuario']){
        header('Location: ./login.html');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title></title>
</head>
<body>
<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "checkgg";

$conexao = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db) or die("Não foi possível conectar ao banco de dados.<br /> Mensagem de erro: " . mysql_error());

    $id_cliente = ($_POST['id_cliente']);
    $cliente = ($_POST['cliente']);
    $motor = ($_POST['motor']);
    $potencia = ($_POST['potencia']);
    $usca = ($_POST['usca']);

    $data = ($_POST['data']);
    $horimetro = ($_POST['horimetro']);
    $filtro_diesel = ($_POST['filtro_diesel']);
    $filtro_lubrificante = ($_POST['filtro_lubrificante']);
    $filtro_ar = ($_POST['filtro_ar']);
    $filtro_agua = ($_POST['filtro_agua']);
    $combustivel_nivel = ($_POST['combustivel_nivel']);
    $combustivel_condicoes = ($_POST['combustivel_condicoes']);
    $agua_nivel = ($_POST['agua_nivel']);
    $agua_condicoes = ($_POST['agua_condicoes']);
    $oleo_nivel = ($_POST['oleo_nivel']);
    $oleo_condicoes = ($_POST['oleo_condicoes']);
    $alternador_condicoes =  ($_POST['alternador_condicoes']);
    $correia_condicoes = ($_POST['correia_condicoes']);
    $mangueira_agua_condicoes = ($_POST['mangueira_agua_condicoes']);
    $mangueira_diesel_condicoes = ($_POST['mangueira_diesel_condicoes']);
    $bomba_dagua_condicoes = ($_POST['bomba_dagua_condicoes']);
    $valvula_termostatica_condicoes = ($_POST['valvula_termostatica_condicoes']);
    $radiador = ($_POST['radiador']);
    $pre_aquecimento_funcionamento = ($_POST['pre_aquecimento_funcionamento']);
    $m_partida_funcionamento = ($_POST['m_partida_funcionamento']);
    $solenoide_funcionamento = ($_POST['solenoide_funcionamento']);
    $sensor_oleo_funcionamento = ($_POST['sensor_oleo_funcionamento']);
    $sensor_temp_funcionamento = ($_POST['sensor_temp_funcionamento']);
    $carregador_bateria_funcionamento = ($_POST['carregador_bateria_funcionamento']);
    $bateria_funcionamento = ($_POST['bateria_funcionamento']);
    $cabos_gerais_funcionamento = ($_POST['cabos_gerais_funcionamento']);
    $reg_vel_funcionamento = ($_POST['reg_vel_funcionamento']);
    $ponte_retificadora_funcionamento = ($_POST['ponte_retificadora_funcionamento']);
    $trans_rd_gd_funcionamento = ($_POST['trans_rd_gd_funcionamento']);
    $sensor_tensao = ($_POST['sensor_tensao']);
    $fase_rs_vazio  = ($_POST['fase_rs_vazio']);
    $fase_rs_carga  = ($_POST['fase_rs_carga']);
    $fase_st_vazio  = ($_POST['fase_st_vazio']);
    $fase_st_carga  = ($_POST['fase_st_carga']);
    $fase_tr_vazio  = ($_POST['fase_tr_vazio']);
    $fase_tr_carga   = ($_POST['fase_tr_carga']);
    $hz_vazio  = ($_POST['hz_vazio']);
    $hz_carga   = ($_POST['hz_carga']);
    $amper_r_carga  = ($_POST['amper_r_carga']);
    $amper_s_carga   = ($_POST['amper_s_carga']);
    $amper_t_carga   = ($_POST['amper_t_carga']);
    $carga   = ($_POST['carga']);
    $temp_agua_vazio  = ($_POST['temp_agua_vazio']);
    $temp_agua_carga   = ($_POST['temp_agua_carga']);
    $pressao_oleo_vazio  = ($_POST['pressao_oleo_vazio']);
    $pressao_oleo_carga   = ($_POST['pressao_oleo_carga']);
    $observacoes  = utf8_decode(($_POST['observacoes']));
    
    $imgBase64 = ($_POST['imgBase64']);
    $tecnico = ($_POST['tecnico']);
    




$query = mysqli_query ($conexao,"INSERT INTO check_teste (id_cliente, cliente, motor, potencia, usca, data, horimetro, filtro_diesel, filtro_lubrificante, filtro_ar, filtro_agua, combustivel_nivel, combustivel_condicoes, agua_nivel, agua_condicoes, oleo_nivel, oleo_condicoes, alternador_condicoes, correia_condicoes, mangueira_agua_condicoes, mangueira_diesel_condicoes, bomba_dagua_condicoes, valvula_termostatica_condicoes, radiador, pre_aquecimento_funcionamento, m_partida_funcionamento, solenoide_funcionamento, sensor_oleo_funcionamento, sensor_temp_funcionamento, carregador_bateria_funcionamento, bateria_funcionamento, cabos_gerais_funcionamento, reg_vel_funcionamento, ponte_retificadora_funcionamento, trans_rd_gd_funcionamento,sensor_tensao, fase_rs_vazio, fase_rs_carga, fase_st_vazio, fase_st_carga, fase_tr_vazio, fase_tr_carga, hz_vazio, hz_carga, amper_r_carga, amper_s_carga, amper_t_carga, carga, temp_agua_vazio, temp_agua_carga, pressao_oleo_vazio, pressao_oleo_carga, observacoes, imgBase64, tecnico) VALUES ('$id_cliente','$cliente','$motor','$potencia','$usca','$data','$horimetro','$filtro_diesel', '$filtro_lubrificante', '$filtro_ar', '$filtro_agua','$combustivel_nivel','$combustivel_condicoes','$agua_nivel', '$agua_condicoes','$oleo_nivel', '$oleo_condicoes', '$alternador_condicoes', '$correia_condicoes', '$mangueira_agua_condicoes', '$mangueira_diesel_condicoes', '$bomba_dagua_condicoes', '$valvula_termostatica_condicoes','$radiador', '$pre_aquecimento_funcionamento', '$m_partida_funcionamento', '$solenoide_funcionamento', '$sensor_oleo_funcionamento', '$sensor_temp_funcionamento', '$carregador_bateria_funcionamento', '$bateria_funcionamento', '$cabos_gerais_funcionamento', '$reg_vel_funcionamento', '$ponte_retificadora_funcionamento', '$trans_rd_gd_funcionamento','$sensor_tensao', '$fase_rs_vazio', '$fase_rs_carga', '$fase_st_vazio', '$fase_st_carga', '$fase_tr_vazio', '$fase_tr_carga', '$hz_vazio', '$hz_carga', '$amper_r_carga', '$amper_s_carga', '$amper_t_carga', '$carga', '$temp_agua_vazio','$temp_agua_carga', '$pressao_oleo_vazio', '$pressao_oleo_carga', '$observacoes', '$imgBase64', '$tecnico')");
//echo "<center><h1>Cadastro efetuado com sucesso!</h1></center>";
if (mysqli_affected_rows($conexao)) {
    $_SESSION['msg'] = "<p style='color:green;'> Enviado com Sucesso</p>";
    header("Location: ../menu.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar. Tente novamente!</p>";
    header("Location: formulario.php");
}

?>

    <section>
        <a href="../menu.php"><button class="btn btn2">Menu</button></a>
    </section>       

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"  integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"crossorigin="anonymous" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"crossorigin="anonymous"></script>
</body>
</html>