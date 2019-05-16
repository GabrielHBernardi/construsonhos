<?php
	session_start();

	include "config/conectionDB.php";

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
	$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
	$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
	$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
	$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
	$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


	$insere_cliente = "INSERT INTO tb_cliente (nomeCliente, cpfCliente, emailCliente, telefoneCliente, cepCliente, estadoCliente, cidadeCliente, bairroCliente, ruaCliente, numeroCliente, senhaCliente) VALUES ('$nome', '$cpf' , '$email', '$telefone', '$cep', '$uf', '$cidade' ,'$bairro' ,'$rua' ,'$numero' ,'$senha')";

	$resultado_insercao = mysqli_query($conexao, $insere_cliente);

	if (mysqli_insert_id($conexao)) {
		echo "<script>
				alert('Cadastro efetuado com sucesso! Faça login agora.');
				window.location.href = '/construsonhos';
		      </script>";
	} else {
		$_SESSION['msgCadastro'] = '<label><span style="color: #c22d43;">Erro ao efetuar cadastro</span></label>';
	}
?>