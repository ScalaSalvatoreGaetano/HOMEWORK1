<!--
SCALA SALVATORE GAETANO O46001744
-->

<?php
session_start();
if(!isset($_SESSION["nickname"]))
{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@900&display=swap" rel="stylesheet">

    <script src="home.js" defer></script>
    <link rel="stylesheet" href="home.css"/>

    <link rel="stylesheet" href="darkMode.css">
    <script src="darkMode.js" defer></script>

    <title>Home</title>
</head>
<body>
    <nav>
        <h1 id="apri" onclick="apri_sidebar()">☰</h1>
        <h1>HOME PAGE</h1>
        <a href="logout.php">Esci</a>
    </nav>


        <form name ='form_ricerca'> 

            <!-- id=autore -->
            <input name="ricerca" type="text" id="ricerca" placeholder = "inserisci il testo"/>

            <select name = 'tipo' id='tipo'>
                <option value='immagine'>Immagine</option>
                <option value='gif'>GIF</option>
            </select>
            <label>&nbsp;<input class="submit" type="submit"/></label>
        </form>


        <div id="sidebar" class="hidden" >
            <p id="x" onclick="chiudi_sidebar()"> X</p>

            
            <div class='box_carrello'>
                <img id="carrelloSpesa" src="img/carrello.png"/>
                <h3 id="numeroProdotti">0</h3>
                <p id="totaleConto">totale €: 0</p>
            </div>

            <p class="nome">Utente: <?php echo $_SESSION["nickname"]; ?></p>


            <img src="img/dmIcon.png"  id="darkImg" onclick="changeModeHome()" onclick="changeModeSidebar()"/>
            
            <a href="info_account.php" class="info">Info account</a>
        </div>
        
        <main>
            
        </main> 

        


    <footer>Scala Salvatore Gaetano - O46001744</footer>
</body>
</html>


