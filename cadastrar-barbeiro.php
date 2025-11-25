<h1>cadastrar barbeiro</h1>
<form action="?page=salvar-barbeiro" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome Barbeiro
            <input type="text" name="nome_barbeiro" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>especialidade
            <input type="text" name="especialidade" class="form-control">
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