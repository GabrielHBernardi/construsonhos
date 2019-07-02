<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Construsonhos</title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="assets/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/css/style.css" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<?php
	if(isset($_GET['modalName'])) {
	    if ($_GET["modalName"] == "myModalLogin") {
	    	echo "<script>
					$().ready(function() {
						$(window).load(function(){
					 		$('#myModalLogin').modal('show');
						});
						setTimeout(function () {
							$('.msgLogin').hide();
						}, 5000);
						setTimeout(function () {
							$('.msgLoginFail').hide();
						}, 5000);
					});
				</script>";
	    } else if ($_GET["modalName"] == "myModalRegister") {
	    	echo "<script>
				$(window).load(function(){
			 		$('#myModalRegister').modal('show');
				});
				setTimeout(function () {
					$('.msgRegister').hide();
				}, 5000);
			</script>";
	    } else if ($_GET["modalName"] == "myModalLoginAdmin") {
	    	echo "<script>
				$().ready(function() {
					$(window).load(function(){
				 		$('#myModalLoginAdmin').modal('show');
					});
					setTimeout(function () {
						$('.msgLoginAdmin').hide();
					}, 5000);
					setTimeout(function () {
						$('.msgLoginFailAdmin').hide();
					}, 5000);
				});
			</script>";
	    } else if ($_GET["modalName"] == "myModalFirstPassword") {
	    	echo "<script>
				$().ready(function() {
					$(window).load(function(){
				 		$('#myModalFirstPassword').modal('show');
					});
					setTimeout(function () {
						$('.msgLogin').hide();
					}, 5000);
					setTimeout(function () {
						$('.msgLoginFail').hide();
					}, 5000);
				});
			</script>";
	    }
	}
?>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('assets/img/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="/construsonhos/">
							<img class="logo" src="assets/img/logo.png" alt="logo">
							<img class="logo-alt" src="assets/img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#myModalLogin" data-toggle="modal">Login</a><li>
					<li><a href="#myModalRegister" data-toggle="modal">Cadastre-se</a></a><li>
					<li><a href="#myModalLoginAdmin" data-toggle="modal">Área administrativa</a><li>
					<!-- <li><a href="#pricing">Prices</a></li>
					<li><a href="#team">Team</a></li>
					<li class="has-dropdown"><a href="#blog">Blog</a>
						<ul class="dropdown">
							<li><a href="blog-single.html">blog post</a></li>
						</ul>
					</li>
					<li><a href="#contact">Contact</a></li> -->
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">Construtora Construsonhos</h1>
							<p style="font-size: 22px;" class="white-text">Do alicerce ao acabamento.
							</p>
							<a href="#myModalLogin" data-toggle="modal"><button class="main-btn">Solicite seu orçamento</button></a>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- About -->
	<div id="about" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Nossos serviços</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-building"></i>
						<h3>Construção civil</h3>
						<p>Executando obras comerciais, industriais e residenciais com projetos próprios e terceirizados, a empresa Construsonhos se apresenta como grande fornecedora de serviços de construção civil.</p>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-hammer"></i>
						<h3>Reformas em geral</h3>
						<p>Trabalhamos com Reforma em geral e Serviços de Acabamento, assentamento de pisos, limpeza e ajustes necessários em alvenaria.</p>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-wrench"></i>
						<h3>Rede hidráulica</h3>
						<p>Realizamos toda a manutenção e instalação da rede elétrica juntamente com o processo de montagem, ajuste, instalação e reparo de condutos como: encanamentos, tubulações, etc.</p>
					</div>
				</div>
				<!-- /about -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->


	<!-- Portfolio -->
	<div id="portfolio" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Últimos trabalhos</h2>
				</div>
				<!-- /Section header -->

				<div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
					<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work1.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work1.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work2.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work2.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work3.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work3.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work4.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work4.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work5.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work5.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="assets/img/work6.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<div class="work-link">
							<a class="lightbox" href="assets/img/work6.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->
				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Portfolio -->

	<!-- Service -->
	
	<!-- /Service -->


	<!-- Why Choose Us -->
	
	<!-- /Why Choose Us -->


	<!-- Numbers -->
	<div id="numbers" class="section sm-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('assets/img/background2.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row" style="display: flex;justify-content: center;">

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-users"></i>
						<h3 class="white-text"><span class="counter">451</span></h3>
						<span class="white-text">Clientes satisfeitos</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-trophy"></i>
						<h3 class="white-text"><span class="counter">12</span></h3>
						<span class="white-text">Anos no mercado</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-file"></i>
						<h3 class="white-text"><span class="counter">45</span></h3>
						<span class="white-text">Projetos concluídos</span>
					</div>
				</div>
				<!-- /number -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Numbers -->

	<!-- Pricing -->
	
	<!-- /Pricing -->


	<!-- Testimonial -->
	
	<!-- /Testimonial -->

	<!-- Team -->
	
	<!-- /Team -->

	<!-- Blog -->
	
	<!-- /Blog -->

	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Fale Conosco</h2>
					<p>Possui alguma dúvida? <br/>
					Preencha o formulário abaixo que retornaremos o mais breve possível.</p>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Telefone</h3>
						<p>(54) 9 9187-7515</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>contato@construsonhos.com</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Endereço</h3>
						<p>Rua Mário Tomazelli, 214 <br/>Ponte Preta/RS<br/>CEP: 99735-000</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form" method="POST" action="">
						<input style="border: 2px solid #988e8e;" type="text" class="input" name="nomeContato" placeholder="Nome">
						<input style="border: 2px solid #988e8e;height: 40px;width: calc(50% - 10px);background: #F4F4F4;color: #354052;padding: 0px 10px;opacity: 0.5;-webkit-transition: 0.2s border-color, 0.2s opacity;transition: 0.2s border-color, 0.2s opacity;" type="email" name="emailContato" class="input" placeholder="E-mail">
						<textarea style="border: 2px solid #988e8e;" class="input" name="mensagemContato" placeholder="Mensagem"></textarea>
						<button class="main-btn">Enviar mensagem</button>
					</form>
					<div id="contact-form-msgs"></div>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2019 - Construtora Construsonhos.<br/>Todos os direitos reservados.</p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>

	<!-- Inclusão do Plugin jQuery Validation-->
	<script src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
	<script src="assets/js/default.js"></script>
	<script src="assets/js/jquery.mask.js"></script>

</body>

</html>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalFirstPassword" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Sua conta já esta cadastrada. Informe seu dados abaixo para criar uma senha para sua conta.</h4>
      </div>
      <div class="modal-body">

        <form class="login-form" id="first-password-form" method="post" action="processFirstPassword.php">
	      <div class="login-wrap">
	        <p class="login-img"><i class="icon_lock_alt"></i></p>
	        <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="text" class="form-control" name="email_fp" id="exampleInputEmail3" placeholder="Digite seu e-mail" autofocus>
          	</div>
          	<div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" id="cpf1" name="cpf_fp" id="exampleInputEmail3" placeholder="Digite seu CPF" autofocus>
          	</div>
          	<div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="primeira_senha" name="senha_fp" placeholder="Digite sua senha">
          	</div>
          	<div class="form-group">
                <label for="exampleInputEmail1">Confirmar senha</label>
                <input type="password" class="form-control" name="confirmar_senha_fp" id="confirmar_primeira_senha" placeholder="Confirme sua senha" autofocus>
          	</div>
	        <input class="btn btn-primary btn-lg btn-block" name="buttonFirstPassword" value="Cadastrar" type="submit">
	        <div id="msgs-first-password" class="msgs" style="height: 25px; text-align: center;">
	        	<?php
	            if (isset($_SESSION['msgFirstPassword'])) {
	                echo $_SESSION['msgFirstPassword'];
	                unset($_SESSION['msgFirstPassword']);
	            }
	            if (isset($_SESSION['msgFirstPasswordFail'])) {
	                echo $_SESSION['msgFirstPasswordFail'];
	                unset($_SESSION['msgFirstPasswordFail']);
	            }
		        ?>
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalLoginAdmin" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Informe suas credênciais abaixo para efetuar login na área administrativa</h4>
      </div>
      <div class="modal-body">

        <form class="login-form" id="login-form-admin" method="post" action="/construsonhos/config/validateLoginAdmin.php">
	      <div class="login-wrap">
	        <p class="login-img"><i class="icon_lock_alt"></i></p>
	        <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" name="login" id="exampleInputEmail3" placeholder="Digite seu login" autofocus>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword3" name="senha" placeholder="Digite sua senha">
              </div>
	        <input class="btn btn-primary btn-lg btn-block" name="buttonLoginAdmin" value="Login" type="submit">
	        <div id="msgs-login-admin" class="msgs" style="height: 50px; text-align: center;">
	        	<?php
	            if (isset($_SESSION['msgLoginAdmin'])) {
	                echo $_SESSION['msgLoginAdmin'];
	                unset($_SESSION['msgLoginAdmin']);
	            }
	            if (isset($_SESSION['msgLoginFailAdmin'])) {
	                echo $_SESSION['msgLoginFailAdmin'];
	                unset($_SESSION['msgLoginFailAdmin']);
	            }
		        ?>
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalLogin" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Informe suas credênciais abaixo para efetuar login</h4>
      </div>
      <div class="modal-body">

        <form class="login-form" id="login-form" method="post" action="/construsonhos/config/validateLogin.php">
	      <div class="login-wrap">
	        <p class="login-img"><i class="icon_lock_alt"></i></p>
	        <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Digite seu e-mail" autofocus>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword3" name="senha" placeholder="Digite sua senha">
              </div>
	        <label style="padding-left: 0px;" class="checkbox">
	            <span class="pull-right"><a style="margin-bottom: 10px;display: block;" href="">Esqueceu sua senha?</a></span>
	        </label>
	        <input class="btn btn-primary btn-lg btn-block" name="buttonLogin" value="Login" type="submit">
	        <div id="msgs-login" class="msgs">
	        	<?php
	            if (isset($_SESSION['msgLogin'])) {
	                echo $_SESSION['msgLogin'];
	                unset($_SESSION['msgLogin']);
	            }
	            if (isset($_SESSION['msgLoginFail'])) {
	                echo $_SESSION['msgLoginFail'];
	                unset($_SESSION['msgLoginFail']);
	            }
		        ?>
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalRegister" class="modal fade">
  <div class="modal-dialog" style="width: 700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Complete o formulário abaixo para efetuar o seu cadastro</h4>
      </div>
      <div class="modal-body">

        <form style="max-width: 700px;" class="login-form" id="register-form" method="post" action="processRegisterClient.php">
	      <div class="login-wrap" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
	        <div class="form-group register">
				<label for="exampleInputEmail1">Nome</label>
				<input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo" autofocus>
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">CPF</label>
				<input type="text" name="cpf" id="cpf2" class="form-control" placeholder="Digite seu CPF">
			</div>
			<div class="form-group register">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="text" name="email" class="form-control" placeholder="Digite seu e-mail">
			</div>
			<div class="form-group register">
				<label for="exampleInputEmail1">Telefone</label>
				<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite seu telefone/celular com DDD">
			</div>
			<!-- <div class="form-group register">
				<label for="exampleInputEmail1">CEP</label>
				<input type="text" name="cep" class="form-control"  id="cep" onblur="pesquisacep(this.value);" placeholder="Digite seu CEP">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">UF</label>
				<input type="text" name="uf" class="form-control"  id="uf" placeholder="Digite seu estado">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">Cidade</label>
				<input type="text" name="cidade" class="form-control"  id="cidade" placeholder="Digite sua cidade">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">Bairro</label>
				<input type="text" name="bairro" class="form-control"  id="bairro" placeholder="Digite seu bairro">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">Rua</label>
				<input type="text" name="rua" class="form-control"  id="rua" placeholder="Digite sua rua">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">Número</label>
				<input type="text" name="numero" class="form-control"  id="numero" placeholder="Digite seu número">
			</div> -->
	        <div class="form-group register">
				<label for="exampleInputEmail1">Senha</label>
				<input type="password" name="senha" class="form-control"  id="senha" placeholder="Digite sua senha">
			</div>
	        <div class="form-group register">
				<label for="exampleInputEmail1">Confirmar senha</label>
				<input type="password" name="confirmar_senha" class="form-control"  id="confirmar_senha" placeholder="Digite sua senha novamente">
			</div>
	        <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
	        <div id="msgs-register" class="msgs">
	        	<?php
		            if (isset($_SESSION['msgCadastro'])) {
		                echo $_SESSION['msgCadastro'];
		                unset($_SESSION['msgCadastro']);
		            }
		        ?>
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
	body {
		padding-right: 0px !important;
	}
	.form-group.register {
	    width: 48%;
	}
	.work > img {
	    height: 100%;
	}
	.msgs {
		display: flex;
		flex-direction: column;
		width: 100%;
		align-items: center;
		margin-top: 10px;
		height: 22px;
		overflow: hidden;
	}
	.msgs .error span {
		font-size: 16px;
		font-weight: bold;
	}
</style>