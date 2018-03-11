<?php
    ob_start();
   session_start();
?>

<html lang="de">

<head>
    <title>Chrono-TV_Upload</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body>
    <h1>Chrono-Tv 3.0 Upload Page</h1>
    <h3>Enter Username and Password</h2>
        <div class="container form-signin">
            <?php
        define('MD5_ENCRYPT', false); 
        define('SUCCESS_URL', 'select.php'); 
        define('LOGIN_FORM_URL', 'index.php');
        
        // Array mit Benutzerdaten: Besteht aus Array-Elementen mit paarweisen Benutzernamen und Passwörtern
        $usrdata = array(

        array(
            "usr" => "chronotv",
            "pwd" => "drei"
        ),
        /**
        array(
            "usr" => "benutzername",
            "pwd" => "passwort"
        );
        **/
        );


        header("Content-Type: text/html; charset=utf-8");

        session_start();
            
        $_SESSION['logged_in'] = (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) ? true : false;
        $_SESSION['usr'] = (isset($_SESSION['usr'])) ? $_SESSION['usr'] : '';

        $error = array();

        if(!isset($_POST['login'])){
            header('Location: '.LOGIN_FORM_URL);
        }else{
            $usr = (!empty($_POST['user']) && trim($_POST['user']) != '') ? $_POST['user'] : false;
            $pwd = (!empty($_POST['password']) && trim($_POST['password']) != '') ? $_POST['password'] : false;

            if(!$usr || !$pwd){
                if(count($error) == 0)
                    $error[] = "Bitte geben Sie Benutzername und Passwort ein.";
            }else{
                $pwd = (MD5_ENCRYPT === true) ? md5($pwd) : $pwd; // Passwort eingabe MD5-encrypten, falls Option gesetzt ist
                foreach($usrdata as $ud){ // Benutzer-Liste durchlaufen und je mit Formular-Eingaben vergleichen
                    if($usr != $ud['usr'] || $pwd != $ud['pwd']){
                        if(count($error) == 0)
                            $error[] = "Benutzername und/oder Passwort nicht korrekt.";
                    }else{
                        $_SESSION['logged_in'] = true;
                        $_SESSION['usr'] = $usr;
                        header('Location: '.SUCCESS_URL);
                    }
                }
            }
        }
        ?>
            
        </div>
        <!-- /container -->
        <ul>
            <?php
                foreach($error as $out){
            ?>
            
                <li>
                    <?php echo $out; ?>
                </li>
            <?php
                }
            ?>
        </ul>
        <p><a href="<?php echo LOGIN_FORM_URL; ?>">Zur Anmeldeseite</a></p>
</body>

</html>
