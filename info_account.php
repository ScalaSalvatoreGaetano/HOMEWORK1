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

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="info_account.css"/>
    
    <link rel="stylesheet" href="darkMode.css">
    <script src="darkMode.js" defer></script>
    <title>info account</title>
</head>

<body id="corpo_info">
    <main class="scheda_utente">
        <h2 class="h_info">INFO ACCOUNT</h2>
        <img src="img/u2.png">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "hw1") ;#or die("Errore connessione: ".mysqli_connect_error());
    
            
        
            $query = "SELECT * FROM utenti WHERE nickname = '".$_SESSION["nickname"]."'";
            $res = mysqli_query($conn, $query);

            while($o = mysqli_fetch_object($res)){

                echo "<p>Nome: <strong>".$o->nome."</strong></p>"; 
                echo "<p>Cognome: <strong>".$o->cognome."</strong></p>"; 
                echo  "<p>nickname: <strong>".$o->nickname."</strong></p>"; 
                echo "<p>e-mail: <strong>".$o->email ."</strong></p>";
                echo "<p>password: <strong>".$o->password_utente."</<strong></p>";
            }

            mysqli_free_result($res);
            mysqli_close($conn);
        ?>

        <div class ="link">
            <a href="home.php">indietro</a>
            <a href="logout.php">esci</a>
        </div>

    </main>
    <img src="img/dmIcon.png" class="dmInfo" 
    onclick="changeModeInfo()"
    onclick="cambiaBottoniInfo()"/>
</body>
</html>