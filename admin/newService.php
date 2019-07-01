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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Cadastrar novo serviço</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Cadastrar novo serviço</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="processNewService.php" method="post"  enctype="multipart/form-data">
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
                          <option value="<?php echo $row_query['idCliente']; ?>"><?php echo $row_query['nomeCliente']; ?></option>
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
                      <option value="Manutenção Elétrica">Manutenção Elétrica</option>
                      <option value="Manutenção Hidráulica">Manutenção Hidráulica</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Data serviço</label>
                    <input id="reservation" type="text" class="form-control" name="dataServico" />
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Status do serviço</label>
                    <select style="margin-bottom: 0px;" class="form-control m-bot15" name="statusServico">
                      <option disabled selected>Selecione o status do serviço</option>
                      <option value="Aguardando retorno da construtora">Aguardando retorno da construtora</option>
                      <option value="Aguardando aprovação do cliente">Aguardando aprovação do cliente</option>
                      <option value="Aceito">Aceito</option>
                      <option value="Cancelado/Recusado">Cancelado/Recusado</option>
                      <option value="Em andamento">Em andamento</option>
                      <option value="Concluído">Concluído</option>
                    </select>
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Endereço</label>
                    <div style="display: flex;">
                      <input type="text" class="form-control endereco" name="cepServico" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);">
                      <input type="text" class="form-control endereco" name="estadoServico" id="estado" maxlength="2" placeholder="UF">
                      <input type="text" class="form-control endereco" name="cidadeServico" id="cidade" placeholder="Cidade">
                      <input type="text" class="form-control endereco" name="bairroServico" id="bairro" placeholder="Bairro">
                      <input type="text" class="form-control endereco" name="ruaServico" id="rua" placeholder="Rua">
                      <input type="text" class="form-control endereco" name="numeroServico" placeholder="Nº">
                    </div>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <header class="panel-heading">
                      Itens serviço
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;">
                      <input name="tagsinput" id="tagsinput" class="tagsinput" />
                    </div>
                  </section>


                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <header class="panel-heading">
                      Materiais
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;">
                      <div class="list-materiais">
                      <div class="add-new-material">
                        <select class="form-control m-bot15 valid" name="material_id[]">
                          <option value="0" selected disabled>Selecione o material...</option>
                          <?php
                            include "../config/conectionDB.php";

                            $query = "SELECT * FROM tb_material";

                            $exec_query2 = mysqli_query($conexao, $query);

                            while($row_query = mysqli_fetch_assoc($exec_query2)){
                          ?>
                            <option value="<?php echo $row_query['idMaterial']; ?>"><?php echo $row_query['nomeMaterial']; ?> ||| <?php $idFornecedorQuery = $row_query['idFornecedor']; $query_forn = "SELECT nomeFornecedor FROM tb_fornecedor WHERE idFornecedor=$idFornecedorQuery"; $exec_forn = mysqli_query($conexao, $query_forn); $row_query_forn = mysqli_fetch_assoc($exec_forn); echo $row_query_forn['nomeFornecedor']; ?> ||| R$ <?php echo number_format($row_query['valorUnitarioMaterial'], 2, ',', '.'); ?>
                            </option>
                          <?php
                            }
                        ?>
                        </select>
                        <input class="form-control valid" name="material_quantidade[]" type="text" placeholder="Quantidade" />
                      </div>
                    </div>
                    <button id="btn_add_material">Adicionar novo material</button>
                    </div>
                  </section>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Valor mão de obra</label>
                    <input type="text" id="valorUnitario" class="form-control" name="valorMaoDeObraServico"/>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;margin-bottom: 10px;">
                    <header class="panel-heading">
                      Imagens
                      <br/>
                      <strong>Anexe fotos das áreas a serem realizadas o serviço e coloque o seu tamanho em m²</strong>
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;">
                      <input type="file" name="arquivo[]" multiple required>
                    </div>
                  </section>
                  <button type="submit" class="btn btn-primary">Cadastrar novo serviço</button>
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