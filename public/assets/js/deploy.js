function git_commit() {
    document.querySelector('.loading').style.display = 'block';
    let commitMsg = document.querySelector('#commit-message').value;
    let project = document.querySelector('#project').value;

    if (commitMsg == '') {
        document.querySelector('.loading').style.display = 'none';
        $("#send-commit").prop("disabled", false);
        document.querySelector('#commit-message-validation').innerHTML = 'Type the commit message';
    } else {
        let form = new FormData();
        form.append('commit-message', commitMsg);
        form.append('project', project);

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

function update_database() {
    document.querySelector('.loading').style.display = 'block';
    let project = document.querySelector('#project').value;

    let form = new FormData();
    form.append('project', project);

    fetch('/update-db', {
        method: 'POST',
        body: form
    }).then((response) => {
        
        return response.json();

    }).then((data) => {
        document.querySelector('.loading').style.display = 'none';
        $("#update-db").prop("disabled", false);
        // console.log(data);
        if (data.success) {
            alert(data.msg);
        } else {
            alert(data.error);
        }
    })
}

// Delete validation message on typing:
document.querySelector('#commit-message').addEventListener("keyup", () => {
    document.querySelector('#commit-message-validation').innerHTML = '';
})

document.querySelector("#send-commit").addEventListener("click", (e) => {
    e.preventDefault();
    $("#send-commit").prop("disabled", true);
    git_commit();
});

document.querySelector("#update-db").addEventListener("click", (e) => {
    e.preventDefault();
    $("#update-db").prop("disabled", true);
    update_database();
});
