<h1>listar agendamento</h1>
<?php
$sql = "SELECT ag.*, cli.nome_cliente, srv.nome_servico, barb.nome_barbeiro
        FROM agendamento AS ag
        LEFT JOIN cliente AS cli ON cli.id_cliente = ag.cliente_id
        LEFT JOIN servico AS srv ON srv.id_servico = ag.servico_id
        LEFT JOIN barbeiro AS barb ON barb.id_barbeiro = ag.barbeiro_id
        ORDER BY ag.data_hora";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Serviço</th>";
    print "<th>Cliente</th>";
    print "<th>Barbeiro</th>";
    print "<th>Data/Hora</th>";
    print "<th>Status</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_agendamento}</td>";
        print "<td>{$row->nome_servico}</td>";
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_barbeiro}</td>";
        print "<td>" . date('d/m/Y H:i', strtotime($row->data_hora)) . "</td>";
        print "<td>{$row->status}</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-agendamento&id_agendamento={$row->id_agendamento}';\">Editar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-agendamento&acao=excluir&id_agendamento={$row->id_agendamento}';}\">Excluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>