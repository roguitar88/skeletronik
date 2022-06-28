    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light" id="navbar">
            <div class="row" style="display:inline-block;">
                <a class="navbar-brand" href="<?= DIRPAGE ?>"><img id="logo" src="<?= DIRIMG ?>logo.png"/></a> <!-- style="width:20%; height:auto; float:left; margin-top:-28px;" -->
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarMenu"> <!-- id="navbarMenu" -->
                <ul class="navbar-nav"> <!-- id="nav-ul" -->
                    <li class="nav-item"><a class="nav-link" href="<?= DIRPAGE ?>login">LOGIN</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= DIRPAGE ?>register">SIGN UP</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= DIRPAGE ?>deploy">DEPLOY</a></li>
                </ul>
            </div>
        </nav>
    </header>
