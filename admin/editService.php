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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Editar serviço</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Editar serviço</li>
            </ol>
          </div>
        </div>

        <?php
          $idServico = filter_input(INPUT_GET, 'idServico', FILTER_SANITIZE_NUMBER_INT);

          $query = "SELECT * FROM tb_servico WHERE idServico = '$idServico'";

          $exec_query = mysqli_query($conexao, $query);

          $row = mysqli_fetch_assoc($exec_query);
        ?>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="processEditService.php" method="post">
                  <input type="hidden" name="idServico" value="<?php echo $row['idServico']; ?>">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Cliente</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="idCliente">
                        <option disabled selected>Selecione um cliente</option>
                        <?php
                          include "../config/conectionDB.php";

                          $query = "SELECT * FROM tb_cliente";

                          $exec_query = mysqli_query($conexao, $query);

                          while($row_query = mysqli_fetch_assoc($exec_query)){
                        ?>
                          <option value="<?php echo $row_query['idCliente']; ?>" <?php if ($row_query['idCliente'] == $row['idCliente']) { echo "Selected"; } ?> ><?php echo $row_query['nomeCliente']; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Tipo de serviço</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="tipoServico">
                      <option disabled>Selecione o tipo de serviço</option>
                      <option value="Construção" <?php if ($row['tipoServico'] == 'Construção') { echo "Selected"; } ?> >Construção</option>
                      <option value="Reforma" <?php if ($row['tipoServico'] == 'Reforma') { echo "Selected"; } ?> >Reforma</option>
                      <option value="Manutenção Elétrica" <?php if ($row['tipoServico'] == 'Manutenção Elétrica') { echo "Selected"; } ?> >Manutenção Elétrica</option>
                      <option value="Manutenção Hidráulica" <?php if ($row['tipoServico'] == 'Manutenção Hidráulica') { echo "Selected"; } ?> >Manutenção Hidráulica</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Data serviço</label>
                    <input id="reservation" type="text" class="form-control" name="dataServico" value="<?php echo $row['dataServico']; ?>" />
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Status do serviço</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="statusServico">
                      <option disabled>Selecione o status do serviço</option>
                      <option value="Aguardando aprovação" <?php if ($row['statusServico'] == 'Aguardando aprovação') { echo "Selected"; } ?> >Aguardando aprovação</option>
                      <option value="Aceito" <?php if ($row['statusServico'] == 'Aceito') { echo "Selected"; } ?> >Aceito</option>
                      <option value="Cancelado/Recusado" <?php if ($row['statusServico'] == 'Cancelado/Recusado') { echo "Selected"; } ?> >Cancelado/Recusado</option>
                      <option value="Em andamento" <?php if ($row['statusServico'] == 'Em andamento') { echo "Selected"; } ?> >Em andamento</option>
                      <option value="Concluído" <?php if ($row['statusServico'] == 'Concluído') { echo "Selected"; } ?> >Concluído</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Endereço</label>
                    <div style="display: flex;">
                      <input type="text" class="form-control endereco" name="cepServico" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);" value="<?php echo $row['cepServico']; ?>">
                      <input type="text" class="form-control endereco" name="estadoServico" id="estado" maxlength="2" placeholder="UF" value="<?php echo $row['estadoServico']; ?>">
                      <input type="text" class="form-control endereco" name="cidadeServico" id="cidade" placeholder="Cidade" value="<?php echo $row['cidadeServico']; ?>">
                      <input type="text" class="form-control endereco" name="bairroServico" id="bairro" placeholder="Bairro" value="<?php echo $row['bairroServico']; ?>">
                      <input type="text" class="form-control endereco" name="ruaServico" id="rua" placeholder="Rua" value="<?php echo $row['ruaServico']; ?>">
                      <input type="text" class="form-control endereco" name="numeroServico" placeholder="Nº" value="<?php echo $row['numeroServico']; ?>">
                    </div>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <header class="panel-heading">
                      Itens serviço (checklist)
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;">
                      <input name="tagsinput" id="tagsinput" class="tagsinput" />
                    </div>
                  </section>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Quantidade de metros quadrados</label>
                    <input type="text" class="form-control" name="metroQuadradoServico" value="<?php echo $row['metroQuadradoServico']; ?>"/>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor mão de obra</label>
                    <input type="text" id="valorUnitario" class="form-control" name="valorMaoDeObraServico" value="<?php echo $row['valorMaoDeObraServico']; ?>"/>
                  </div>
                  <div class="buttons">
                    <button type="submit" class="btn btn-primary">Editar serviço</button>
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