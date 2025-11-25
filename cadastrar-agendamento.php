<h1>Cadastrar Agendamento</h1>
<form action="?page=salvar-agendamento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Nome do Cliente
            <select name="cliente_id" class="form-control" required>
                <option value="">-= Selecione o Cliente =-</option>
                <?php
                $sql = "SELECT * FROM cliente ORDER BY nome_cliente";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_object()) {
                        print "<option value='{$row->id_cliente}'>{$row->nome_cliente}</option>";
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
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_object()) {
                        print "<option value='{$row->id_servico}'>{$row->nome_servico}</option>";
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
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_object()) {
                        print "<option value='{$row->id_barbeiro}'>{$row->nome_barbeiro}</option>";
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
            <input type="datetime-local" name="data_hora" class="form-control" required>
        </label>
    </div>
    
    <div class="mb-3">
        <label>Status
            <select name="status" class="form-control" required>
                <option value="">-= Selecione o Status =-</option>
                <option value="Pendente">Pendente</option>
                <option value="Confirmado">Confirmado</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Concluído">Concluído</option>
            </select>
        </label>
    </div>
    
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>