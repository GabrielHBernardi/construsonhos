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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Cadastrar novo serviço / Solicitar orçamento</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Cadastrar novo serviço / Solicitar orçamento</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="processNewService.php" method="post">
                  <?php
                    include "../config/conectionDB.php";
                    
                    $idCliente = $_SESSION['idCliente'];

                    $query = "SELECT * FROM tb_cliente WHERE idCliente = '$idCliente'";

                    $exec_query = mysqli_query($conexao, $query);

                    $row_query = mysqli_fetch_assoc($exec_query);
                  ?>
                  <input type="hidden" name="idCliente" value="<?php echo $row_query['idCliente'] ?>">
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
                      Itens serviço (Incluir o metro quadrado de cada área)
                      <br/>
                      <strong>Exemplo: Reformar a cozinha + Reformar o banheiro + Fazer uma churrasqueira</strong>
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;padding: 5px;">
                      <input name="tagsinput" id="tagsinput" class="tagsinput" />
                    </div>
                  </section>
                  <button type="submit" class="btn btn-primary">Solicitar orçamento</button>
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