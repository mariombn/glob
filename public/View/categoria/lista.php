<div class="row">
    <div class="col-md-12 text-center">
        <h3>Lista de Categorias</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-default" href="<?php echo HOME_PATH ?>categoria/cadastrar" role="button">Cadastrar Nova Categoria</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php $listaCategorias = $this->__get('lista') ?>
                <?php if (count($listaCategorias) > 0): ?>
                    <?php foreach ($listaCategorias as $categoria): ?>
                        <tr>
                            <td><?php echo $categoria['cate_id'] ?></td>
                            <td><?php echo $categoria['cate_nome'] ?></td>
                            <td><?php echo $categoria['cate_descricao'] ?></td>
                            <td><?php echo $categoria['cate_status'] ?></td>
                            <td><?php echo $categoria['cate_id'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum Registro encontrado</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>