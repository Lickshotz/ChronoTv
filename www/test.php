<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <title>Chrono-TV_Upload</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

</head>

<script>
    function goback() {
        history.go(-1);
    }

</script>



<body class="backgr">
    <!---- NAV MENU ------>
    <div class="infos"><i class="fa fa-unlock" aria-hidden="true"></i> /&ouml;ffentlich</div>
    <div class="nav">
        <div class="zurueck btn btn-lg" onclick="javascript:goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</div>
        <div class="ueberschrift"><i class="fa fa-upload" aria-hidden="true"></i> <u>Kategorie/User Add  Information</u></div>
        <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
        </div>
        
    </div>
    <!---- END NAV MENU ------>


    <div class="uploadPageStyle">
        <h2>
                
            <img src="" alt='Bild' height='150' width='200'> 
    </div>
</body>

</html>
