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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Anexar comprovante de pagamento</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Anexar comprovante de pagamento</li>
            </ol>
          </div>
        </div>

        <?php
          $idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

          $query = "SELECT * FROM tb_servico WHERE idServico = '$idServico'";

          $exec_query = mysqli_query($conexao, $query);

          $row = mysqli_fetch_assoc($exec_query);

          $valorMaoDeObraServico = $row['valorMaoDeObraServico'];
        ?>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" action="processNewVoucher.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="idServico" value="<?php echo $row['idServico']; ?>">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Tipo de serviço: <?php echo $row['tipoServico']; ?></label>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Data do serviço: <?php echo $row['dataServico']; ?></label>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Status do serviço: <?php echo $row['statusServico']; ?></label>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Endereço: <?php echo $row['ruaServico']; ?>, <?php echo $row['numeroServico']; ?> - <?php echo $row['bairroServico']; ?> - <?php echo $row['cidadeServico']; ?> / <?php echo $row['estadoServico']; ?></label>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <header class="panel-heading">
                      Itens serviço
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;pointer-events: none;">
                      <?php
                        $query_itens_servico = "SELECT * FROM tb_item_servico WHERE idServico = $idServico";
                        $exec_query_itens_servico = mysqli_query($conexao, $query_itens_servico);
                        while($row_itens_servico = mysqli_fetch_assoc($exec_query_itens_servico)) {
                          echo "<li style='font-size: 14px;font-weight: 900;'>" . $row_itens_servico["descricaoItemServico"] . "</li>";
                        }
                      ?>
                    </div>
                  </section>
                  <div class="form-group inteira">
                    <?php
                        include "../config/conectionDB.php";

                        $sql = "SELECT ms.quantidadeTotalMateriais as qtd, m.nomeMaterial as nome_material, m.valorUnitarioMaterial as preco, f.nomeFornecedor FROM tb_materiais_servico ms
                        INNER JOIN tb_material m ON m.idMaterial = ms.idMaterial
                        INNER JOIN tb_fornecedor f ON f.idFornecedor = m.idFornecedor
                        WHERE ms.idServico = $idServico";

                        $query = mysqli_query($conexao, $sql);

                        $materiais = [];

                        while($row = mysqli_fetch_assoc($query)) {
                            $materiais[] = $row;
                        }

                        $total_materiais = 0;
                        foreach($materiais as $key => &$mat) {
                            $mat["total"] = $mat["preco"] * $mat["qtd"];
                            $total_materiais += $mat["total"];
                        }
                    ?>

                    <table class="table" style="margin-bottom: 0px;">
                      <thead>
                          <tr>
                              <th>Nome material</th>
                              <th>Quantidade</th>
                              <th>Fornecedor</th>
                              <th>Preço unitário</th>
                              <th>Total do item</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            foreach ($materiais as $key => $material) { ?>
                                <tr>
                                    <td><?php echo $material["nome_material"]; ?></td>
                                    <td><?php echo $material["qtd"]; ?></td>
                                    <td><?php echo $material["nomeFornecedor"]; ?></td>
                                    <td><?php echo 'R$ ' . number_format($material["preco"], 2, ',', '.'); ?></td>
                                    <td><?php echo 'R$ ' . number_format($material["total"], 2, ',', '.'); ?></td>
                                </tr>
                            <?php }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor materiais: <?php echo number_format($total_materiais, 2, ',', '.'); ?></label>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor mão de obra: <?php echo number_format($valorMaoDeObraServico, 2, ',', '.'); ?></label>
                  </div>
                  <div class="form-group inteira">
                    <?php
                      $valorTotalServico = $valorMaoDeObraServico + $total_materiais;
                    ?>
                    <label for="exampleInputPassword1">Valor total do serviço: <?php echo number_format($valorTotalServico, 2, ',', '.'); ?></label>
                  </div>
                  <div class="form-group inteira">
                    <input type="file" name="arquivo" required>
                  </div>
                  <div class="buttons">
                    <button type="submit" class="btn btn-primary">Anexar comprovante</button>
                  </div>
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