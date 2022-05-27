<!--
SCALA SALVATORE GAETANO O46001744
-->

<?php
    session_start();

    if(isset($_SESSION["nickname"])){
        header("Location: home.php");
        exit;
    }
    if( isset($_POST["nome"]) && isset($_POST["cognome"]) && 
        isset($_POST["nickname"]) && isset($_POST["email"]) && 
        isset($_POST["password"]) && isset($_POST["conferma"]) )
    {
        $conn = mysqli_connect("localhost", "root", "", "hw1") or 
            die("Errore connessione: ".mysqli_connect_error());

        
        $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
        $cognome = mysqli_real_escape_string($conn, $_POST["cognome"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $nickname = mysqli_real_escape_string($conn, $_POST["nickname"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $conferma = mysqli_real_escape_string($conn, $_POST["conferma"]);
        
        /*

        //?
        $lista_utenti_registrati = mysqli_query($conn, "SELECT * FROM utenti");
        json_encode($lista_utenti_registrati);
        //?

        */

        $nickname_in_uso = mysqli_query($conn, "SELECT * FROM utenti WHERE nickname LIKE '".$nickname."'");



        if($password !== $conferma){
            $errore_password = true;
        } else  if(strlen($password ) < 4 || strlen($conferma) < 4){
            $errore_lunghezza_password = true;

        } else  if($nickname === $nickname_in_uso){//?
            $errore_nickname_in_uso = true;
        } else  if (
            strlen($nome) === 0 ||
            strlen($cognome) === 0 ||
            strlen($email) === 0 ||
            strlen($nickname) === 0 ||
            strlen($password) === 0 ||
            strlen($conferma) === 0
        ){
            $errore_campi_vuoti = true;
        } 
        else if( //?
            strpos($_POST["nickname"], "{") === true || 
            strpos($nickname, "}") === true ||
            strpos($nickname, "#") === true ||
            strpos($nickname, "@") === true ||
            strpos($nickname, ";") === true ||
            strpos($nickname, "-") === true ||
            strpos($nickname, "/") === true ||
            strpos($nickname, "°") === true 
            
        ){
            $errore_caratteri_nickname = true;
        } 
        else {
            
            $query="INSERT INTO utenti(nome, cognome, email, nickname, password_utente, conferma_password) VALUES('".$_POST["nome"]."', '".$_POST["cognome"]."', '".$_POST["email"]."', '".$_POST["nickname"]."', '".$_POST["password"]."', '".$_POST["conferma"]."')"
                or die("Errore: ".mysqli_error($conn)) or die("Errore: ".mysqli_error($conn));
            

            $_SESSION["nickname"] = $nickname;
            mysqli_query($conn, $query);

            header("Location: login.php");
            mysqli_close($conn);
            exit;
        }
        
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="iscriviti.js" defer></script>
    <link rel="stylesheet" href="iscriviti.css"/>


    <link rel="stylesheet" href="darkMode.css">
    <script src="darkMode.js" defer></script>

    <title>Iscriviti</title>
    
</head>


<body class="dark_body_iscriviti">
        <main class="dark_main_iscriviti">
            
            <form method="post" nome="form_iscrizione">
                <h1>Iscriviti</h1>

                <label><p><input type="text" name="nome" placeholder="nome"></p></label>
                <label><p><input type="text" name="cognome" placeholder="cognome"></p></label>
                <label><p><input type="text" name="nickname" placeholder="nickname"></p></label>
                <label><p><input type="text" name="email" placeholder="e-mail"></p></label>

                
                <label><p>
                    <input type="password" name="password" placeholder="password" class="pass_style1">
                    <input type="checkbox" class="cambia1">
                </p></label>
                <label><p>
                    <input type="password" name="conferma" placeholder="conferma password" class="pass_style2">
                    <input type="checkbox" class="cambia2">
                </p></label>
                

                <div class="two_button">
                    &nbsp;<input type="submit"  value="iscriviti">
                    <a href="login.php">indietro</a>
                </div>
                <?php
                    
                    if (isset($errore_campi_vuoti)){
                        echo "<p>Compilare tutti i campi</p>";
                    } else if(isset($errore_password)){ 
                        echo "<p> Errore password! </p></br>"; 
                    } else if(isset($errore_lunghezza_password)){
                        echo "<p> La password deve contenere minimo 4 caratteri</p></br>";
                    } else if(isset($errore_nickname_in_uso)){ //?
                        echo "<p>Nickname già in uso</p></br>";
                    } else if(isset($errore_caratteri_nickname)){
                        echo "<p>Caratteri nickname non validi!</p></br>";
                    }
                    
                ?>
            </form>
        </main>
        <img src="img/dmIcon.png" class="dm" onclick="darkModeIscriviti()"/>


</body>

</html> 