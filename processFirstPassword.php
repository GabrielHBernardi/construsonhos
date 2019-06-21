<?php
	session_start();

	include "config/conectionDB.php";

	$email_fp = filter_input(INPUT_POST, 'email_fp', FILTER_SANITIZE_EMAIL);
	$cpf_fp = filter_input(INPUT_POST, 'cpf_fp', FILTER_SANITIZE_STRING);
	$senha_fp = password_hash($_POST['senha_fp'], PASSWORD_DEFAULT);

	$query_valida = "SELECT * FROM tb_cliente WHERE emailCliente = '$email_fp' AND cpfCliente = '$cpf_fp'";
	$exec_query_valida = mysqli_query($conexao, $query_valida);
	$row_query_valida = mysqli_fetch_assoc($exec_query_valida);

	if ($row_query_valida['emailCliente'] == $email_fp AND $row_query_valida['cpfCliente'] == $cpf_fp) {
		$query = "UPDATE tb_cliente SET senhaCliente = '$senha_fp' WHERE emailCliente = '$email_fp' AND cpfCliente = '$cpf_fp'";
		$exec_query = mysqli_query($conexao, $query);

		if ($exec_query) {
			header('Location: /construsonhos?modalName=myModalLogin');
			$_SESSION['msgLogin'] = '<label class="msgLogin"><span style="color: #01a620;">Senha cadastrada com sucesso. Já pode fazer login!</span></label>';
		} else {
			header('Location: /construsonhos?modalName=myModalFirstPassword');
			$_SESSION['msgFirstPasswordFail'] = '<label class="msgLogin"><span style="color: #c22d43;">Erro ao cadastrar nova senha</span></label>';
		}
	} else {
		header('Location: /construsonhos?modalName=myModalFirstPassword');
		$_SESSION['msgFirstPasswordFail'] = '<label class="msgLogin"><span style="color: #c22d43;">E-mail e CPF não confere</span></label>';
	}

?>