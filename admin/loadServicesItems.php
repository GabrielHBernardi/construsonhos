<?php

    if(!empty($_POST)) {
        $service_id = $_POST["service_id"];

        include "../config/conectionDB.php";

        $services_items = [];

        $query = "SELECT * FROM tb_checklist_servico WHERE idServico = $service_id";

        $exec_query = mysqli_query($conexao, $query);

        while($row = mysqli_fetch_assoc($exec_query)) {
            $services_items[] = [
                "id" => $row["idChecklistServico"],
                "descr" => $row["descricaoChecklistServico"]
            ];
        }

        echo json_encode($services_items);
        die();
    }