    <!-- secão 1 -->
    <div class="section2">
        <h1 class="text-center logoname"><img style="width:10%; height: auto;" src="<?= DIRIMG ?>eskeleton.svg" /> Skeletronik</h1>
        <br/><br/>
        <form name="login2" method="post">
            <!--<h2 class="titulo">FAZER LOGIN NO PORTAL</h2>-->
            <h1>Login</h1>
            <div class="form-group">
                <input placeholder="Email or nickname"  class="form-control" name="email" type="text" maxlength="75">
            </div>
            <div class="form-group">
                <input placeholder="Password" class="form-control" name="password"  type="password" maxlength="50">
            </div>
            <input name="signin" class="btn btn-primary" value="Login" type="submit"><br/><br/>
            <span style="color:black; font-family:Times New Roman; font-size:80%;">No account yet? Sign up <a href="<?= DIRPAGE ?>register">here</a></span><br/>
        </form>
        <div class="result"></div>
        <br/><br/><br/><br/>
    </div>