<h1>editar paguamneto</h1>
<form action="?page=salvar-paguamento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Agendamento
            <select name="agendamento_id" class="form-control" required>
                <option value="">-= Selecione o Agendamento =-</option>
                <?php
                $sql = "SELECT ag.*, cli.nome_cliente, srv.nome_servico, barb.nome_barbeiro 
                        FROM agendamento AS ag
                        LEFT JOIN cliente AS cli ON cli.id_cliente = ag.cliente_id
                        LEFT JOIN servico AS srv ON srv.id_servico = ag.servico_id
                        LEFT JOIN barbeiro AS barb ON barb.id_barbeiro = ag.barbeiro_id
                        WHERE ag.status != 'Cancelado'
                        ORDER BY ag.data_hora DESC";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_object()) {
                        $data_formatada = date('d/m/Y H:i', strtotime($row->data_hora));
                        print "<option value='{$row->id_agendamento}'>{$row->nome_cliente} - {$row->nome_servico} - {$data_formatada}</option>";
                    }
                } else {
                    print "<option value=''>Não há agendamentos cadastrados</option>";
                }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Valor (R$)
            <input type="number" step="0.01" name="valor" class="form-control" placeholder="Ex: 50.00" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Forma de Pagamento
            <select name="forma_pagamento" class="form-control" required>
                <option value="">-= Selecione =-</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão de Débito">Cartão de Débito</option>
                <option value="Cartão de Crédito">Cartão de Crédito</option>
                <option value="Pix">Pix</option>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Data do Pagamento
            <input type="date" name="data_pagamento" class="form-control" required>
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
<form action="?page=salvar-paguamento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <select type=<div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form>