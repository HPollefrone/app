<?php
session_start();
include('db/verifica_login.php');
include_once('db/conecta.php');
$id = filter_input(INPUT_GET, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
$result_clientes = "SELECT * FROM clientes WHERE id_cliente ='$id'";
$resultado_clientes = mysqli_query($conexao, $result_clientes);
$row_clientes = mysqli_fetch_assoc($resultado_clientes);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="DataTables/jquery.min.js"></script>
    <script src="DataTables/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section class="container-fluid">
        <form method="post" action="./db/envia_formulario.php">
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

                    <input type="hidden" name="id_cliente" value="<?php echo $row_clientes['id_cliente']; ?>">

                    <input type="text" name="cliente" readonly="true" value="<?php echo $row_clientes['cliente']; ?>"><br>


                    <input type="text" name="motor" readonly="true" value="<?php echo $row_clientes['motor']; ?>"><br>


                    <input type="text" name="potencia" readonly="true" value="<?php echo $row_clientes['potencia']; ?>"><br>

                    <input type="text" name="usca" readonly="true" value="<?php echo $row_clientes['usca']; ?>"><br>
                </div>
                <div class="col-md-4">
                    <p>Data:<input type="text" name="data" readonly="true" value="<?php echo date('d/m/Y'); ?>" />
                        <p>Horimetro:<input type="text" name="horimetro" maxlength="12" autocomplete="off"></intput>
                        </p>
                </div>
            </div>

            <!--colapse mecanica -->
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="head1">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse1">
                                Mecânica
                            </a>
                        </h5>
                    </div>

                    <div id="collapse1" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <!--Formulario filtros-->
                            <h2>Filtros</h2>
                            <div>
                                <legend>Diesel</legend>

                                <input type="radio" name="filtro_diesel" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="filtro_diesel" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="filtro_diesel" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>

                            </div>
                            <div>
                                <legend>Lubrificante</legend>

                                <input type="radio" name="filtro_lubrificante" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="filtro_lubrificante" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="filtro_lubrificante" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>

                            </div>
                            <div>
                                <legend>Ar</legend>

                                <input type="radio" name="filtro_ar" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="filtro_ar" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="filtro_ar" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>

                            </div>
                            <div>
                                <legend>Agua</legend>

                                <input type="radio" name="filtro_agua" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="filtro_agua" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="filtro_agua" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>

                            </div>
                            <!--Formulario filtros fim-->

                            <!--Formulario nivel combustivel combustivel-->
                            <h2>Combustivel</h2>
                            <div>
                                <legend>Nivel</legend>

                                <input type="text" name="combustivel_nivel" maxlength="12" />

                                <legend>Condições</legend>

                                <input type="radio" name="combustivel_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="combustivel_condicoes" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="combustivel_condicoes" value="RUIM" />
                                <label for="ruim">Ruim</label>
                            </div>
                            <!--formulario condicoes combustivel fim-->
                            <!--Agua-->
                            <h2>Agua</h2>
                            <div>
                                <legend>Nível</legend>

                                <input type="radio" name="agua_nivel" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="agua_nivel" value="BAIXO" />
                                <label for="baixo">Baixo</label>

                                <legend>Condições</legend>

                                <input type="radio" name="agua_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="agua_condicoes" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="agua_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--agua fim-->
                            <!--Incio oleo-->
                            <h2>Óleo Lubrificante</h2>
                            <div>
                                <legend>Nível</legend>

                                <input type="radio" name="oleo_nivel" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="oleo_nivel" value="BAIXO" />
                                <label for="vencido">Baixo</label>

                                <legend>Condições</legend>

                                <input type="radio" name="oleo_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="oleo_condicoes" value="VENCIDO" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="oleo_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim oleo-->
                            <!--Inicio alternador-->
                            <div>
                                <h2>Alternador</h2>
                                <legend>Condições</legend>

                                <input type="radio" name="alternador_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="alternador_condicoes" value="DEFEITO" />
                                <label for="vencido">Defeito</label>

                                <input type="radio" name="alternador_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim alternador-->
                            <!--Inicio correia-->
                            <div>
                                <h2>Correia</h2>
                                <legend>Condições</legend>

                                <input type="radio" name="correia_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="correia_condicoes" value="TROCAR" />
                                <label for="vencido">Vencido</label>

                                <input type="radio" name="correia_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--fim correia-->
                            <!--Inicio mangueira de agua-->
                            <div>
                                <h2>Mangueira de Água </h2>
                                <legend>Condições</legend>

                                <input type="radio" name="mangueira_agua_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="mangueira_agua_condicoes" value="RUIM" />
                                <label for="vencido">Ruim</label>

                                <input type="radio" name="mangueira_agua_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim mangueira de agua-->
                            <!--Inicio mangueira de diesel-->
                            <div>
                                <h2>Mangueira de diesel </h2>
                                <legend>Condições</legend>

                                <input type="radio" name="mangueira_diesel_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="mangueira_diesel_condicoes" value="RUIM" />
                                <label for="vencido">Ruim</label>

                                <input type="radio" name="mangueira_diesel_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim mangueira de diesel-->
                            <!--Inicio bomba dagua-->
                            <div>
                                <h2>Bomba D'água </h2>
                                <legend>Condições</legend>

                                <input type="radio" name="bomba_dagua_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="bomba_dagua_condicoes" value="RUIM" />
                                <label for="vencido">Ruim</label>

                                <input type="radio" name="bomba_dagua_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim bomba dagua-->
                            <!--inicio valvula termostatica-->
                            <div>
                                <h2>Valvula Termostática</h2>
                                <legend>Condições</legend>

                                <input type="radio" name="valvula_termostatica_condicoes" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="valvula_termostatica_condicoes" value="RUIM" />
                                <label for="vencido">Ruim</label>

                                <input type="radio" name="valvula_termostatica_condicoes" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim valula termostatica-->
                            <!--inicio valvula termostatica-->
                            <div>
                                <h2>Radiador</h2>
                                <legend>Condições</legend>

                                <input type="radio" name="radiador" value="OK" />
                                <label for="ok">OK</label>

                                <input type="radio" name="radiador" value="RUIM" />
                                <label for="vencido">Ruim</label>

                                <input type="radio" name="radiador" value="SUBSTITUIDO" />
                                <label for="substituido">Substituido</label>
                            </div>
                            <!--Fim valula termostatica-->
                        </div>
                    </div>
                </div>
                <!--colapse mecanica fim-->

                <!--colapse eletrica-->
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="head2">
                            <h5 class="mb-0">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Elétrica
                                </a>
                            </h5>
                        </div>

                        <div id="collapse2" class="collapse" aria-labelledby="head2" data-parent="#accordion">
                            <div class="card-body">
                                <!--inicio pre aquecimento-->
                                <div>
                                    <h2>Pré-Aquecimento</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="pre_aquecimento_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="pre_aquecimento_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="pre_aquecimento_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM pre aquecimento-->
                                <!--inicio motor de partida-->
                                <div>
                                    <h2>M.Partida</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="m_partida_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="m_partida_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="m_partida_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM motor de partida-->
                                <!--inicio motor de partida-->
                                <div>
                                    <h2>Solenoide</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="solenoide_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="solenoide_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="solenoide_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM motor de partida-->
                                <!--inicio sensor oleo-->
                                <div>
                                    <h2>Sensor Óleo</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="sensor_oleo_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="sensor_oleo_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="sensor_oleo_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM sensor oleo-->
                                <!--inicio sensor temp-->
                                <div>
                                    <h2>Sensor Temp</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="sensor_temp_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="sensor_temp_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="sensor_temp_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM sensor temp-->
                                <!--inicio carregador bateria-->
                                <div>
                                    <h2>Carregador Bateria</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="carregador_bateria_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="carregador_bateria_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="carregador_bateria_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM carregador bateria-->
                                <!--inicio  bateria-->
                                <div>
                                    <h2>Bateria</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="bateria_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="bateria_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="bateria_funcionamento" value="TROCAR" />
                                    <label for="vencido">Trocar</label>

                                    <input type="radio" name="bateria_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM  bateria-->
                                <!--inicio Cabos Gerais-->
                                <div>
                                    <h2>Cabos Gerais.</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="cabos_gerais_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="cabos_gerais_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="cabos_gerais_funcionamento" value="TROCAR" />
                                    <label for="vencido">Trocar</label>

                                    <input type="radio" name="cabos_gerais_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM cabos gerais-->
                                <!--Inicio Reg.Vel -->
                                <div>
                                    <h2>Reg.Vel</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="reg_vel_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="reg_vel_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="reg_vel_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM Reg. Vel -->
                                <!--Inicio Ponte Retif. -->
                                <div>
                                    <h2>Ponte Retif.</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="ponte_retificadora_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="ponte_retificadora_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="ponte_retificadora_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM Ponte Retif. -->
                                <!--Inicio Trans.RD/GR -->
                                <div>
                                    <h2>Trans.RD/GR</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="trans_rd_gd_funcionamento" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="trans_rd_gd_funcionamento" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="trans_rd_gd_funcionamento" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM -->
                                <!--Inicio sensor tensao -->
                                <div>
                                    <h2>Sensor Tensão</h2>
                                    <legend>Funcionamento</legend>

                                    <input type="radio" name="sensor_tensao" value="OK" />
                                    <label for="ok">OK</label>

                                    <input type="radio" name="sensor_tensao" value="DEFEITO" />
                                    <label for="vencido">Defeito</label>

                                    <input type="radio" name="sensor_tensao" value="SUBSTITUIDO" />
                                    <label for="substituido">Substituido</label>
                                </div>
                                <!--FIM -->


                            </div>
                        </div>
                    </div>
                    <!--colapse eletrica fim-->
                    <!--colapse medições-->
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="head3">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        Medições
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse3" class="collapse" aria-labelledby="head3" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Inicio Fase R/S-->
                                    <div class="container">
                                        <h2>Fase R/S</h2>
                                        <input class="mb-1 mr-1" type="text" name="fase_rs_vazio" maxlength="10">Vazio</input>
                                        <input class="mr-1" type="text" name="fase_rs_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Fase S/T-->

                                    <!--Inicio Fase S/T-->
                                    <div class="container">
                                        <h2>Fase S/T</h2>
                                        <input class="mb-1 mr-1" type="text" name="fase_st_vazio" maxlength="10"> Vazio</input>
                                        <input class="mr-1" type="text" name="fase_st_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Fase S/T-->
                                    <!--Inicio Fase T/R-->
                                    <div class="container">
                                        <h2>Fase T/R</h2>
                                        <input class="mb-1 mr-1" type="text" name="fase_tr_vazio" maxlength="10">Vazio</input>
                                        <input class="mr-1" type="text" name="fase_tr_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Fase T/R-->
                                    <!--Inicio HZ-->
                                    <div class="container">
                                        <h2>HZ</h2>
                                        <input class="mb-1 mr-1" type="text" name="hz_vazio" maxlength="10">Vazio</input>
                                        <input class="mr-1" type="text" name="hz_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim HZ-->
                                    <!--Inicio Amper R-->
                                    <div class="container">
                                        <h2>Amper R</h2>
                                        <input class="mr-1" type="text" name="amper_r_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim -->
                                    <!--Inicio Amper S-->
                                    <div class="container">
                                        <h2>Amper S</h2>
                                        <input class="mr-1" type="text" name="amper_s_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Amper S-->
                                    <!--Inicio Amper T-->
                                    <div class="container">
                                        <h2>Amper T</h2>
                                        <input class="mr-1" type="text" name="amper_t_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim -->
                                    <!--Inicio Carga -->
                                    <div class="container">
                                        <h2>Carga</h2>
                                        <input class="mr-1" type="text" name="carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Carga -->
                                    <!--Inicio Temp.Agua-->
                                    <div class="container">
                                        <h2>Temp. Agua</h2>
                                        <input class="mb-1 mr-1" type="text" name="temp_agua_vazio" maxlength="10">Vazio</input>
                                        <input class="mr-1" type="text" name="temp_agua_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Temp.Agua-->
                                    <!--Inicio Pressão óleo-->
                                    <div class="container">
                                        <h2>Pressão Óleo</h2>
                                        <input class="mb-1 mr-1" type="text" name="pressao_oleo_vazio" maxlength="10">Vazio</input>
                                        <input class="mr-1" type="text" name="pressao_oleo_carga" maxlength="10">Carga</input>
                                    </div>
                                    <!--Fim Pressão óleo-->

                                </div>

                            </div>
                        </div>
                        <!--colapse medições fim-->

                        <!--colapse observações-->
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="head4">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            Observações
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                                    <div class="card-body">
                                        <!--Inicio Observacoes-->
                                        <div class="container">
                                            <label for="ocorrencias">Ocorrências</label>
                                            <textarea class="form-control" rows="3" name="observacoes" maxlength="750"></textarea>
                                        </div>
                                        <!--Fim Observacoes-->
                                    </div>
                                </div>
                            </div>
                            <!--colapse observações fim-->

                            <!--colapse peças-->
                            <!-- <div id="accordion">
                <div class="card">
                    <div class="card-header" id="head5">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                Peças
                            </a>
                        </h5>
                    </div>
            
                    <div id="collapse5" class="collapse" aria-labelledby="head5" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div> -->
                            <!--colapse peças fim-->
                            <!--Inicio Assinatura-->
                            <input type="hidden" name="imgBase64" value="1">

                            <div>
                                <h4>Técnico: <input type="text" name="tecnico" readonly="true" value="<?php echo $_SESSION['usuario']; ?>" />
                                    <h4>
                            </div>
                            <div>


                                <!-- <h4>RG: <input type="text" name="rg" id="rg" /></h4>
                                <h4>Email: <input type="email" name="email" /></h4> -->
                            </div>
                            <!--FIM Assinatura-->

                            <button class="btn mt-2" type="reset">LIMPAR</button>
                            <button class="btn mt-2 btn-success" type="submit">ENVIAR</button>
        </form>

    </section>
    <section class="container-fluid">
        <div>

            <a href=menu.php><button class="btn btn-danger mt-2">VOLTAR</button></a>

        </div>
    </section>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>