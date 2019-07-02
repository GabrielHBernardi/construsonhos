<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    <?php include('header.php'); ?>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <?php include('sidebar.php'); ?>
        <!-- sidebar menu end-->
      </div>
      </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <?php
              if (isset($_SESSION['msgLogin'])) {
                  echo $_SESSION['msgLogin'];
                  unset($_SESSION['msgLogin']);
              }
            ?>
            <h3 class="page-header"><i class="fa fa-laptop"></i>Painel de controle</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Painel de controle</li>
            </ol>
          </div>
        </div>

        <?php $idCliente = $_SESSION["idCliente"]; ?>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg" style="background: #2f2fd8;">
              <i style="color: #ffffff !important;" class="fas fa-spinner"></i>
              <?php
                $servicos_emaberto_query = "SELECT count(*) as TotalServicosemaberto from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Aguardando retorno da construtora' OR statusServico = 'Aguardando aprovação do cliente'";
                $exec_servicos_emaberto_query = mysqli_query($conexao, $servicos_emaberto_query);
                $TotalServicosemaberto = mysqli_fetch_assoc($exec_servicos_emaberto_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><!-- <?php echo $TotalServicosemaberto['TotalServicosemaberto']; ?> -->0</div>
              <div style="color: #ffffff !important;" class="title">Serviços em aberto</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg" style="background: #ffcc00;">
              <i style="color: #ffffff !important;" class="fas fa-hourglass-half"></i>
              <?php
                $servicos_emandamento_query = "SELECT count(*) as TotalServicosemandamento from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Em andamento' OR statusServico = 'Aceito'";
                $exec_servicos_emandamento_query = mysqli_query($conexao, $servicos_emandamento_query);
                $TotalServicosemandamento = mysqli_fetch_assoc($exec_servicos_emandamento_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><!-- <?php echo $TotalServicosemandamento['TotalServicosemandamento']; ?> -->0</div>
              <div style="color: #ffffff !important;" class="title">Serviços em andamento</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg" style="background: #f70909;">
              <i style="color: #ffffff !important;" class="far fa-times-circle"></i>
              <?php
                $servicos_cancelado_query = "SELECT count(*) as TotalServicosCancelado from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Cancelado/Recusado'";
                $exec_servicos_cancelado_query = mysqli_query($conexao, $servicos_cancelado_query);
                $TotalServicosCancelado = mysqli_fetch_assoc($exec_servicos_cancelado_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><!-- <?php echo $TotalServicosCancelado['TotalServicosCancelado']; ?> -->0</div>
              <div style="color: #ffffff !important;" class="title">Serviços cancelados/recusados</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg"  style="background: #01a620;">
              <i style="color: #ffffff !important;" class="far fa-check-circle"></i>
              <?php
                $servicos_aberto_query = "SELECT count(*) as TotalServicosAbertos from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Concluído'";
                $exec_servicos_aberto_query = mysqli_query($conexao, $servicos_aberto_query);
                $TotalServicosAbertos = mysqli_fetch_assoc($exec_servicos_aberto_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><!-- <?php echo $TotalServicosAbertos['TotalServicosAbertos']; ?> -->0</div>
              <div style="color: #ffffff !important;" class="title">Serviços concluídos</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Meus serviços
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="fas fa-id-card-alt"></i> Código</th>
                    <!-- <th><i class="fas fa-users"></i> Cliente</th> -->
                    <th><i class="fas fa-wrench"></i> Tipo</th>
                    <!-- <th><i class="fas fa-map-marked-alt"></i> Endereço</th> -->
                    <!-- <th><i class="fas fa-calendar-alt"></i> Data</th> -->
                    <th><i class="fas fa-business-time"></i> Status</th>
                    <!-- <th><i class="fas fa-dollar-sign"></i> Valor mão de obra</th> -->
                    <th><i class="fas fa-clipboard-list"></i> Carta de cobrança</th>
                    <th><i class="fas fa-file-invoice-dollar"></i> Comprovante de pagamento</th>
                    <th><i class="fas fa-file-invoice-dollar"></i> Status do pagamento</th>
                    <th><i class="icon_cogs"></i> Visualizar</th>
                  </tr>
                  <?php
                    $idCliente = $_SESSION['idCliente'];
                    $query = "SELECT * FROM tb_servico WHERE idCliente =  $idCliente";
                    $exec_query = mysqli_query($conexao, $query);
                    while($row = mysqli_fetch_assoc($exec_query)){
                  ?>
                  <tr>
                    <td><?php echo $row['idServico']; ?></td>
                    <!-- <td>
                      <?php
                          include "../config/conectionDB.php";

                          $idCliente = $row['idCliente'];

                          $query_cliente = "SELECT * FROM tb_cliente WHERE idCliente = $idCliente";

                          $exec_query_cliente = mysqli_query($conexao, $query_cliente);

                          $row_query = mysqli_fetch_assoc($exec_query_cliente);

                          echo $row_query['nomeCliente'];
                        ?>
                    </td> -->
                    <td><?php echo $row['tipoServico']; ?></td>
                    <!-- <td style="max-width: 250px;"><?php echo $row['ruaServico']; ?> - <?php echo $row['numeroServico']; ?> - <?php echo $row['bairroServico']; ?> - <?php echo $row['cidadeServico']; ?> / <?php echo $row['estadoServico']; ?> | <?php echo $row['cepServico']; ?></td> -->
                    <!-- <td><?php echo $row['dataServico']; ?></td> -->
                    <td><?php echo $row['statusServico']; ?></td>
                    <!-- <td><?php echo 'R$ ' . number_format($row['valorMaoDeObraServico'], 2, ',', '.'); ?></td> -->
                    <td>
                      <?php
                        if ($row['statusServico'] == 'Concluído') {
                      ?>
                        <div class="btn-group align">
                          <div style="display: flex; flex-direction: column; justify-content: center;">
                            <a class="btn btn-primary blue" href="newCollectionLetter.php?idServico=<?php echo $row['idServico']; ?>"><i class="fas fa-eye"></i></a>
                          </div>
                        </div>
                      <?php
                        }
                      ?>
                    </td>
                    <td>
                      <div class="btn-group align" style="margin-left: 30px;">
                        <?php
                          if ($row['statusServico'] == 'Concluído') {
                        ?>
                        <a class="btn btn-primary green" href="newVoucher.php?idServico=<?php echo $row['idServico']; ?>"><i class="fas fa-paperclip"></i></a>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row['comprovantePagamentoServico'] != '') {
                        ?>
                          <a class="btn btn-primary blue" target="_blank" href="/construsonhos/comprovantes/<?php echo $row['comprovantePagamentoServico']; ?>"><i class="fas fa-eye"></i></a>
                        <?php
                          }
                        ?>
                      </div>
                    </td>
                    <td><?php echo $row['statusPagamentoServico']; ?></td>
                    <td>
                      <div class="btn-group align" style="margin-left: 30px;">
                        <a href="viewService.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-primary blue" href="#"><i class="fas fa-eye"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <?php include('footer.php'); ?>

</body>

</html>
