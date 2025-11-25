<h1>Cadastrar cliente</h1>
<form action="?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>nome cliente
            <input type="text" name="nome_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>email cliente
            <input type="email" name="email" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>telefone cliente
            <input type="text" name="telefone" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>data cadastro</label>
        <input type="date" name="data_cadastro" class="form-control" required>
    </div>
    <div>
        <button type="submit" class="bnt bnt-primary">Enviar</button>
    </div>
</form>