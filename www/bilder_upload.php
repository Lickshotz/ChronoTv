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
     
     
     function showUser(str) {
       
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getbilder.php?q="+str,true);
        xmlhttp.send();
    }
}
       
       function del(){
           if(confirm("Soll der Datensatz wirklich gelöscht werden?") == true)
              document.form.submit();
        }
     
     
      
   </script>
    
   
   
   
   
 <body class="backgr" >
<!---- NAV MENU ------>
 	<div class="infos"><i class="fa fa-unlock" aria-hidden="true"></i> /&ouml;ffentlich</div>
    <div class ="nav">
		<div class="zurueck btn btn-lg" onclick="javascript:goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</div>
		<div class="ueberschrift"><i class="fa fa-camera" aria-hidden="true"></i> <u>Bilder</u></div>
		<div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i>
Ausloggen</div>
	</div> 
<!---- END NAV MENU ------>

<!-------- Hochladen ------------>
<div class="auswahlboxen Bver upload">
	<legend>Hochladen</legend>
	<form action="upload.php" method="post" enctype="multipart/form-data">
         <input type="hidden" value="Image" name="type">	 
         <div class="uploadBox">
			 <span class="headline">1. Datei Auswählen</span> <i class="fa fa-file" aria-hidden="true"></i>
         <br><br>
			 <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-lg btn-primary btn-block submitButton">
		</div>
		<div class="uploadBox">
			<span class="headline">2. Thema wählen  <i class="fa fa-folder" aria-hidden="true"></i></span>
			<br><br>
			<select name='category'>
               <option value="NULL">Alle Themen</option>
                <?php
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($row = mysqli_fetch_array($result))
                      echo "<option value='".$row['UID']."'>".$row['Name']."</option>";
                ?>
            </select>
    	</div>
        <div class="uploadBox">
            <span class="headline">3. Beschreibung hinzufügen <i class="fa fa-pencil" aria-hidden="true"></i></span>
            <br><br>
			<textarea value="Beschreibung..." name="beschreibung" style="width: 300px;
  height: 150px;"></textarea>
    	</div>
    	<div class="uploadBox">
            <span class="headline">4. Datei hochladen <i class="fa fa-upload" aria-hidden="true"></i></span>
            <br><br>
			<input type="submit" value="Hochladen" name="submit"  class="button btn btn-lg" >
    	</div>
	</form>
</div>
<!-------- END Hochladen ------------>



<!----------------- Tabelle ------------------>


<div class="auswahlboxen Bver">
<legend>Bilder nach Themen geordnet</legend>
		
        
        
    <select name="user" class="choose" onchange="showUser(this.value)" onLoad="showUser(this.value)" value="0">
                <option value="" selected>Bitte ein Thema wählen...</option>
               <option value="0">Alle Themen</option>
                <?php
                    /*QUERY THEMEN ABFRAGE*/
                     $sql = "SELECT * FROM `User` WHERE `Public` = 1 ORDER BY Name ASC";
                     $result = mysqli_query($con,$sql) OR die(mysqli_error());
               
                    while($row = mysqli_fetch_array($result)){
                      echo "<option value='".$row['UID']."'>".$row['Name']."</option>";
                    }
                    
                ?>
       </select>     
       
       <div class="buttonThema btn btn-lg" onclick="location.href='kategorieVerwaltung.php'">
            <i class="fa fa-plus" aria-hidden="true"></i>   Thema hinzufügen
        </div>
  
      <div id="txtHint"></div>
        
    

<!-------------- ENDE TABELLE ------------------>
        </div>
   </body>
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
</html>