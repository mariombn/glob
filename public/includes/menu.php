<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo HOME_PATH ?>"><?php echo APP_NAME ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if (!empty($_SESSION['status'])): ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu de Opções<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Gerenciar Posts</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php $this->link('usuario/sair') ?>">Sair</a></li>
                </ul>
            <?php else: ?>
                <form action="<?php echo HOME_PATH ?>usuario/login" method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input name="usua_email" type="text" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="usua_senha" type="password" placeholder="Senha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Entrar</button>
                </form>
            <?php endif ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Controle de erros -->
<?php if (count($this->errorMsg) > 0): ?>
    <?php $string_error = implode("<br/>", $this->errorMsg) ?>
<br/><br/><br/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Erros:</span>
                <?php echo $string_error ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>



