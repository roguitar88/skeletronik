    <!-- secão 1 -->
    <div class="section2">
        <h1 class="text-center logoname"><img style="width:10%; height: auto;" src="<?= DIRIMG ?>eskeleton.svg" /> Skeletronik</h1>
        <!-- <p class="text-center" style="font-size: .6em;"><strong>Note:</strong> This is for Windows users only. Always leave Git Bash terminal open.</p> -->
        <br/>
        <!-- <form method="post"> -->
        <h2 class="title">Deploy with Git</h2>
        <div class="form-group">
            <label>Selecione um projeto</label>
            <select name="project" id="project" class="form-control">
                <option value="0">Olimppi.us</option>
                <option value="1" selected>Zuump</option>
                <!-- <option value="2">Lacoprofissional.tv</option> -->
            </select>
        </div>
        <div class="form-group">
            <!-- Don't forget to run 'git pull' in your server -->
            <label for="commit-message">Commit message</label>
            <input name="commit-message" id="commit-message" type="text" maxlength="50" placeholder="Example: updating login form" class="form-control">
            <span class="error-msg" id="commit-message-validation"></span>
        </div>
        <div class="form-group">
            <input type="submit" name="send-commit" id="send-commit" value="Send to production" class="btn btn-success">
            <input type="submit" name="update-db" id="update-db" value="Update database" class="btn btn-danger">
        </div>
        <!-- </form> -->
        <br><br>
        <p class="small text-monospace"><strong>* Send to production:</strong> Deploy from localhost/development to production/server via Git</p>
        <p class="small text-monospace"><strong>** Update database:</strong> Replace database with the most recent/updated version from server</p>
    </div>