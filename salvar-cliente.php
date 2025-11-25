<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome_cliente = $_POST['nome_cliente'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_cadastro = $_POST['data_cadastro'];

        $sql = "INSERT INTO cliente (nome_cliente , telefone ,email , data_cadastro) VALUES ('{$nome_cliente}', '{$telefone}', '{$email}', '{$data_cadastro}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-cliente';</script>";
        break;

    case 'editar':
        $nome_cliente = $_POST['nome_cliente'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_cadastro = $_POST['data_cadastro'];

        $sql = "UPDATE cliente SET  nome_cliente='{$nome_cliente}', telefone='{$telefone}', email='{$email}', data_cadastro='{$data_cadastro}' WHERE id_cliente=" . $_REQUEST['id_cliente'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-cliente';</script>";
        break;

    case 'excluir':
        $sql_check = "SELECT COUNT(*) as total FROM agendamento WHERE cliente_id=" . $_REQUEST['id_cliente'];
        $res_check = $conn->query($sql_check);
        $row_check = $res_check->fetch_object();

        if ($row_check->total > 0) {
            print "<script>alert('Não é possível excluir este cliente! Ele possui {$row_check->total} agendamento(s) cadastrado(s).');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            $sql = "DELETE FROM cliente WHERE id_cliente=" . $_REQUEST['id_cliente'];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Excluiu com sucesso!');</script>";
            } else {
                print "<script>alert('Não foi possível excluir.');</script>";
            }
            print "<script>location.href='?page=listar-cliente';</script>";
        }
        break;

}