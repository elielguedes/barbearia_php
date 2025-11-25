<h1>Editar Agendamento</h1>
<?php
$sql = "SELECT * FROM agendamento WHERE id_agendamento=" . $_REQUEST['id_agendamento'];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>
<form action="?page=salvar-agendamento" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_agendamento" value="<?php print $row->id_agendamento; ?>">

    <div class="mb-3">
        <label>Nome do Cliente
            <select name="cliente_id" class="form-control" required>
                <option value="">-= Selecione o Cliente =-</option>
                <?php
                $sql = "SELECT * FROM cliente ORDER BY nome_cliente";
                $res_cli = $conn->query($sql);
                if ($res_cli && $res_cli->num_rows > 0) {
                    while ($row_cli = $res_cli->fetch_object()) {
                        $selected = ($row_cli->id_cliente == $row->cliente_id) ? 'selected' : '';
                        print "<option value='{$row_cli->id_cliente}' $selected>{$row_cli->nome_cliente}</option>";
                    }
                } else {
                    print "<option value=''>Não há clientes cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Serviço
            <select name="servico_id" class="form-control" required>
                <option value="">-= Selecione o Serviço =-</option>
                <?php
                $sql = "SELECT * FROM servico ORDER BY nome_servico";
                $res_srv = $conn->query($sql);
                if ($res_srv && $res_srv->num_rows > 0) {
                    while ($row_srv = $res_srv->fetch_object()) {
                        $selected = ($row_srv->id_servico == $row->servico_id) ? 'selected' : '';
                        print "<option value='{$row_srv->id_servico}' $selected>{$row_srv->nome_servico}</option>";
                    }
                } else {
                    print "<option value=''>Não há serviços cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Barbeiro
            <select name="barbeiro_id" class="form-control" required>
                <option value="">-= Selecione o Barbeiro =-</option>
                <?php
                $sql = "SELECT * FROM barbeiro ORDER BY nome_barbeiro";
                $res_barb = $conn->query($sql);
                if ($res_barb && $res_barb->num_rows > 0) {
                    while ($row_barb = $res_barb->fetch_object()) {
                        $selected = ($row_barb->id_barbeiro == $row->barbeiro_id) ? 'selected' : '';
                        print "<option value='{$row_barb->id_barbeiro}' $selected>{$row_barb->nome_barbeiro}</option>";
                    }
                } else {
                    print "<option value=''>Não há barbeiros cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Data e Hora do Agendamento
            <input type="datetime-local" name="data_hora" class="form-control"
                value="<?php print date('Y-m-d\TH:i', strtotime($row->data_hora)); ?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Status
            <select name="status" class="form-control" required>
                <option value="">-= Selecione o Status =-</option>
                <option value="Pendente" <?php print ($row->status == 'Pendente') ? 'selected' : ''; ?>>Pendente</option>
                <option value="Confirmado" <?php print ($row->status == 'Confirmado') ? 'selected' : ''; ?>>Confirmado
                </option>
                <option value="Cancelado" <?php print ($row->status == 'Cancelado') ? 'selected' : ''; ?>>Cancelado
                </option>
                <option value="Concluído" <?php print ($row->status == 'Concluído') ? 'selected' : ''; ?>>Concluído
                </option>
            </select>
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>