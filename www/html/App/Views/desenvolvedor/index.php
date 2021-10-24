<div class="container border bg-light mt-4">

    <h4 class="mt-3 text-center"><strong>Cadastrar</strong></h4>

    <hr>

    <form>

        <div class="row mt-3">
            <div class="col-md-3">
                <label for="nome"><b>Nome</b></label>
                <input type="text" class="form-control" id="nome" name="nome" maxlength=100 placeholder="Fulano da Silva">
            </div>
            <div class="col-md-2">
                <label for="sexo"><b>Sexo</b></label>
                <select id="sexo" name="sexo" class="form-control" required>
                    <option default disabled selected>Selecione</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="idade"><b>Idade</b></label>
                <input type="number" class="form-control" id="idade" name="idade" maxlength=3 min=0 placeholder="20">
            </div>
            <div class="col-md-3">
                <label for="hobby"><b>Hobby</b></label>
                <input type="text" class="form-control" id="hobby" name="hobby" maxlength=100 placeholder="Jogar futebol">
            </div>
            <div class="col-md-2">
                <label for="dataNascimento"><b>Data de Nascimento</b></label>
                <input type="text" class="form-control dataNascimento" id="dataNascimento" name="dataNascimento" maxlength=10 placeholder="d/m/Y" required>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-success" onclick="cadastrar()">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>
        </div>

    </form>

    <div class="container border bg-light mt-4">

        <h4 class="mt-3 text-center"><strong>Consultar / Editar / Excluir</strong></h4>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <label for="buscar"><b>Buscar</b></label>
                <input type="text" class="form-control" id="buscar" name="buscar" maxlength=150 placeholder="Consulte por id, nome, sexo, idade, hobby ou data de nascimento (no formato Y/m/d com barras)" onkeyup="buscar(this.value)">
            </div>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1 text-center">ID</th>
                        <th class="col-md-3 text-center">Nome</th>
                        <th class="col-md-1 text-center">Sexo</th>
                        <th class="col-md-1 text-center">Idade</th>
                        <th class="col-md-2 text-center">Hobby</th>
                        <th class="col-md-2 text-center">Data de Nascimento</th>
                        <th class="col-md-2 text-center">Ação</th>
                    </tr>
                </thead>
                <tbody id="tbody">
            </table>
        </div>

    </div>

</div>