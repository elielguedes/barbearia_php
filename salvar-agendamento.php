<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $cliente_id = $_POST['cliente_id'];
        $servico_id = $_POST['servico_id'];
        $barbeiro_id = $_POST['barbeiro_id'];
        $data_hora = $_POST['data_hora'];
        $status = $_POST['status'];

        $sql = "INSERT INTO agendamento(cliente_id,servico_id ,barbeiro_id,data_hora,status) VALUES ('{$cliente_id}', '{$servico_id}', '{$barbeiro_id}','{$data_hora}','{$status}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-agendamento';</script>";
        break;

    case 'editar':
        $cliente_id = $_POST['cliente_id'];
        $servico_id = $_POST['servico_id'];
        $barbeiro_id = $_POST['barbeiro_id'];
        $data_hora = $_POST['data_hora'];
        $status = $_POST['status'];

        $sql = "UPDATE agendamento SET  cliente_id='{$cliente_id}', servico_id='{$servico_id}', barbeiro_id='{$barbeiro_id}' , data_hora='{$data_hora}' , status='{$status}' WHERE id_agendamento=" . $_REQUEST['id_agendamento'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-agendamento';</script>";
        break;

    case 'excluir':
        $sql_check = "SELECT COUNT(*) as total FROM pagamento WHERE agendamento_id=" . $_REQUEST['id_agendamento'];
        $res_check = $conn->query($sql_check);
        $row_check = $res_check->fetch_object();

        if ($row_check->total > 0) {
            print "<script>alert('Não é possível excluir este agendamento! Ele possui pagamento cadastrado.');</script>";
            print "<script>location.href='?page=listar-agendamento';</script>";
        } else {
            $sql = "DELETE FROM agendamento WHERE id_agendamento=" . $_REQUEST['id_agendamento'];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Excluiu com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível excluir.');</script>";
            }
            print "<script>location.href='?page=listar-agendamento';</script>";
        }
        break;

}
?>