<h1>Cadastrar Servico</h1>
<form action="?page=salvar-servico" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
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
    <div class="mb-3">
        <label>preco
            <input type="number" name="preco_servico" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>