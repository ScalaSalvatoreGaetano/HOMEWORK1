<?php
session_start();
if( isset($_SESSION["nickname"]) ){
    header("Location: home.php");
    exit;
}

if(isset($_POST["nome"]) && isset($_POST["password"])){
    $conn = mysqli_connect("localhost", "root", "", "hw1") 
        or die("Errore connessione: ".mysqli_connect_error());
    
    $nickname = mysqli_real_escape_string($conn, $_POST["nome"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM utenti WHERE nickname = '".$nickname."' AND password_utente = '".$password."'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0)
    {
        $_SESSION["nickname"] = $nickname;
        header("Location: home.php");
        exit;
    }  else {
        $flag = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>

    <link rel="stylesheet" href="darkMode.css">
    <script src="darkMode.js" defer></script>

    <title>HW1</title>

    
</head>

<body>
    <main>
        <div class='box'>
         
        </div>

        
        <form name="nome_form" method="post">
            <h1>Login</h1>
            <input type="text" name="nome" placeholder="nickname">
            <input id="pass" type="password" name="password" placeholder="password">
            <p><input id="click" type="checkbox">mostra password</p>
            &nbsp;<input type="submit" value="accedi" id="login">
            </br>       
            <a href="iscriviti.php" class="link_iscriviti">iscriviti</a>
            <img src="img/dmIcon.png" 
            onclick="changeMode()"/>

            <?php
            if(isset($flag)){
                echo "<p class = 'errore'>Errore di accesso! <p>";
            }
            ?>
        </form>
    </main>
    
</body>
</html>