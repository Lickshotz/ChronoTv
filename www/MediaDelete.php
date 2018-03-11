<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>
<?php
    include 'connect_DB.php';
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
        <div class="ueberschrift"><i class="fa fa-upload" aria-hidden="true"></i> <u>Datei Löschen</u></div>
        <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
        </div>
    </div>
    <!---- END NAV MENU ------>


    <div class="uploadPageStyle">
        <h2>
            <?php

    $value = $_POST["ID"];
    $type = $_POST["type"];

    if($type == 'Image'){
        
        
        $querySelect = "SELECT `Source1` FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
        while ($row = mysql_fetch_array($resultTwo))
        {
           echo "</br> Gelöscht: ".$row['Source1']." - ";
            unlink($row['Source1']);
        }
        
        if(!$resultTwo){
                echo "Datei löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($resultTwo);
            }
            else{
                echo "Datei löschen erfolgreich!</br></br>";
                mysqli_free_result($resultTwo);
                    
            }
        
        
        $query = "DELETE FROM `Media` WHERE `MID`= '". $value ."'";
        $result = mysqli_query($con, $query);
        
        
        
        
        if(!$result){
                echo "Datenbankeintrag löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($result);
            }
            else{
                echo "Datenbankeintrag löschen erfolgreich!</br></br>";  
                mysqli_free_result($result);
                    
            }
        
    }
    else if($type == 'YT'){
        
        $query = "DELETE FROM `Media` WHERE `MID`= '". $value ."'";
        $result = mysqli_query($con, $query);
        
        
        
        
        if(!$result){
                echo "Datenbankeintrag löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($result);
            }
            else{
                echo "Datenbankeintrag löschen erfolgreich!</br></br>";  
                mysqli_free_result($result);
                    
            }
    }
    else if($type == 'Text'){
        
        $querySelect = "SELECT `Source1` FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
        while ($row = mysqli_fetch_array($resultTwo)){
            echo "</br>Gelöscht: ".$row['Source1']." - ";
            unlink($row['Source1']);
        }
        
        if(!$resultTwo){
                echo "Datei löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($resultTwo);
            }
            else{
                echo "Datei löschen erfolgreich!</br></br>";
                mysqli_free_result($resultTwo);
                    
            }
        
        
        $query = "DELETE FROM `Media` WHERE `MID`= '". $value ."'";
        $result = mysqli_query($con, $query);
        
        
        
        
        if(!$result){
                echo "Datenbankeintrag löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($result);
            }
            else{
                echo "Datenbankeintrag löschen erfolgreich!</br></br>";  
                mysqli_free_result($result);
                    
            }
    }
    else if($type == 'Audio'){
        
        $querySelect = "SELECT `Source1` FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
        while ($row = mysqli_fetch_array($resultTwo)){
            echo "</br>Gelöscht: ".$row['Source1']." - ";
            unlink($row['Source1']);
        }
        
        if(!$resultTwo){
                echo "Datei löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($resultTwo);
            }
            else{
                echo "Datei löschen erfolgreich!</br></br>";
                mysqli_free_result($resultTwo);
                    
            }
        
        
        $query = "DELETE FROM `Media` WHERE `MID`= '". $value ."'";
        $result = mysqli_query($con, $query);
        
        
        
        
        if(!$result){
                echo "Datenbankeintrag löschen fehlgeschlagen!</br></br>";
                mysqli_free_result($result);
            }
            else{
                echo "Datenbankeintrag löschen erfolgreich!</br></br>";  
                mysqli_free_result($result);
                    
            }
        
    }
    else{
        echo "Es ist ein fehler aufgetreten: Unbekannter Datei-Typ</br></br>";
    }
    


?>
        </h2>
    </div>
</body>

</html>
