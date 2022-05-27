//barra laterale
function apri_sidebar(){
    const sidebar=document.getElementById("sidebar");
    sidebar.classList.remove("hidden");
}
        
function chiudi_sidebar(){
    const sidebar=document.getElementById("sidebar");
    sidebar.classList.add("hidden");
}


let visibile = false;

let carrello = [];
let elemento = '';

let somma;
let c;

function addCarrello(){
    carrello.push(elemento);
    somma = 0;
    c = 0;

    let numeroProdotti = document.getElementById("numeroProdotti");
    let totaleConto = document.getElementById("totaleConto");

    for(let i = 0; i < carrello.length; i++)
    {
        somma+=200;
        c++;
        numeroProdotti.textContent = c;
        totaleConto.textContent = "totale €: " + somma;
    }
}




/*---------------------- */
const numResults = 20;
//Keys and endpoints
const key_gif = 'mAvCsm3x3r5UhimJjQvAbWmHVSf8Uomb';		
const key_img = '16326848-36a4d0e195bb2375d6f41ea91';		
const gif_api_endpoint = 'http://api.giphy.com/v1/gifs/search' 
const img_api_endpoint = 'https://pixabay.com/api/' 

function onResponse(response)
{ return response.json(); }




function onImgJson(json)
{
    console.log(json); 
    const album = document.querySelector("main");
    album.innerHTML='';

    const results = json.hits;

    for(let result of results)
    {
        
        const imgContainer = document.createElement("div");
        const img = document.createElement('img');
        
        imgContainer.classList.add("book");//container

        img.addEventListener('click', openPic);
        img.src=result.largeImageURL;

        imgContainer.appendChild(img);

        
        let aggiungi = document.createElement("button");
        aggiungi.textContent = "aggiungi";
        imgContainer.appendChild(aggiungi);
        
        aggiungi.addEventListener("click", addCarrello);

        album.appendChild(imgContainer);
    }
}


function onGifJson(json){
    
    console.log(json); 
    const album = document.querySelector("main");
    album.innerHTML='';

    let results = json.data;

    for(let result of results)
    {
        
        const imgContainer = document.createElement("div");
        const img = document.createElement('img');
        
        imgContainer.classList.add("book");//container

        img.addEventListener('click', openPic);
        img.src=result.images.downsized_medium.url;

        imgContainer.appendChild(img);

        let aggiungi = document.createElement("button");
        aggiungi.textContent = "aggiungi";
        imgContainer.appendChild(aggiungi);
        aggiungi.addEventListener("click", addCarrello);

        album.appendChild(imgContainer);
    }
}


let token;
function onJsonToken(json)
{
    console.log(json);
    token = json.access_token;
}

//per aprire la foto in una nuova scheda
function openPic(event)
{ window.open(event.currentTarget.src); }



function sendRequest(event){
    event.preventDefault();

    const text = document.querySelector("#ricerca").value; //#autore = #ricerca
    const tipo = document.querySelector("#tipo").value;
    const encodeText = encodeURIComponent(text);

    if(tipo === "immagine"){
        const imgRequest = img_api_endpoint + '?key='  + key_img + '&q=' + encodeText + '&per_page=' + numResults;
        fetch(
            imgRequest
        ).then(onResponse).then(onImgJson);
    }

    if(tipo === "gif"){
        const gifRequest = gif_api_endpoint + '?api_key='  + key_gif + '&q=' + encodeText + '&limit=' + numResults;
        fetch(
            gifRequest
        ).then(onResponse).then(onGifJson);
    }
}

const form = document.forms["form_ricerca"];
form.addEventListener("submit", sendRequest);