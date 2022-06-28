    <!-- secão 1 -->
    <div class="section2">
        <h1 class="text-center logoname"><img style="width:10%; height: auto;" src="<?= DIRIMG ?>eskeleton.svg" /> Skeletronik</h1>
        <br/><br/>
        <!-- <form method="post"> -->
        <h2 class="title">Deploy with Git</h2>
        <div class="form-group">
            <!-- Don't forget to run 'git pull' in your server -->
            <label for="commit-message">Commit message</label>
            <input name="commit-message" id="commit-message" type="text" maxlength="50" placeholder="Example: updating login form" class="form-control">
            <span class="error-msg" id="commit-message-validation"></span>
        </div>
        <div class="form-group">
            <input type="submit" name="send-commit" id="send-commit" value="Send to production" class="btn btn-success">
        </div>
        <!-- </form> -->
    </div>