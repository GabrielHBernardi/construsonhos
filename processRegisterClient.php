<?php
	session_start();

	include "config/conectionDB.php";

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

	$query_cpf = "SELECT cpfCliente FROM tb_cliente WHERE cpfCliente = '$cpf'";
	$exec_query_cpf = mysqli_query($conexao, $query_cpf);

	$row_query = mysqli_fetch_assoc($exec_query_cpf);

	if ($cpf == $row_query['cpfCliente']) {
		header('Location: /construsonhos?modalName=myModalRegister');
		$_SESSION['msgCadastro'] = '<label class="msgRegister"><span style="color: #c22d43;">CPF já cadastrado</span></label>';
	} else {
		$query_email = "SELECT emailCliente FROM tb_cliente WHERE emailCliente = '$email'";
		$exec_query_email = mysqli_query($conexao, $query_email);

		$row_query = mysqli_fetch_assoc($exec_query_email);

		if ($email == $row_query['emailCliente']) {
			header('Location: /construsonhos?modalName=myModalRegister');
			$_SESSION['msgCadastro'] = '<label class="msgRegister"><span style="color: #c22d43;">E-mail já cadastrado</span></label>';
		} else {
			$insere_cliente = "INSERT INTO tb_cliente (nomeCliente, cpfCliente, emailCliente, telefoneCliente, senhaCliente) VALUES ('$nome', '$cpf' , '$email', '$telefone', '$senha')";

			$resultado_insercao = mysqli_query($conexao, $insere_cliente);

			if ($resultado_insercao) {
				header('Location: /construsonhos?modalName=myModalLogin');
				$_SESSION['msgLogin'] = '<label class="msgLogin"><span style="color: #01a620;">Cadastro efetuado com sucesso. Já pode fazer login!</span></label>';
			} else {
				header('Location: /construsonhos?modalName=myModalRegister');
				$_SESSION['msgCadastro'] = '<label class="msgRegister"><span style="color: #c22d43;">Erro ao efetuar cadastro</span></label>';
			}
		}
	}

?>