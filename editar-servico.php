<h1>editar servico</h1>
<?php
$sql = "SELECT * FROM servico WHERE id_servico=" . $_REQUEST['id_servico'];

$res = $conn->query($sql);

$row = $res->fetch_object();
?>
<form action="?page=salvar-servico" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_servico" value="<?php print $row->id_servico; ?>">
    <div class="mb-3">
        <label>Nome Servico
            <input type="text" name="nome_servico" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Duração
            <input type="time" name="duracao" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>