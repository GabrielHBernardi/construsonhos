<?php
	session_start();

	include "../config/conectionDB.php";

	$idCliente = $_POST['idCliente'];
	$senha_atual = $_POST['senha_atual'];
	$nova_senha = $_POST['nova_senha'];
	$confirmar_nova_senha = $_POST['confirmar_nova_senha'];
	$nova_senha_hash = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);

	$query = "SELECT senhaCliente FROM tb_cliente WHERE idCliente = '$idCliente'";
	$exec_query = mysqli_query($conexao, $query);

	$row_query = mysqli_fetch_assoc($exec_query);

	if ($nova_senha == $confirmar_nova_senha) {
		if (password_verify($senha_atual, $row_query['senhaCliente'])) {
			$query_update = "UPDATE tb_cliente SET senhaCliente = '$nova_senha_hash' WHERE idCliente = '$idCliente'";
			$exec_query_update = mysqli_query($conexao, $query_update);

			header('Location: changePassword.php');
			$_SESSION['msgPassword'] = '<label class="msgsPassword"><span style="color: #01a620;">Senha alterada com sucesso</span></label>';
		} else {
			header('Location: changePassword.php');
			$_SESSION['msgPassword'] = '<label class="msgsPassword"><span style="color: #c22d43;">A senha atual está incorreta</span></label>';
		}
	} else {
		header('Location: changePassword.php');
		$_SESSION['msgPassword'] = '<label class="msgsPassword"><span style="color: #c22d43;">As novas senhas não correspondem</span></label>';
	}
?>