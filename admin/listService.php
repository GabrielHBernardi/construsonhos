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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar serviços</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Listar serviços</li>
            </ol>
          </div>
        </div>

        <div id="msgs-edit-provider">
            <?php
              if (isset($_SESSION['msgEditProvider'])) {
                  echo $_SESSION['msgEditProvider'];
                  unset($_SESSION['msgEditProvider']);
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
                    <th><i class="fas fa-users"></i> Cliente</th>
                    <th><i class="fas fa-wrench"></i> Tipo</th>
                    <th><i class="fas fa-map-marked-alt"></i> Endereço</th>
                    <th><i class="fas fa-calendar-alt"></i> Data</th>
                    <th><i class="fas fa-business-time"></i> Status</th>
                    <th><i class="fas fa-ruler-combined"></i> Metros quadrados</th>
                    <th><i class="fas fa-dollar-sign"></i> Valor mão de obra</th>
                    <th><i class="fas fa-clipboard-list"></i> Carta de cobrança</th>
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
                    <td style="max-width: 250px;"><?php echo $row['ruaServico']; ?> - <?php echo $row['numeroServico']; ?> - <?php echo $row['bairroServico']; ?> - <?php echo $row['cidadeServico']; ?> / <?php echo $row['estadoServico']; ?> | <?php echo $row['cepServico']; ?></td>
                    <td><?php echo $row['dataServico']; ?></td>
                    <td><?php echo $row['statusServico']; ?></td>
                    <td><?php echo $row['metroQuadradoServico']; ?></td>
                    <td><?php echo 'R$ ' . number_format($row['valorMaoDeObraServico'], 2, ',', '.'); ?></td>
                    <td>
                      <div class="btn-group align">
                        <div style="display: flex; flex-direction: column; justify-content: center;">
                          <p style="font-weight: bold;margin: 0px;">Gerar</p>
                          <a class="btn btn-primary blue" href="#"><i class="fas fa-paper-plane"></i></a>
                        </div>
                        <div style="display: flex; flex-direction: column; justify-content: center;">
                          <p style="font-weight: bold;margin: 0px;">Gerada</p>
                          <a class="btn btn-primary blue" href="#"><i class="fas fa-eye"></i></a>
                        </div>
                      </div>
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

</body>

</html>