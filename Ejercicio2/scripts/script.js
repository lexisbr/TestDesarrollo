window.addEventListener('load', () => {

    let submit = document.getElementById("form");
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    let alert = document.getElementById("alert");

    function verifyData() {
        let form = new FormData();
        form.append('username', username.value);
        form.append('password', password.value);
        fetch('./database/validarLogin.php', {
            method: 'POST',
            body: form
        }).then(res => res.json())
            .then(({ success, attempts }) => {
                if (success === 1) {
                    location.href = 'index.php';
                } else {
                    let block = ""
                    if(attempts >= 3){
                        block = `El usuario ha sido bloqueado`;
                    }
                    alerta(block);
                }
            });

    }

    function alerta(block) {
        alert.innerHTML = `
        <div class="alert">
            <strong>Datos Incorrectos</strong>
            <p>${block}</p>
        </div>
        
        `
    }

    submit.addEventListener('submit', (e) => {
        e.preventDefault();
        verifyData();
    });

});