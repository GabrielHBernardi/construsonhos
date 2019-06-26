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
                $servicos_emandamento_query = "SELECT count(*) as TotalServicosemandamento from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Em andamento' OR statusServico = 'Aceito'";
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
                $servicos_cancelado_query = "SELECT count(*) as TotalServicosCancelado from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Cancelado/Recusado'";
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
                $servicos_aberto_query = "SELECT count(*) as TotalServicosAbertos from tb_servico WHERE idCliente = $idCliente AND statusServico = 'Concluído'";
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
                Meus serviços
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_pin_alt"></i> City</th>
                    <th><i class="icon_mobile"></i> Mobile</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <tr>
                    <td>Angeline Mcclain</td>
                    <td>2004-07-06</td>
                    <td>dale@chief.info</td>
                    <td>Rosser</td>
                    <td>176-026-5992</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="far fa-eye"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Angeline Mcclain</td>
                    <td>2004-07-06</td>
                    <td>dale@chief.info</td>
                    <td>Rosser</td>
                    <td>176-026-5992</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="far fa-eye"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
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
