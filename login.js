// SCALA SALVATORE GAETANO O46001744

function controllo(event)
{
    if(form.nome.value.length == 0 
        || form.password.value.length == 0)
    {
        alert("Compilare i campi.");
        event.preventDefault();
    }
}

function cambiaPassword()
{
    const password = document.getElementById("pass");
    if(password.type === "password"){
        password.type = "text";
    } else {
        password.type = "password";
    }
}

function lunghezzaPassword(event)
{
    const lunghezza = document.getElementById("pass");
    if(lunghezza.value.length < 4)
    {
        alert("Password corta (minimo 4 caratteri).");
        event.preventDefault();
        
    }
}

const controlloLunghezzaPassword = document.forms["nome_form"];
controlloLunghezzaPassword.addEventListener("submit", lunghezzaPassword);

const password_login = document.getElementById("click");
password_login.addEventListener("click", cambiaPassword);

const form = document.forms["nome_form"];
form.addEventListener("submit", controllo);