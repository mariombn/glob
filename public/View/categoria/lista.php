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
        <br/>
        <table class="table table-bordered">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th align="center">Status</th>
                    <th align="center">Ação</th>
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
                            <td width="120px" class="<?php echo ($categoria['cate_status'] == 'ativo') ? 'success' : 'danger' ?>">
                                <?php if ($categoria['cate_status'] == 'ativo'): ?>
                                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Ativo
                                <?php else: ?>
                                    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Inativo
                                <?php endif ?>
                            </td>
                            <td width="120px">
                                <a href="editar/<?php echo $categoria['cate_id'] ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="excluir/<?php echo $categoria['cate_id'] ?>" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
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

<!-- Modal de Edição -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>