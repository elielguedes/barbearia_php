<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome_barbeiro = $_POST['nome_barbeiro'];
        $especialidade = $_POST['especialidade'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO barbeiro(nome_barbeiro, especialidade,telefone) VALUES ('{$nome_barbeiro}', '{$especialidade}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-barbeiro';</script>";
        break;

    case 'editar':
        $nome_barbeiro = $_POST['nome_barbeiro'];
        $especialidade = $_POST['especialidade'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE barbeiro SET  nome_barbeiro='{$nome_barbeiro}', especialidade='{$especialidade}', telefone='{$telefone}' WHERE id_barbeiro=" . $_REQUEST['id_barbeiro'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-barbeiro';</script>";
        break;

    case 'excluir':
        $sql_check = "SELECT COUNT(*) as total FROM agendamento WHERE barbeiro_id=" . $_REQUEST['id_barbeiro'];#cout conta quantos registros e dps verifico se esta agendado 
        $res_check = $conn->query($sql_check);
        $row_check = $res_check->fetch_object();

        if ($row_check->total > 0) {
            print "<script>alert('Não é possível excluir este barbeiro! Ele possui {$row_check->total} agendamento(s) cadastrado(s).');</script>";
            print "<script>location.href='?page=listar-barbeiro';</script>";
        } else {
            $sql = "DELETE FROM barbeiro WHERE id_barbeiro=" . $_REQUEST['id_barbeiro'];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Excluiu com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível excluir.');</script>";
            }
            print "<script>location.href='?page=listar-barbeiro';</script>";
        }
        break;

}
?>