<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>

<?php
    include 'connect_DB.php';
        $categoryId = $_POST['categoryID'];
?>

<!DOCTYPE html>
  <html lang = "de">
   
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta charset="UTF-8"> 
     
     
      <title>Chrono-TV_Upload</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <link href = "css/main.css" rel = "stylesheet">
	  <link href = "css/font-awesome.css" rel = "stylesheet"> 
      
   </head>
   
   <script>
      function goback() {
        history.go(-1);
      }
     
     
       
       function del(){
           if(confirm("Soll der Datensatz wirklich aktualisiert werden?") == true)
              document.form.submit();
        }
     
     
      
   </script>
    
<?php
    $value = $_POST["ID"];
    $type = $_POST["type"];
    $private = $_POST["private"];
      
      
if($private == 'no'){
    if($type == 'Image'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Bilder aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen Bver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Image' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktuelles Bild</span> <i class='fa fa-file' aria-hidden='true'></i>
                 <br><br>
                     <img src='". $row['Source1'] . "' alt='Bild' class='zoom' height='150' width='200' style='margin-bottom: 20px;'> 
                     <br><br>
                     <span class='headline'>1.2 anderes Bild wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktuelles Thema  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuelles Thema ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewähltes Thema</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END IMAGE
    else if($type == 'YT'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Video aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen videover edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='YT' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktuelles Video</span> <i class='fa fa-file' aria-hidden='true'></i>
                 <br><br>
                     <iframe width='300' height='200' src='https://www.youtube.com/embed/". $row['Source1'] . "' frameborder='0' allowfullscreen></iframe> 
                     <br><br>
                     <span class='headline'>1.2 Neuen Link eintragen</span> 
                    <input type='text' name=link' value='Link des Videos'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktuelles Thema  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuelles Thema ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewähltes Thema</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END YT
    else if($type == 'Audio'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>MP3 aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen musikver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Audio' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktueller Track</span> 
                     <br><br>
                     <a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a>
                     <br><br>
                     <span class='headline'>1.2 andere MP3 Datei wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktuelles Thema  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuelles Thema ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewähltes Thema</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END Audio
    else if($type == 'Text'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Text aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen Textver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Text' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktueller Text</span> 
                     <br><br>
                     <a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a>
                     <br><br>
                     <span class='headline'>1.2 andere Text Datei wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktuelles Thema  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuelles Thema ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewähltes Thema</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END Text
    else{}
}
else if($private == 'yes'){
    if($type == 'Image'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Bilder aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen Bver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Image' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktuelles Bild</span> <i class='fa fa-file' aria-hidden='true'></i>
                 <br><br>
                     <img src='". $row['Source1'] . "' alt='Bild' class='zoom' height='150' width='200' style='margin-bottom: 20px;'> 
                     <br><br>
                     <span class='headline'>1.2 anderes Bild wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktueller Benutzer  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 0 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuellen Benutzer ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewählter Benutzer</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 0 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END IMAGE
    if($type == 'YT'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Video aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen videover edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='YT' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktuelles Video</span> <i class='fa fa-file' aria-hidden='true'></i>
                 <br><br>
                     <iframe width='300' height='200' src='https://www.youtube.com/embed/". $row['Source1'] . "' frameborder='0' allowfullscreen></iframe> 
                     <br><br>
                     <span class='headline'>1.2 Neuen Link eintragen</span> 
                    <input type='text' name=link' value='Link des Videos'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktueller Benutzer  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 0 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuellen Benutzer ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewählter Benutzer</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 0 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END YT
    if($type == 'Audio'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>MP3 aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen musikver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Audio' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktueller Track</span> 
                     <br><br>
                     <a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a>
                     <br><br>
                     <span class='headline'>1.2 andere MP3 Datei wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktueller Benutzer  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 0 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuellen Benutzer ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewählter Benutzer</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 0 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END Audio
    if($type == 'Text'){
        
        
        $querySelect = "SELECT * FROM `Media` WHERE `MID` = '". $value ."'";
        $resultTwo = mysqli_query($con, $querySelect);
        
      
       while ($row = mysqli_fetch_array($resultTwo)){
            
        
      
      echo " 
        <body class='backgr' >
        <!---- NAV MENU ------>
            <div class='infos'><i class='fa fa-unlock' aria-hidden='true'></i> /&ouml;ffentlich</div>
            <div class ='nav'>
                <div class='zurueck btn btn-lg' onclick='javascript:goback()'><i class='fa fa-arrow-left' aria-hidden='true'></i> Zurück</div>
                <div class='ueberschrift'><i class='fa fa-camera' aria-hidden='true'></i> <u>Text aktualisieren</u></div>
                <div class='ausloggen btn btn-lg' onclick='location.href=logout.php'> <i class='fa fa-sign-out' aria-hidden='true'></i>
        Ausloggen</div>
            </div> 
        <!---- END NAV MENU ------>

        <!-------- Hochladen ------------>
        <div class='auswahlboxen Textver edit'>
            <legend>Hochladen</legend>
            <form action='update.php' method='post' enctype='multipart/form-data'>
                 <input type='hidden' value='Text' name='type'>
                 <input type='hidden' value='".$value."' name='ID'>
                 <div class='uploadBox'>
                     <span class='headline'>1.1 aktueller Text</span> 
                     <br><br>
                     <a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a>
                     <br><br>
                     <span class='headline'>1.2 andere Text Datei wählen</span> <i class='fa fa-file' aria-hidden='true'></i>
                     <input type='file' name='fileToUpload' id='fileToUpload' class='btn btn-lg btn-primary btn-block submitButton'>
                     <br><br>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>2.1 aktueller Benutzer  <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>";
        
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 0 AND `UID` = ".$row['User']."";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($reihe = mysqli_fetch_array($result))
                      echo "<input type='text' value='". $reihe['Name']."' name='cate' disabled='true'>";
        
       
                    
              echo "<br><br>
                    <span class='headline'>2.2 aktuellen Benutzer ändern <i class='fa fa-folder' aria-hidden='true'></i></span><br><br>
                    <select name='category'>
                       <option value='NULL'>Oben gewählter Benutzer</option>
                       
                       "; 
                            /*QUERY THEMEN ABFRAGE*/
                             $sql = 'SELECT * FROM `User` WHERE `Public` = 0 ORDER BY Name ASC';
                             $result = mysqli_query($con,$sql) OR die(mysqli_error());

                            while($reihe = mysqli_fetch_array($result))
                              echo "<option value=".$reihe['UID'].">".$reihe['Name']."</option>;";
                      echo "
                    </select>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>3. aktuelle Beschreibung <i class='fa fa-pencil' aria-hidden='true'></i></span>
                    <br><br>
                    <textarea name='beschreibung' style='width: 300px;
  height: 150px;'>". $row['Source2']."</textarea>
                </div>
                <div class='uploadBox'>
                    <span class='headline'>4. Datensatz aktualisieren <i class='fa fa-upload' aria-hidden='true'></i></span>
                    <br><br>
                    <input type='submit' value='Aktualisieren' name='submit'  class='button btn btn-lg' >
                </div>
            </form>
        </div>
        
        
        
        ";
       
        
        }// END WHILE
    }// END Text
}
   ?>
   </body>
</html>