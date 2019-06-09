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
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="teste.php" method="post">
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
                      <option disabled selected>Selecione o tipo de serviço</option>
                      <option value="Construção">Construção</option>
                      <option value="Reforma">Reforma</option>
                      <option value="Manutenção elétrica">Manutenção elétrica</option>
                      <option value="Manutenção hidráulica">Manutenção hidráulica</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Endereço</label>
                    <div style="display: flex;">
                      <input type="text" class="form-control endereco" name="endereco[]" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);">
                      <input type="text" class="input-align-endereco" name="endereco[]" value=" - " readonly="readonly">
                      <input type="text" class="form-control endereco" name="endereco[]" id="estado" maxlength="2" placeholder="UF">
                      <input type="text" class="input-align-endereco" name="endereco[]" value=" - ">
                      <input type="text" class="form-control endereco" name="endereco[]" id="cidade" placeholder="Cidade">
                      <input type="text" class="input-align-endereco" name="endereco[]" value=" - ">
                      <input type="text" class="form-control endereco" name="endereco[]" id="bairro" placeholder="Bairro">
                      <input type="text" class="input-align-endereco" name="endereco[]" value=" - ">
                      <input type="text" class="form-control endereco" name="endereco[]" id="rua" placeholder="Rua">
                      <input type="text" class="input-align-endereco" name="endereco[]" value=" - ">
                      <input type="text" class="form-control endereco" name="endereco[]" placeholder="Nº">
                    </div>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Data serviço</label>
                    <input id="reservation" type="text" class="form-control" name="dataServico" />
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