<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $agendamento_id = $_POST['agendamento_id'];
        $valor = $_POST['valor'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $data_pagamento = $_POST['data_pagamento'];

        $sql = "INSERT INTO pagamento(agendamento_id,valor , forma_pagamento,data_pagamento) VALUES ('{$agendamento_id}', '{$valor}','{$forma_pagamento}','{$data_pagamento}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-paguamento';</script>";
        break;

    case 'editar':
        $agendamento_id = $_POST['agendamento_id'];
        $id_pagamento = $_POST['id_pagamento'];
        $valor = $_POST['valor'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $data_paguamento = $_POST['data_paguamento'];

        $sql = "UPDATE paguamento SET  agendamento_id='{$agendamento_id}', id_pagamento='{$id_pagamento}', valor='{$valor}' , forma_paguamento='{$forma_pagamento}' , data_paguamento='{$data_pagamento}' WHERE id_paguamento=" . $_REQUEST['id_paguamento'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-paguamento';</script>";
        break;

    case 'excluir':
        $sql = "DELETE FROM pagamento WHERE id_pagamento=" . $_REQUEST['id_pagamento'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
        }
        print "<script>location.href='?page=listar-pagamento';</script>";
        break;

}
?>