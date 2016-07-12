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
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="E-mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>