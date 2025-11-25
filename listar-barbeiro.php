<h1>listar barbeiro</h1>
<?php
$sql = "SELECT * FROM barbeiro ORDER BY nome_barbeiro";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $qtd = $res->num_rows;
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome Barbeiro</th>";
    print "<th>Especialidade</th>";
    print "<th>telefone</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
    print "<tbody>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_barbeiro}</td>";
        print "<td>{$row->nome_barbeiro}</td>";
        print "<td>{$row->especialidade}</td>";
        print "<td>{$row->telefone}</td>";
        print "<td>";
        print "<button class='btn btn-success' onclick=\"location.href='?page=editar-barbeiro&id_barbeiro={$row->id_barbeiro}';\">Еditar</button> ";
        print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-barbeiro&acao=excluir&id_barbeiro={$row->id_barbeiro}';}\">Еxcluir</button>";
        print "</td>";
        print "</tr>";
    }
    print "</tbody>";
    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}
?>