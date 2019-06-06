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
            <h3 class="page-header"><i class="fa fa-laptop"></i>Editar fornecedor</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Início</a></li>
              <li><i class="fa fa-laptop"></i>Editar fornecedor</li>
            </ol>
          </div>
        </div>

        <?php
          $idFornecedor = filter_input(INPUT_GET, 'idFornecedor', FILTER_SANITIZE_NUMBER_INT);

          $query = "SELECT * FROM tb_fornecedor WHERE idFornecedor = '$idFornecedor'";

          $exec_query = mysqli_query($conexao, $query);

          $row = mysqli_fetch_assoc($exec_query);
        ?>

        <div class="row">
          <div class="col-lg-6" style="width: 100%;">
            <section class="panel">
              <div class="panel-body">
                <form style="display: flex;flex-wrap: wrap;justify-content: space-between;" role="form" id="new-provider" action="processEditProvider.php" method="post">
                  <input type="hidden" name="idFornecedor" value="<?php echo $row['idFornecedor']; ?>">
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite o nome do fornecedor" value="<?php echo $row['nomeFornecedor']; ?>">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" class="form-control" name="telefone" placeholder="Digite o telefone" id="telefone" value="<?php echo $row['telefoneFornecedor']; ?>">
                  </div>
                  <div class="form-group inteira">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="Digite o e-mail" value="<?php echo $row['emailFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o CEP" onblur="pesquisacep(this.value);" value="<?php echo $row['cepFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Estado (UF)</label>
                    <input type="text" class="form-control" name="estado" id="estado" maxlength="2" placeholder="Digite o estado" value="<?php echo $row['estadoFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a cidade" value="<?php echo $row['cidadeFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro" value="<?php echo $row['bairroFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua" placeholder="Digite a rua" value="<?php echo $row['ruaFornecedor']; ?>">
                  </div>
                  <div class="form-group meia">
                    <label for="exampleInputPassword1">Número</label>
                    <input type="text" class="form-control" name="numero" placeholder="Digite o número" value="<?php echo $row['numeroFornecedor']; ?>">
                  </div>
                  <div class="buttons">
                    <button type="submit" class="btn btn-primary">Editar fornecedor</button>
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