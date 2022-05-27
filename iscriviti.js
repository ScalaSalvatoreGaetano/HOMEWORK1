// SCALA SALVATORE GAETANO O46001744

function cambiaPassword1()
{
    const password = document.querySelector(".pass_style1");
    if(password.type === "password"){
        password.type = "text";
    } else {
        password.type = "password";
    }
}

function cambiaPassword2()
{
    const password = document.querySelector(".pass_style2");
    if(password.type === "password"){
        password.type = "text";
    } else {
        password.type = "password";
    }
}


const accedi1 = document.querySelector(".cambia1");
accedi1.addEventListener("click", cambiaPassword1);

const accedi2 = document.querySelector(".cambia2");
accedi2.addEventListener("click", cambiaPassword2);




//?
/*
function onResponse(response){
    return response.json();
}

function onJson(json, event){
    const nickname = document.form.nickname.value;

    for(element of json){
        if(element.nickname === nickname){
            alert("nickname già in uso!");
            event.preventDefault;
        }
    }
}

fetch("http://localhost/php_sorgenti/HW1/iscriviti.php")
.then(onResponse)
.then(onJson);
*/

//?



