<h1>editar barbeiro</h1>
<?php
$sql = "SELECT * FROM barbeiro WHERE id_barbeiro=" . $_REQUEST['id_barbeiro'];

$res = $conn->query($sql);

$row = $res->fetch_object();
?>
<form action="?page=salvar-barbeiro" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_barbe" value="<?php print $row->id_cliente; ?>">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome Barbeiro
            <input type="text" name="nome_barbeiro" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>especialidade
            <input type="text" name="especilidade" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>telefone
            <input type="number" name="telefone" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="bnt bnt-primary">Enviar</button>
    </div>
</form>