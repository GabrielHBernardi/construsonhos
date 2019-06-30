<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css"/><?php include('head.php'); ?>

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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Visualizar serviço</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Visualizar serviço</li>
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
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="processEditService.php" method="post">
                  <input type="hidden" name="idServico" value="<?php echo $row['idServico']; ?>">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Tipo de serviço</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="tipoServico" disabled>
                      <option disabled>Selecione o tipo de serviço</option>
                      <option value="Construção" <?php if ($row['tipoServico'] == 'Construção') { echo "Selected"; } ?> >Construção</option>
                      <option value="Reforma" <?php if ($row['tipoServico'] == 'Reforma') { echo "Selected"; } ?> >Reforma</option>
                      <option value="Manutenção Elétrica" <?php if ($row['tipoServico'] == 'Manutenção Elétrica') { echo "Selected"; } ?> >Manutenção Elétrica</option>
                      <option value="Manutenção Hidráulica" <?php if ($row['tipoServico'] == 'Manutenção Hidráulica') { echo "Selected"; } ?> >Manutenção Hidráulica</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Data serviço</label>
                    <input id="reservation" type="text" class="form-control" name="dataServico" value="<?php echo $row['dataServico']; ?>" disabled />
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Status do serviço</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="statusServico" disabled>
                      <option disabled>Selecione o status do serviço</option>
                      <option value="Aguardando retorno da construtora" <?php if ($row['statusServico'] == 'Aguardando retorno da construtora') { echo "Selected"; } ?> >Aguardando retorno da construtora</option>
                      <option value="Aguardando aprovação do cliente" <?php if ($row['statusServico'] == 'Aguardando aprovação do cliente') { echo "Selected"; } ?> >Aguardando aprovação do cliente</option>
                      <option value="Aceito" <?php if ($row['statusServico'] == 'Aceito') { echo "Selected"; } ?> >Aceito</option>
                      <option value="Cancelado/Recusado" <?php if ($row['statusServico'] == 'Cancelado/Recusado') { echo "Selected"; } ?> >Cancelado/Recusado</option>
                      <option value="Em andamento" <?php if ($row['statusServico'] == 'Em andamento') { echo "Selected"; } ?> >Em andamento</option>
                      <option value="Concluído" <?php if ($row['statusServico'] == 'Concluído') { echo "Selected"; } ?> >Concluído</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Endereço</label>
                    <div style="display: flex;">
                      <input disabled type="text" class="form-control endereco" name="cepServico" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);" value="<?php echo $row['cepServico']; ?>">
                      <input disabled type="text" class="form-control endereco" name="estadoServico" id="estado" maxlength="2" placeholder="UF" value="<?php echo $row['estadoServico']; ?>">
                      <input disabled type="text" class="form-control endereco" name="cidadeServico" id="cidade" placeholder="Cidade" value="<?php echo $row['cidadeServico']; ?>">
                      <input disabled type="text" class="form-control endereco" name="bairroServico" id="bairro" placeholder="Bairro" value="<?php echo $row['bairroServico']; ?>">
                      <input disabled type="text" class="form-control endereco" name="ruaServico" id="rua" placeholder="Rua" value="<?php echo $row['ruaServico']; ?>">
                      <input disabled type="text" class="form-control endereco" name="numeroServico" placeholder="Nº" value="<?php echo $row['numeroServico']; ?>">
                    </div>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <?php
                      include "../config/conectionDB.php";

                      $services_items = [];

                      $query = "SELECT * FROM tb_item_servico WHERE idServico = $idServico";

                      $exec_query = mysqli_query($conexao, $query);

                      while($row = mysqli_fetch_assoc($exec_query)) {
                        $services_items[] = $row["descricaoItemServico"];
                      }
                    ?>
                    <header class="panel-heading">
                      Itens serviço
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;pointer-events: none;">
                      <input name="tagsinput" id="tagsinput" class="tagsinput" />
                    </div>
                  </section>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Materiais</label>

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

                    <table class="table">
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
                    <label for="exampleInputPassword1">Valor materiais</label>
                    <?php
                      $total_materiais = str_replace('.','', $total_materiais);
                    ?>
                    <input type="text" id="valorMaterialServico" class="form-control" name="valorMaoDeObraServico" disabled value="<?php echo $total_materiais; ?>"/>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor mão de obra</label>
                    <?php
                      $valorMaoDeObraServico = str_replace('.','', $valorMaoDeObraServico);
                    ?>
                    <input type="text" id="valorUnitario" class="form-control" name="valorMaoDeObraServico" disabled value="<?php echo $valorMaoDeObraServico; ?>"/>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor total do serviço</label>
                    <?php
                      $valorTotalServico = $valorMaoDeObraServico + $total_materiais;
                      $valorTotalServico = str_replace('.','', $valorTotalServico);
                    ?>
                    <input type="text" id="valorTotal" class="form-control" disabled value="<?php echo $valorTotalServico; ?>"/>
                  </div>
                  <div class="buttons">
                    <a class="btn btn-primary" href="/construsonhos/client/listService.php">Voltar</a>
                    <?php
                      $idServico_status = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

                      $query_status = "SELECT * FROM tb_servico WHERE idServico = '$idServico'";

                      $exec_query_status = mysqli_query($conexao, $query_status);

                      $row_status = mysqli_fetch_assoc($exec_query_status);
                      if ($row_status['statusServico'] != 'Concluído' && $row_status['statusServico'] != 'Aceito' && $row_status['statusServico'] != 'Em andamento' && $row_status['statusServico'] != 'Cancelado/Recusado') {
                    ?>
                    <a href="processCancelService.php?idServico=<?php echo $row_status['idServico']; ?>" data-confirm-cancel-service="Tem certeza que deseja cancelar o serviço selecionado?" class="btn btn-danger" href="#">Cancelar/Recusar</i></a>
                    <?php
                      }
                    ?>
                    <?php
                      $idServico_status_client = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

                      $query_status_client = "SELECT * FROM tb_servico WHERE idServico = '$idServico'";

                      $exec_query_status_client = mysqli_query($conexao, $query_status_client);

                      $row_status_client = mysqli_fetch_assoc($exec_query_status_client);
                      if ($row_status_client['statusServico'] == 'Aguardando aprovação do cliente') {
                    ?>
                    <a href="processAcceptService.php?idServico=<?php echo $row_status_client['idServico']; ?>" data-confirm-accept-service="Tem certeza que deseja aceitar o serviço/orçamento selecionado?" class="btn btn-success" href="#">Aceitar</a>
                    <?php
                      }
                    ?>
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

<script type="text/javascript">
  function limpa_formulário_cep() {
          //Limpa valores do formulário de cep.
          document.getElementById('rua').value=("");
          document.getElementById('bairro').value=("");
          document.getElementById('cidade').value=("");
          document.getElementById('estado').value=("");
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('rua').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.localidade);
          document.getElementById('estado').value=(conteudo.uf);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
  }
      
  function pesquisacep(valor) {

      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if(validacep.test(cep)) {

              //Preenche os campos com "..." enquanto consulta webservice.
              document.getElementById('rua').value="...";
              document.getElementById('bairro').value="...";
              document.getElementById('cidade').value="...";
              document.getElementById('estado').value="...";

              //Cria um elemento javascript.
              var script = document.createElement('script');

              //Sincroniza com o callback.
              script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);

          } //end if.
          else {
              //cep é inválido.
              limpa_formulário_cep();
              alert("Formato de CEP inválido.");
          }
      } //end if.
      else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
      }
  };
</script>