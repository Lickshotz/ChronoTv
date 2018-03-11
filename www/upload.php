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
        <div class="ueberschrift"><i class="fa fa-upload" aria-hidden="true"></i> <u>Info</u></div>
        <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
        </div>
    </div>
    <!---- END NAV MENU ------>


    <div class="uploadPageStyle">
        <h2>


            <?php

$type = $_POST["type"];
$category = $_POST["category"];
$beschreibung = $_POST["beschreibung"];
$name = $_POST["name"];
$link = $_POST["link"];
$array = explode("=",$link);
$ytcode = $array[1];

if($category == "NULL"){
  echo "Fehler! Keine Kategorie oder kein Benutzer ausgewählt.</br></br>";
}
else{
    if($type == 'Image' ){
        $target_dir = "upload/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "Datei ist keine Bilddatei.</br></br>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Es existiert bereits eine Datei mit diesem Namen.</br></br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
           $filzesize = $_FILES["fileToUpload"]["size"];
            echo "Die Datei ist zu groß.</br>";
            echo "Dateigröße: ".$filesize." (Erlaubt: Max. 10 Megabyte)</br></br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
        && $imageFileType != "GIF" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Hochgeladener Dateityp: ".$imageFileType. " - ";
            echo "Nur JPG, JPEG, PNG & GIF Dateien sind erlaubt.</br></br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Ihre Datei wurde nicht hochgeladen.</br></br>";
        // if everything is ok, try to upload file
        } else {
                    $query = "INSERT INTO `Media` (`MID`, `OfType`, `Name`, `User`, `Source1`,`Source2`) VALUES (NULL, '".$type."', '".$_FILES["fileToUpload"]["name"]."', '".$category."','". $target_file ."','".$beschreibung."')";
                    $result = mysqli_query($con, $query);


            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Die Datei ". basename( $_FILES["fileToUpload"]["name"])." wurde hochgeladen.</br></br>";


                if(!$result){
                    echo "Datenbank Eintrag fehlgeschlagen!</br></br>";
                }
                else{
                    echo "Datenbank Eintrag erfolgreich!</br></br>";                     
                }

            } else {
                echo "Es ist ein Fehler beim hochladen aufgetreten.</br></br>";
            }
        }
    }
    else if($type == 'Text'){
        $target_dir = "upload/text/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $textFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(isset($_POST["submit"])) {
            $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "Datei ist keine Textdatei. </br></br>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Es existiert bereits eine Datei mit diesem Namen. </br></br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
           $filzesize = $_FILES["fileToUpload"]["size"];
            echo "Die Datei ist zu groß.</br>";
            echo "Dateigröße: ".$filesize." (Erlaubt: Max. 10 Megabyte)</br></br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($textFileType != "txt" && $textFileType != "TXT") {
            echo "Erlaubtes Dateiformat: .txt</br></br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Ihre Datei wurde nicht hochgeladen</br></br>";
        // if everything is ok, try to upload file
        } else {

            echo $_FILES["fileToUpload"]["name"];
                    echo $target_file;

                    $query = "INSERT INTO `Media` (`MID`, `OfType`, `Name`, `User`, `Source1`,`Source2`) VALUES (NULL, '".$type."', '".$_FILES["fileToUpload"]["name"]."', '".$category."','". $target_file ."','".$beschreibung."')";
                    $result = mysqli_query($con, $query);


            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</br></br>";


                if(!$result){
                    echo "Datenbank Eintrag fehlgeschlagen!</br></br>";
                }
                else{
                    echo "Datenbank Eintrag erfolgreich!</br></br>";  

                }

            } else {
                echo "Es ist ein Fehler beim hochladen aufgetreten.</br></br>";
            }
        }
    }
    else if($type == 'YT'){
        $query = "INSERT INTO `Media` (`MID`, `OfType`, `Name`, `User`, `Source1`,`Source2`) VALUES (NULL, '".$type."', '".$name."', '".$category."','". $ytcode ."','".$beschreibung."')";
        $result = mysqli_query($con, $query);
        if(!$result){

                    echo "Datenbank Eintrag fehlgeschlagen!</br></br>";
                }
                else{
                    echo "Video mit dem Titel ".$name." wurde eingetragen!</br></br>";
                    echo "Datenbank Eintrag erfolgreich!</br></br>";  

                }

    }
    else if($type == 'Audio'){
        $target_dir = "upload/audio/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            /*$check = filesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;

            } else {
                echo "Datei ist keine Audiodatei.</br></br>";
                $uploadOk = 0;
            }*/
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Es existiert bereits eine Datei mit diesem Namen. </br></br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 20000000) {
           $filzesize = $_FILES["fileToUpload"]["size"];
            echo "Die Datei ist zu groß.</br>";
            echo "Dateigröße: ".$filesize." (Erlaubt: Max. 20 Megabyte)</br></br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($audioFileType != "mp3" && $audioFileType != "MP3") {
            echo "Erlaubtes Dateiformat: .mp3</br></br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Ihre Datei wurde nicht hochgeladen</br></br>";
        // if everything is ok, try to upload file
        } else {

            echo $_FILES["fileToUpload"]["name"];
                    echo $target_file;
                    $query = "INSERT INTO `Media` (`MID`, `OfType`, `Name`, `User`, `Source1`,`Source2`) VALUES (NULL, '".$type."', '".$_FILES["fileToUpload"]["name"]."', '".$category."','". $target_file ."','".$beschreibung."')";
                    $result = mysqli_query($con, $query);


            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Die Datei ". basename( $_FILES["fileToUpload"]["name"]). " wurde hochgeladen.</br></br>";


                if(!$result){
                    echo "Datenbank Eintrag fehlgeschlagen!</br></br>";
                }
                else{
                    echo "Datenbank Eintrag erfolgreich!</br></br>";  

                }

            } else {
                echo "Es ist ein Fehler beim hochladen aufgetreten.</br></br>";
            }
        }
    }
}

?>
        </h2>
    </div>
</body>

</html>
