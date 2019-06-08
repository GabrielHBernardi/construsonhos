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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Listar clientes</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Listar clientes</li>
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
                    <th><i class="icon_profile"></i> Nome</th>
                    <th><i class="fas fa-id-card"></i> CPF</th>
                    <th><i class="fas fa-phone"></i> Telefone</th>
                    <th><i class="fas fa-envelope"></i> E-mail</th>
                    <th><i class="icon_cogs"></i> Editar/Excluir</th>
                  </tr>
                  <?php
                    $query = "SELECT * FROM tb_cliente";
                    $exec_query = mysqli_query($conexao, $query);
                    while($row = mysqli_fetch_assoc($exec_query)){
                  ?>
                  <tr>
                    <td><?php echo $row['idCliente']; ?></td>
                    <td><?php echo $row['nomeCliente']; ?></td>
                    <td><?php echo $row['cpfCliente']; ?></td>
                    <td><?php echo $row['telefoneCliente']; ?></td>
                    <td><?php echo $row['emailCliente']; ?></td>
                    <td>
                      <div class="btn-group align">
                        <a href="editClient.php?idCliente=<?php echo $row['idCliente']; ?>" class="btn btn-primary yellow" href="#"><i class="fas fa-pencil-alt"></i></a>
                        <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                        <a href="processDeleteClient.php?idCliente=<?php echo $row['idCliente']; ?>" data-confirm-client="Tem certeza que deseja excluir o cliente selecionado?" class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
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