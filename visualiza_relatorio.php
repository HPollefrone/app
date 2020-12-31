<?php
ini_set('default_charset', 'UTF-8');
session_start();
include('db/verifica_login.php');
include('db/conecta.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_formulario = "SELECT * FROM check_teste WHERE id ='$id'";
$resultado_formulario = mysqli_query($conexao, $result_formulario);
$row_formulario = mysqli_fetch_assoc($resultado_formulario);
$cliente = $row_formulario['id_cliente'];
$result_cliente = "SELECT * FROM clientes WHERE id_cliente = '$cliente'";
$resultado_cliente = mysqli_query($conexao, $result_cliente);
$row_clientes = mysqli_fetch_assoc($resultado_cliente);
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/visualiza.css" />
  <title>Relatório</title>
</head>

<body>
  <button class="btn btn-danger btnPdf btn-sm" onClick="window.print()">PDF</button>
  <header class="container-fluid">
    <!--Card assinatura-->
    <div class="card">
      <div class="card-body assin">
        <!--Observação-->
        <img src="img/PowerTech-logo.png" alt="">
        <ul class="coluna cabecao">
          <li style="font-weight: bold;">Power Tech</li>
          <li style="font-weight: bold;"></li>COM. E ASSISTÊNCIA DE GRUPOS GERADORES</li>
          <li>Rua: Soldado José Vicente De Paula, 54 - São Paulo - SP.</li>
          <li>FONES: (11)2636-6597 / (11)94727-4403</li>
          <li>site:https://powertechgeradores.com</li>
          <li>e-mail:contato@powertechgeradores.com</li>
        </ul>
      </div>
    </div>
  </header>
  <section class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">Relatório de Manutenção Preventiva</h5>
      </div>
      <div class="cardCliente row">
        <ul class="coluna cliente col-5">
          <li>
            Cliente:
            <?php echo utf8_encode($row_formulario['cliente']); ?><span></span>
          </li>
          <li>
            Endereço:<?php echo utf8_encode($row_clientes['endereco']); ?>
            <span></span>
          </li>
          <li>
            Bairro:
            <?php echo utf8_encode($row_clientes['bairro']); ?>
            <span></span>
          </li>
          <li>
            Cidade:
            <?php echo utf8_encode($row_clientes['cidade']); ?>
            <span></span>
          </li>
          <li>
            Estado:
            <?php echo utf8_encode($row_clientes['uf']); ?>
            <span></span>
          </li>
          <li>
            Cep:
            <?php echo $row_clientes['cep']; ?>
            <span></span>
          <li>CMP Nº: <?php echo $row_clientes['cmp_n']; ?> <span></span></li>
          </li>
          <li></li>
        </ul>
        <ul class="coluna cliente col-5">

          <li>
            Motor:
            <?php echo utf8_encode($row_formulario['motor']); ?>
          </li>
          <li>
            Modelo:
            <?php echo utf8_encode($row_clientes['modelo']); ?>
            <span></span>
          </li>
          <li>
            Gerador:
            <?php echo utf8_encode($row_clientes['gerador']); ?>
            <span></span>
          </li>
          <li>
            Potencia:
            <?php echo utf8_encode($row_formulario['potencia']); ?><span></span>
          </li>
          <li>
            USCA:
            <?php echo utf8_encode($row_formulario['usca']); ?><span></span>
          </li>
          <li>
            Fabricante:
            <?php echo utf8_encode($row_clientes['fabricante']); ?>
            <span></span>
          </li>
        </ul>
        <ul class="coluna col-2">
          <li>
            Data:
            <?php echo $row_formulario['data']; ?>
            <span></span>
          </li>
          <li>
            Horimetro:
            <?php echo $row_formulario['horimetro']; ?>
            <span></span>
          </li>
          <li>
            Técnico:
            <?php echo utf8_encode($row_formulario['tecnico']); ?>
            <span></span>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <!--Card Mecânica-->
    <div class="card cardMecanica">
      <div class="card-header">
        <h5 class="mb-0">Mecânica</h5>
      </div>
      <div class="card-body row">
        <!--Peças-->
        <div class="col-3">
          <ul class="coluna pecas">
            <h6>Peças:</h6>
            <li>
              Alternador:
              <span><?php echo $row_formulario['alternador_condicoes']; ?></span>
            </li>
            <li>
              Correia:
              <span><?php echo $row_formulario['correia_condicoes']; ?></span>
            </li>
            <li>
              Mangueira de Água:
              <span><?php echo $row_formulario['mangueira_agua_condicoes']; ?></span>
            </li>
            <li>
              Mangueira de diesel:
              <span><?php echo $row_formulario['mangueira_diesel_condicoes']; ?></span>
            </li>
            <li>
              Bomba D'água:
              <span><?php echo $row_formulario['bomba_dagua_condicoes']; ?></span>
            </li>
            <li>
              Valvula Termostática:
              <span><?php echo $row_formulario['valvula_termostatica_condicoes']; ?></span>
            </li>
            <li>
              Radiador: <span><?php echo $row_formulario['radiador']; ?></span>
            </li>
          </ul>
        </div>
        <!--Filtros-->
        <div class="col-2">
          <ul class="coluna filtros">
            <h6>Filtros</h6>
            <li>
              Diesel:
              <span><?php echo $row_formulario['filtro_diesel']; ?></span>
            </li>
            <li>
              Lubrificante:
              <span><?php echo $row_formulario['filtro_lubrificante']; ?></span>
            </li>
            <li>
              Ar: <span><?php echo $row_formulario['filtro_ar']; ?></span>
            </li>
            <li>
              Água: <span><?php echo $row_formulario['filtro_agua']; ?></span>
            </li>
          </ul>
        </div>
        <!--Combustivel-->
        <div class="col-2">
          <ul class="coluna combustivel">
            <h6>Combustivel</h6>
            <li>
              Nivel:
              <span><?php echo $row_formulario['combustivel_nivel']; ?></span>
            </li>
            <li>
              Condições:
              <span><?php echo $row_formulario['combustivel_condicoes']; ?></span>
            </li>
          </ul>
        </div>
        <!--Agua-->
        <div class="col-2">
          <ul class="coluna agua">
            <h6>Agua</h6>
            <li>
              Nivel: <span><?php echo $row_formulario['agua_nivel']; ?></span>
            </li>
            <li>
              Condições:
              <span><?php echo $row_formulario['agua_condicoes']; ?></span>
            </li>
          </ul>
        </div>
        <!--Oleo-->
        <div class="col-2">
          <ul class="coluna oleo">
            <h6>Óleo lubrificante</h6>
            <li>
              Nivel: <span><?php echo $row_formulario['oleo_nivel']; ?></span>
            </li>
            <li>
              Condições:
              <span><?php echo $row_formulario['oleo_condicoes']; ?></span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>
  <section class="container-fluid">
    <!--Card Eletrica-->
    <div class="card cardEletrica">
      <div class="card-header">
        <h5 class="mb-0">Elétrica</h5>
      </div>
      <div class="card-body row">
        <!--Eletrica1-->
        <ul class="coluna elet1 col-6">
          <li>
            Pré-Aquecimento:
            <span><?php echo $row_formulario['pre_aquecimento_funcionamento']; ?></span>
          </li>
          <li>
            M.Partida:
            <span><?php echo $row_formulario['m_partida_funcionamento']; ?></span>
          </li>
          <li>
            Solenoide:
            <span><?php echo $row_formulario['solenoide_funcionamento']; ?></span>
          </li>
          <li>
            Sensor Óleo:
            <span><?php echo $row_formulario['sensor_oleo_funcionamento']; ?></span>
          </li>
          <li>
            Sensor Temp:
            <span><?php echo $row_formulario['sensor_temp_funcionamento']; ?></span>
          </li>
          <li>
            Carregador Bateria:
            <span><?php echo $row_formulario['carregador_bateria_funcionamento']; ?></span>
          </li>

        </ul>
        <!--Eletrica2-->
        <ul class="coluna elet2 col-6">
          <li>
            Bateria:
            <span><?php echo $row_formulario['bateria_funcionamento']; ?></span>
          </li>
          <li>
            Cabos Gerais:
            <span><?php echo $row_formulario['cabos_gerais_funcionamento']; ?></span>
          </li>
          <li>
            Reg.Vel:
            <span><?php echo $row_formulario['reg_vel_funcionamento']; ?></span>
          </li>
          <li>
            Ponte Retif:
            <span><?php echo $row_formulario['ponte_retificadora_funcionamento']; ?></span>
          </li>
          <li>
            Trans.RD/GR:
            <span><?php echo $row_formulario['trans_rd_gd_funcionamento']; ?></span>
          </li>
          <li>
            Sensor de tensão:
            <span><?php echo $row_formulario['sensor_tensao']; ?></span>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <!--Card Medição-->
    <div class="card sec float-left">
      <div class="card-header">
        <h5 class="mb-0">Medição</h5>
      </div>
      <div class="card-body cardMedicao row">
        <!--Medicao1-->
        <ul class="coluna met1 col-6">
          <li>
            Fase R/S - Vazio:
            <span><?php echo $row_formulario['fase_rs_vazio']; ?></span>
          </li>
          <li>
            Fase R/S - Carga:
            <span><?php echo $row_formulario['fase_rs_carga']; ?></span>
          </li>
          <li>
            Fase S/T - Vazio:
            <span><?php echo $row_formulario['fase_st_vazio']; ?></span>
          </li>
          <li>
            Fase S/T - Carga:
            <span><?php echo $row_formulario['fase_st_carga']; ?></span>
          </li>
          <li>
            Fase T/R - Vazio:
            <span><?php echo $row_formulario['fase_tr_vazio']; ?></span>
          </li>
          <li>
            Fase T/R - Carga:
            <span><?php echo $row_formulario['fase_tr_carga']; ?></span>
          </li>
          <li>
            HZ - Vazio:
            <span><?php echo $row_formulario['hz_vazio']; ?></span>
          </li>
          <li>
            HZ - Carga:
            <span><?php echo $row_formulario['hz_carga']; ?></span>
          </li>
        </ul>
        <!--Medicao2-->
        <ul class="coluna met2 col-6">
          <li>
            Amper R:
            <span><?php echo $row_formulario['amper_r_carga']; ?></span>
          </li>
          <li>
            Amper S:
            <span><?php echo $row_formulario['amper_s_carga']; ?></span>
          </li>
          <li>
            Amper T:
            <span><?php echo $row_formulario['amper_t_carga']; ?></span>
          </li>
          <li>
            Carga: <span><?php echo $row_formulario['carga']; ?></span>
          </li>
          <li>
            Temp Agua - Vazio:
            <span><?php echo $row_formulario['temp_agua_vazio']; ?></span>
          </li>
          <li>
            Temp Agua - Carga:
            <span><?php echo $row_formulario['temp_agua_carga']; ?></span>
          </li>
          <li>
            Pressao Oleo - Vazio:
            <span><?php echo $row_formulario['pressao_oleo_vazio']; ?></span>
          </li>
          <li>
            Pressao Oleo - Carga:
            <span><?php echo $row_formulario['pressao_oleo_carga']; ?></span>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <!--Card Observacao-->
    <div class="card cardObervacao">
      <div class="card-header">
        <h5 class="mb-0">Observações</h5>
      </div>
      <div class="card-body">
        <!--Observação-->
        <p>
          <span><?php echo utf8_encode($row_formulario['observacoes']); ?></span>
        </p>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <!--Card assinatura-->
    <div class="cardAssinatura">

      <h5 class="mb-0">Assinatura cliente</h5>

      <!--Observação-->
      <p>
        <object data="<?php echo $row_formulario['imgBase64']; ?>" width="1000" height="300" type="text/html" style="overflow: hidden"></object>
      </p>

    </div>
  </section>
</body>


</html>