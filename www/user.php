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
        <div class="ueberschrift"><i class="fa fa-upload" aria-hidden="true"></i> <u>Kategorie/User Add  Information</u></div>
        <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
        </div>
        
    </div>
    <!---- END NAV MENU ------>


    <div class="uploadPageStyle">
        <h2>

            <?php

$type = $_POST['type'];

if($type == 'category'){
        $category = $_POST["categoryName"];
        
        $einlesen = mysqli_query($con,"SELECT Name FROM User WHERE Name='".$category."'");
        if(mysqli_num_rows($einlesen)==1){
            echo "Eintrag fehlgeschlagen!        ";
            echo "Kategorie schon vorhanden!";
        }
        else{
            
                $sql = "INSERT INTO `User`(`UID`, `Name`, `Public`) VALUES (NULL,'".$category."',1)";

                $result = mysqli_query($con, $sql);

                if(!$result){
                    echo "Eintrag fehlgeschlagen!";
                }
                else{
                    echo "Eintrag erfolgreich!";
                }
            };
}
else if($type == 'user'){
    
        $username = $_POST["username"];
    
        $einlesen = mysqli_query($con, "SELECT Name FROM User WHERE Name='".$username."'");
        if(mysqli_num_rows($einlesen)==1){
            echo "Eintrag fehlgeschlagen!         ";
            echo "User schon vorhanden!";
        }
        else{
    
    
                
                $sql = "INSERT INTO `User`(`UID`, `Name`, `Public`) VALUES (NULL,'".$username."',0)";

                $result = mysqli_query($con, $sql);

                if(!$result){
                    echo "Eintrag fehlgeschlagen!";
                }
                else
                {
                    echo "Eintrag erfolgreich!";
                }
        };
    
        
        
}     
else{
    echo "FEHLER!!!";
}
?>
        </h2>
    </div>
</body>

</html>
