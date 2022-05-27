// SCALA SALVATORE GAETANO O46001744

let dark = false;
function changeMode(){

    //variabili elemeni login.php
    const body = document.querySelector("body");
    const form = document.querySelector("form");
    const sx_box = document.querySelector(".box");

    dark = !dark;

    if(dark){
        body.classList.add("darkBody");
        sx_box.classList.add("darkBox");
        form.classList.add("darkForm");
        accedi.classList.add("darkButton");
    } else {
        body.classList.remove("darkBody");
        sx_box.classList.remove("darkBox");
        form.classList.remove("darkForm");
        accedi.classList.remove("darkButton");
    }
}


function changeModeHome(){
    const nav = document.querySelector("nav");
    const footer = document.querySelector("footer");
    const body = document.querySelector("body");

    const infoButton = document.querySelector(".info");

    dark = !dark;
    if(dark){
        nav.classList.add("darkNav");
        body.classList.add("darkHomeBody");
        infoButton.classList.add("darkButton");
        footer.classList.add("darkNav");
    } else {
        nav.classList.remove("darkNav");
        body.classList.remove("darkHomeBody");
        infoButton.classList.remove("darkButton");
        footer.classList.remove("darkNav");
    }
}

function changeModeSidebar(){
    const sidebar = document.querySelector("#sidebar");
    dark = !dark;
    if(dark){
        sidebar.classList.add("darkSidebar");
    } else {
        sidebar.classList.remove("darkSidebar");
    }
}

function changeModeInfo(){
    const body = document.querySelector("#corpo_info");
    const main = document.querySelector(".scheda_utente");
    
    dark = !dark;

    if(dark){
        body.classList.add("darkBodyInfo");
        main.classList.add("darkForm");
    }else{
        body.classList.remove("darkBodyInfo");
        main.classList.remove("darkForm");
    }
}

///////////

function darkModeIscriviti(){
    const body = document.querySelector(".dark_body_iscriviti");
    const main = document.querySelector(".dark_main_iscriviti");
    dark = !dark;

    if(dark){
        body.classList.add("db_iscriviti");
        main.classList.add("darkForm");
    }else{
        body.classList.remove("db_iscriviti");
        main.classList.remove("darkForm");
    }
}