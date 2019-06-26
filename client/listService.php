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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Meus serviços</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Meus serviços</li>
            </ol>
          </div>
        </div>

        <div id="msgs-edit-provider">
            <?php
              if (isset($_SESSION['msgNewProvider'])) {
                  echo $_SESSION['msgNewProvider'];
                  unset($_SESSION['msgNewProvider']);
              }
            ?>
          </div>

          <style type="text/css">
            #msgs-new-provider {
              margin-top: 0px !important;
              height: auto !important;
            }
          </style>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">

          <div class="row">
          <div class="col-lg-12">
            <section class="panel" style="margin-bottom: 0px;">
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
                        <a href="editService.php?idServico=<?php echo $row['idServico']; ?>" class="btn btn-primary green" href="#"><i class="fas fa-paperclip"></i></a>
                        <?php
                          }
                        ?>
                        <?php
                          if ($row['comprovantePagamentoServico'] != '') {
                        ?>
                          <a class="btn btn-primary blue" href="newCollectionLetter.php?idServico=<?php echo $row['idServico']; ?>"><i class="fas fa-eye"></i></a>
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