<h1>listar servico</h1>
<?php
$sql = "SELECT * FROM servico ORDER BY nome_servico";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>serviço</th>";
    print "<th>duracao</th>";
    print "<th>preco</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_servico}</td>";
        print "<td>{$row->nome_servico}</td>";
        print "<td>{$row->preco_servico}</td>";
        $data = strtotime($row->duracao);
        print "<td>{$row->duracao}</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-servico&id_servico={$row->id_servico}';\">Еditar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-servico&acao=excluir&id_servico={$row->id_servico}';}\">Еxcluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>