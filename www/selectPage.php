<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>

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

    <body class="offentlich">
        <div class="infos"><i class="fa fa-unlock" aria-hidden="true"></i> /&ouml;ffentlich</div>
        <div class="nav">
            <div class="zurueck btn btn-lg" onclick="javascript:goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</div>
            <div class="ueberschrift"><u>Medienwahl</u></div>
            <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
            </div>
        </div>
        <div class="box">

            <div class="Texte" onclick="location.href='text_upload.php'"><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i><br>
                <h3>Texte</h3>
            </div>
            <div class="Musik" onclick="location.href='musik_upload.php'"><i class="fa fa-music fa-5x" aria-hidden="true"></i><br>
                <h3>Musik</h3>
            </div><br>
            <div class="Bilder" onclick="location.href='bilder_upload.php'"><i class="fa fa-camera fa-5x" aria-hidden="true"></i><br>
                <h3>Bilder</h3>
            </div>
            <div class="Videos" onclick="location.href='video_upload.php'"><i class="fa fa-video-camera fa-5x" aria-hidden="true"></i><br>
                <h3>Videos</h3>
                </i>
            </div>
        </div>

    </body>

    </html>
