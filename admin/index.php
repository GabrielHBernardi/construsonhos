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
              if (isset($_SESSION['msgLoginAdmin'])) {
                  echo $_SESSION['msgLoginAdmin'];
                  unset($_SESSION['msgLoginAdmin']);
              }
            ?>
            <h3 class="page-header"><i class="fa fa-laptop"></i>Painel de controle</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Painel de controle</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg" style="background: #2f2fd8;">
              <i style="color: #ffffff !important;" class="fas fa-spinner"></i>
              <?php
                $servicos_emaberto_query = "SELECT count(*) as TotalServicosemaberto from tb_servico WHERE statusServico = 'Aguardando retorno da construtora' OR statusServico = 'Aguardando aprovação do cliente'";
                $exec_servicos_emaberto_query = mysqli_query($conexao, $servicos_emaberto_query);
                $TotalServicosemaberto = mysqli_fetch_assoc($exec_servicos_emaberto_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><?php echo $TotalServicosemaberto['TotalServicosemaberto']; ?></div>
              <div style="color: #ffffff !important;" class="title">Serviços em aberto</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg" style="background: #ffcc00;">
              <i style="color: #ffffff !important;" class="fas fa-hourglass-half"></i>
              <?php
                $servicos_emandamento_query = "SELECT count(*) as TotalServicosemandamento from tb_servico WHERE statusServico = 'Em andamento' OR statusServico = 'Aceito'";
                $exec_servicos_emandamento_query = mysqli_query($conexao, $servicos_emandamento_query);
                $TotalServicosemandamento = mysqli_fetch_assoc($exec_servicos_emandamento_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><?php echo $TotalServicosemandamento['TotalServicosemandamento']; ?></div>
              <div style="color: #ffffff !important;" class="title">Serviços em andamento</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg" style="background: #f70909;">
              <i style="color: #ffffff !important;" class="far fa-times-circle"></i>
              <?php
                $servicos_cancelado_query = "SELECT count(*) as TotalServicosCancelado from tb_servico WHERE statusServico = 'Cancelado/Recusado'";
                $exec_servicos_cancelado_query = mysqli_query($conexao, $servicos_cancelado_query);
                $TotalServicosCancelado = mysqli_fetch_assoc($exec_servicos_cancelado_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><?php echo $TotalServicosCancelado['TotalServicosCancelado']; ?></div>
              <div style="color: #ffffff !important;" class="title">Serviços cancelados/recusados</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg"  style="background: #01a620;">
              <i style="color: #ffffff !important;" class="far fa-check-circle"></i>
              <?php
                $servicos_aberto_query = "SELECT count(*) as TotalServicosAbertos from tb_servico WHERE statusServico = 'Concluído'";
                $exec_servicos_aberto_query = mysqli_query($conexao, $servicos_aberto_query);
                $TotalServicosAbertos = mysqli_fetch_assoc($exec_servicos_aberto_query);
              ?>
              <div style="color: #ffffff !important;" class="count"><?php echo $TotalServicosAbertos['TotalServicosAbertos']; ?></div>
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
                Serviços em aberto
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="fas fa-id-card-alt"></i> Código</th>
                    <th><i class="fas fa-users"></i> Cliente</th>
                    <th><i class="fas fa-wrench"></i> Tipo</th>
                    <!-- <th><i class="fas fa-map-marked-alt"></i> Endereço</th> -->
                    <!-- <th><i class="fas fa-calendar-alt"></i> Data</th> -->
                    <th><i class="fas fa-business-time"></i> Status</th>
                    <!-- <th><i class="fas fa-dollar-sign"></i> Valor mão de obra</th> -->
                    <th><i class="fas fa-clipboard-list"></i> Carta de cobrança</th>
                    <th><i class="fas fa-file-invoice-dollar"></i> Comprovante de pagamento</th>
                    <th><i class="fas fa-file-invoice-dollar"></i> Status do pagamento</th>
                    <th><i class="icon_cogs"></i> Editar/Excluir</th>
                  </tr>
                  <?php
                    $query = "SELECT * FROM tb_servico";
                    $exec_query = mysqli_query($conexao, $query);
                    while($row = mysqli_fetch_assoc($exec_query)){
                  ?>
                  <tr>
                    <td><?php echo $row['idServico']; ?></td>
                    <td>
                      <?php
                          include "../config/conectionDB.php";

                          $idCliente = $row['idCliente'];

                          $query_cliente = "SELECT * FROM tb_cliente WHERE idCliente = $idCliente";

                          $exec_query_cliente = mysqli_query($conexao, $query_cliente);

                          $row_query = mysqli_fetch_assoc($exec_query_cliente);

                          echo $row_query['nomeCliente'];
                        ?>
                    </td>
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
                          if ($row['comprovantePagamentoServico'] != '') {
                        ?>
                          <a class="btn btn-primary blue" target="_blank" href="/construsonhos/comprovantes/<?php echo $row['comprovantePagamentoServico']; ?>"><i class="fas fa-eye"></i></a>
                        <?php
                          }
                        ?>
                      </div>
                    </td>
                    <td>
                    <?php
                    if ($row['statusPagamentoServico'] == 'Recusado') { ?>
                      <span style="color: #ff2d55;"><?php echo $row['statusPagamentoServico']; ?></span>
                    <?php } else if ($row['statusPagamentoServico'] == 'Aprovado') { ?>
                      <span style="color: #4cd964;"><?php echo $row['statusPagamentoServico']; ?></span>
                    <?php } ?>
                    <?php echo " "; ?>
                    <?php
                      if ($row['statusServico'] == 'Concluído' && $row['statusPagamentoServico'] == 'Aprovado') {
                    ?>
                    <a href="processPaymentDeclined.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                    <?php
                      } else if ($row['statusServico'] == 'Concluído' && $row['statusPagamentoServico'] == 'Recusado') {
                    ?>
                    <a href="processPaymentAccepted.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-success"><i class="icon_check_alt2"></i></a>
                    <?php
                      } else if ($row['statusServico'] == 'Concluído' && $row['statusPagamentoServico'] == 'Em análise') {
                    ?>
                    <a href="processPaymentDeclined.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                    <a href="processPaymentAccepted.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-success"><i class="icon_check_alt2"></i></a>
                    <?php
                      }
                    ?>
                    </td>
                    <td>
                      <div class="btn-group align">
                        <a href="editService.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-primary yellow" href="#"><i class="fas fa-pencil-alt"></i></a>
                        <a href="processDeleteService.php?idServico=<?php echo $row['idServico']; ?>" data-confirm-service="Tem certeza que deseja excluir o serviço selecionado?" class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
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

    <script>
      setTimeout(function () {
        $('.msgLoginAdmin').hide();
      }, 5000);
    </script>

</body>

</html>
