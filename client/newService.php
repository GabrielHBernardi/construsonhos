<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    <?php include('header.php'); ?>
    <!--header end-->

    <?php
      include "../config/conectionDB.php";
      
      $idCliente = $_SESSION['idCliente'];

      $query = "SELECT * FROM tb_cliente WHERE idCliente = '$idCliente'";

      $exec_query = mysqli_query($conexao, $query);

      $row_query = mysqli_fetch_assoc($exec_query);
    ?>

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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Registrar novo serviço</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Registrar novo serviço</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <header class="panel-heading">
                Registrar novo serviço
              </header>
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-service" action="processNewService.php" method="post">
                  <input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Tipo de serviço</label>
                    <select class="form-control m-bot15">
                      <option>Construção</option>
                      <option>Manutenção elétrica</option>
                      <option>Manutenção hidráulica</option>
                      <option>Manutenção elétrica e hidráulica</option>
                      <option>Reforma</option>
                    </select>
                  </div>
                  <section class="panel" style="width: 100%;border-top: 1px solid #ccc;">
                    <header class="panel-heading">
                      Quais são os itens a serem feitos? (Checklist)
                    </header>
                    <div class="panel-body" style="border-width: 1px 1px 1px;">
                      <input name="tagsinput" id="tagsinput" class="tagsinput"/>
                    </div>
                  </section>
                  <p class="help-block" style="width: 100%;">Qual é o endereço?</p>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite seu CEP" onblur="pesquisacep(this.value);">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Estado (UF)</label>
                    <input type="text" class="form-control" name="estado" id="estado" maxlength="2" placeholder="Digite seu estado">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite sua cidade">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite seu bairro">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua" placeholder="Digite sua rua">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Número</label>
                    <input type="text" class="form-control" name="numero" placeholder="Digite seu número">
                  </div>
                  <button type="submit" class="btn btn-primary">Registrar novo serviço</button>
                  <div id="msgs-my-account">
                    <?php
                      if (isset($_SESSION['msgNewService'])) {
                          echo $_SESSION['msgNewService'];
                          unset($_SESSION['msgNewService']);
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