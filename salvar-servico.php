<?php

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome_servico = $_POST['nome_servico'];
        $duracao = $_POST['duracao'];
        $preco_servico = $_POST['preco_servico'];

        $sql = "INSERT INTO servico (nome_servico , preco_servico ,duracao) VALUES ('{$nome_servico}', '{$duracao}', '{$preco_servico}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            print "<script>alert('Não cadastrou');</script>";
        }
        print "<script>location.href='?page=listar-servico';</script>";
        break;

    case 'editar':
        $nome_servico = $_POST['nome_servico'];
        $duracao = $_POST['duracao'];
        $preco_servico = $_POST['preco_servico'];

        $sql = "UPDATE servico  SET  nome_servico='{$nome_servico}', duracao='{$duracao}', preco_servico='{$preco_servico}' WHERE id_servico=" . $_REQUEST['id_servico'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
        } else {
            print "<script>alert('Não editou');</script>";
        }
        print "<script>location.href='?page=listar-servico';</script>";
        break;

    case 'excluir':
        $sql = "DELETE FROM servico WHERE id_servico=" . $_REQUEST['id_servico'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
        } else {
            print "<script>alert('Não excluiu');</script>";
        }
        print "<script>location.href='?page=listar-servico';</script>";
        break;

}