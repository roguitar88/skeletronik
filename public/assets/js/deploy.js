function git_commit() {
    document.querySelector('.loading').style.display = 'block';
    let commitMsg = document.querySelector('#commit-message').value;

    if (commitMsg == '') {
        document.querySelector('.loading').style.display = 'none';
        $("#send-commit").prop("disabled", false);
        document.querySelector('#commit-message-validation').innerHTML = 'Type the commit message';
    } else {
        let form = new FormData();
        form.append('commit-message', commitMsg);

        fetch('/deploy-exec', {
            method: 'POST',
            body: form
        }).then((response) => {
            
            return response.json();

        }).then((data) => {
            document.querySelector('.loading').style.display = 'none';
            $("#send-commit").prop("disabled", false);
            // console.log(data);
            if (data.success) {
                alert(data.msg);
            } else {
                alert(data.error);
            }
        })
    }
}

document.querySelector("#send-commit").addEventListener("click", (e) => {
    e.preventDefault();
    $("#send-commit").prop("disabled", true);
    git_commit();
});