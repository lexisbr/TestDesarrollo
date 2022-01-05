window.addEventListener('load', () => {

    let submitLogin = document.getElementById("form");
    let submitCreate = document.getElementById("createForm");
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let alert = document.getElementById("alert");
    let messageCreateVar = document.getElementById("messageCreate");

    function verifyData() {
        let form = new FormData();
        form.append('username', username.value);
        form.append('password', password.value);
        fetch('./database/validarLogin.php', {
            method: 'POST',
            body: form
        }).then(res => res.json())
            .then(({ success, attempts, admin}) => {
                if (success === 1) {
                    if (attempts == 3) {
                        alerta(`<b>El usuario se encuentra bloqueado</b>`)
                    } else {
                        if(admin == 0){
                            location.href = 'index.php';
                        }else{
                            location.href = 'indexAdmin.php';
                        }
                            
                    }
                } else {
                    let message = "";
                    if (attempts < 3) {
                        message = `<b>Datos incorrectos</b>`;
                    } else {
                        message = `<b>Datos incorrectos</b>
                                   <p> El usuario ha sido bloqueado</p>`;
                    }
                    alerta(message);
                }
            });

    }

    function createUser(){
        let form = new FormData();
        let newUsername = document.getElementById("newUsername");
        let newPassword = document.getElementById("newPassword");
        let name = document.getElementById("name");
        let lastname = document.getElementById("lastname");
        form.append('username', newUsername.value);
        form.append('name', name.value);
        form.append('lastname', lastname.value);
        form.append('password', newPassword.value);
        fetch('./database/crearUsuario.php', {
            method: 'POST',
            body: form
        }).then(res => res.json())
        .then(({ success }) => {
            if (success === 1) {
                messageCreate("Se ha creado usuario","success");
            } else {
                messageCreate("El usuario ya existe","alert");
            }
        });
    }

    function alerta(message) {
        alert.innerHTML = `
        <div class="alert">
            ${message}
        </div>
        `
    }

    function messageCreate(message,type) {
        messageCreateVar.innerHTML = `
        <div class="${type}">
            ${message}
        </div>
        `
    }

    submitLogin.addEventListener('submit', (e) => {
        e.preventDefault();
        verifyData();
    });

    submitCreate.addEventListener('submit', (e) => {
        e.preventDefault();
        createUser();
    })

});