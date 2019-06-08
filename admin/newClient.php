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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Cadastrar novo cliente</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Cadastrar novo cliente</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-client" action="processNewClient.php" method="post">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" class="form-control" name="nomeCliente" placeholder="Digite o nome do cliente">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">CPF</label>
                    <input type="text" class="form-control" name="cpfCliente" placeholder="Digite o CPF" id="cpf">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" class="form-control" name="telefoneCliente" placeholder="Digite o telefone" id="telefone">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="text" class="form-control" name="emailCliente" placeholder="Digite o e-mail">
                  </div>
                  <button type="submit" class="btn btn-primary">Cadastrar novo cliente</button>
                  <div id="msgs-new-provider">
                    <?php
                      if (isset($_SESSION['msgNewProvider'])) {
                          echo $_SESSION['msgNewProvider'];
                          unset($_SESSION['msgNewProvider']);
                      }
                    ?>
                  </div>
                </form>
              </div>
            </section>
          </div>
        
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <?php include('footer.php'); ?>

</body>

</html>