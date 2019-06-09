<?php
	$endereco = $_POST['endereco'];

	echo $_POST['dataServico'];

	for($i = 0; $i < count($endereco); $i++) {
	    echo "$endereco[$i]";
	}
?>