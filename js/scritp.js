if (document.getElementById("email")) {
    document.getElementById("email").focus();
}

function fazerLogin() {
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;
    const alerta = document.getElementById("alertMsg");

    if (email === "") {
        alerta.style.display = "block";
        alerta.innerHTML = "O campo de email está vazio";
        return;
    } else if (senha === "") {
        alerta.style.display = "block";
        alerta.innerHTML = "O campo de senha está vazio";
        return;
    } else if (senha.length < 6) {
        alerta.style.display = "block";
        alerta.innerHTML = "Senha invalida,minimo de 6 caracteres";
        return;
    } else {
        alerta.style.display = "none";
    }
    mostrarProcessando();

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) +
            "&senha=" +
            encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.success) {
                alert(data.message);
                alerta.style.display = "block";
                alerta.classList.remove("alert-warning");
                alerta.classList.add("alert-success");
                alerta.innerHTML = data.message;
                setTimeout(function () {
                    window.location.href = "perfil.php";
                }, 2000);
            } else {
                alerta.style.display = "block";
                // alertlog.classList.remove("alert-info");
                // alertlog.classList.add("alert-danger");
                alerta.innerHTML = data.message;
            }
            esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}


function mostrarProcessando() {
    var divFundoEscuro = document.createElement("div");
    divFundoEscuro.id = "fundoEscuro";
    divFundoEscuro.style.position = "fixed";
    divFundoEscuro.style.top = "0";
    divFundoEscuro.style.left = "0";
    divFundoEscuro.style.width = "100%";
    divFundoEscuro.style.height = "100%";
    divFundoEscuro.style.backgroundColor = "rgba(123, 0, 255, 0.577)";
    document.body.appendChild(divFundoEscuro);

    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "45%";
    divProcessando.style.left = "52%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="img/loading2.gif" width="80%" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}
// FUNCAO DE ESCONDER O LOADING
function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    var divFundoEscuro = document.getElementById("fundoEscuro");
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
    if (divFundoEscuro) {
        document.body.removeChild(divFundoEscuro);
    }
}