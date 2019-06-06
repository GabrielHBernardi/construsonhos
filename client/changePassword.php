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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Alterar senha</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Alterar senha</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <header class="panel-heading">
                Alterar senha
              </header>
              <div class="panel-body">
                <form role="form" id="change-password-client" action="processChangePassword.php" method="post">
                  <input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCliente'] ?>">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Senha atual</label>
                    <input type="password" class="form-control" name="senha_atual" id="exampleInputPassword1" placeholder="Digite sua senha atual" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Nova senha</label>
                    <input type="password" class="form-control" name="nova_senha" id="exampleInputPassword2" placeholder="Digite sua nova senha">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword3">Confirmar nova senha</label>
                    <input type="password" class="form-control" name="confirmar_nova_senha" id="exampleInputPassword3" placeholder="Confirme sua nova senha" onblur="validarSenha()">
                  </div>
                  <button type="submit" class="btn btn-primary">Alterar senha</button>
                  <div id="msgs-change-password">
                    <?php
                      if (isset($_SESSION['msgPassword'])) {
                          echo $_SESSION['msgPassword'];
                          unset($_SESSION['msgPassword']);
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
