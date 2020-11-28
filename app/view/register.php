    <!-- secão 1 -->
    <div class="section2">
        <h1 class="text-center logoname">Skeletronik</h1>
        <br/><br/>
        <form method="post">
            <h2 class="title">CREATE ACCOUNT</h2>
            <div class="form-group">
                <label for="username">Nickname</label>
                <input name="username" id="username" type="text" maxlength="30" placeholder="Example: thor88" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" maxlength="50" placeholder="Example: thor@gmail.com" class="form-control">
            </div>
            <div class="form-group">
                <label for="typepassword">Password</label>
                <input type="password" id="typepassword" name="password" placeholder="" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="mininum of 8 characters including upper and lower letters, at least one number and at least one symbol">
            </div>
            <div class="form-group">
                <label><input required type="checkbox" id="checkboxCGI" class="css-checkbox" required name="checkbox"/> I read and agree to the Terms</label><br/>
            </div>
            <div class="form-group">
                <input type="submit" name="register" value="Sign Up" class="btn btn-primary">
            </div>
        </form>
    </div>
