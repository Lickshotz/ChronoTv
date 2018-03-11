<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>

<html lang = "de">
   
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Chrono-TV_Upload</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <link href = "css/main.css" rel = "stylesheet">
            <link href = "css/font-awesome.css" rel = "stylesheet"> 
   </head>
   <script>
      function goback() {
        history.go(-1);
      }
       </script>
	
   <body>  
<div class ="nav">
		<div class="zurueck btn btn-lg" onclick="javascript:goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</div>
		<div class="ueberschrift"><u>Medienwahl</u></div>
		<div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i>
Ausloggen</div>
	</div>
<div class="box">
<div class="aLinks" onclick="location.href='selectPage.php'"><i class="fa fa-unlock fa-5x" aria-hidden="true"></i><br><h3>&Ouml;ffentlich</h3></div>
<div class="aRechts" onclick="location.href='privSelectPage.php'"><i class="fa fa-lock fa-5x" aria-hidden="true"></i><br><h3>Privat</h3></div>
</div>

       
   </body>
</html>