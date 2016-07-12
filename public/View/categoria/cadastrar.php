<div class="row">
    <div class="col-md-12 text-center">
        <h3>Cadastrar nova Categoria</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="<?php echo HOME_PATH ?>categoria/add" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="cate_nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cate_nome" name="cate_nome" placeholder="Nome da Categoria">
                </div>
            </div>
            <div class="form-group">
                <label for="cate_descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea id="cate_descricao" name="cate_descricao" class="form-control" placeholder="Descrição da Categoria" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="cate_status_a" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <label><input type="radio" name="cate_status" id="cate_status_a" value="ativo" checked /> Ativo</label>
                    <label><input type="radio" name="cate_status" id="cate_status_i" value="inativo" /> Inativo</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    <a class="btn btn-default" href="<?php echo HOME_PATH ?>categoria/" role="button">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>