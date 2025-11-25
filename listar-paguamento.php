<h1>Listar Pagamentos</h1>
<?php
$sql = "SELECT pg.*, cli.nome_cliente, srv.nome_servico, ag.data_hora
        FROM pagamento AS pg
        LEFT JOIN agendamento AS ag ON ag.id_agendamento = pg.agendamento_id
        LEFT JOIN cliente AS cli ON cli.id_cliente = ag.cliente_id
        LEFT JOIN servico AS srv ON srv.id_servico = ag.servico_id
        ORDER BY pg.data_pagamento DESC";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Cliente</th>";
    print "<th>Serviço</th>";
    print "<th>Data Agendamento</th>";
    print "<th>Valor</th>";
    print "<th>Forma Pagamento</th>";
    print "<th>Data Pagamento</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_pagamento}</td>";
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_servico}</td>";
        print "<td>" . date('d/m/Y H:i', strtotime($row->data_hora)) . "</td>";
        print "<td>R$ " . number_format($row->valor, 2, ',', '.') . "</td>";
        print "<td>{$row->forma_pagamento}</td>";
        print "<td>" . date('d/m/Y', strtotime($row->data_pagamento)) . "</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-paguamento&id_pagamento={$row->id_pagamento}';\">Editar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-paguamento&acao=excluir&id_pagamento={$row->id_pagamento}';}\">Excluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>