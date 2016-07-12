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
                            <li><a href="<?php echo HOME_PATH ?>categoria">Gerenciar Categorias</a></li>
                            <li><a href="<?php echo HOME_PATH ?>post">Gerenciar Posts</a></li>
                            <li><a href="<?php echo HOME_PATH ?>usuario">Gerenciar Usuários</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Opções Gerais</a></li>
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
<br/><br/><br/>
<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container">

<!-- Controle de erros -->
<?php if (count($this->sucessMsg) > 0): ?>
    <?php $string_mensagem = implode("<br/>", $this->sucessMsg) ?>
    <div class="row">
        <div class="col-md-12">
            <p class="bg-success"><?php echo $string_mensagem ?></p>
        </div>
    </div>
<?php endif ?>

<!-- Controle de erros -->
<?php if (count($this->errorMsg) > 0): ?>
    <?php $string_error = implode("<br/>", $this->errorMsg) ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Erros:</span>
                <?php echo $string_error ?>
            </div>
        </div>
    </div>
<?php endif ?>



