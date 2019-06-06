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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Cadastrar novo material</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Cadastrar novo material</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-material" action="processNewMaterial.php" method="post">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" class="form-control" name="nomeMaterial" placeholder="Digite o nome do material">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Marca</label>
                    <input type="text" class="form-control" name="marcaMaterial" placeholder="Digite a marca do material">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Fornecedor</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="idFornecedor">
                        <option disabled selected>Selecione um fornecedor</option>
                        <?php
                          include "../config/conectionDB.php";

                          $query = "SELECT * FROM tb_fornecedor";

                          $exec_query = mysqli_query($conexao, $query);

                          while($row_query = mysqli_fetch_assoc($exec_query)){
                        ?>
                          <option value="<?php echo $row_query['idFornecedor']; ?>"><?php echo $row_query['nomeFornecedor']; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor unitário</label>
                    <input type="text" class="form-control" name="valorUnitarioMaterial" id="valorUnitario" placeholder="Digite o valor unitário do material">
                  </div>
                  <button type="submit" class="btn btn-primary">Cadastrar novo material</button>
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