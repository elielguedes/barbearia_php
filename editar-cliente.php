<h1>editar cliente</h1>
<?php
$sql = "SELECT * FROM cliente WHERE id_cliente=" . $_REQUEST['id_cliente'];

$res = $conn->query($sql);

$row = $res->fetch_object();
?>
<form action="?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print $row->id_cliente; ?>">
    <div class="mb-3">
        <label>cliente
            <input type="text" name="nome_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>E-mail
            <input type="email" name="email" class="form-control">
        </label>
    </div>
    <div claass="mb-3">
        <label>Telefone
            <input type="text" name="telefone" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>data cadastro</label>
        <input type="date" name="data_cadastro" class="form-control" requierd>
    </div>
    <div>
        <button type="submit" class="bnt bnt-primary">Enviar</button>
    </div>
</form>