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
    
    function del(){
       if(confirm("Soll der Datensatz wirklich gelöscht werden?") == true){
          document.form.submit();
          return true;
        }
        else{
            return false;
        }
    }

</script>

<body class="privat">
    <div class="infos"><i class="fa fa-lock" aria-hidden="true"></i> Privat</div>
    <div class="nav">
        <div class="zurueck btn btn-lg" onclick="javascript:goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Zurück</div>
        <div class="ueberschrift"> <u>Benutzer-Verwaltung</u></div>
        <div class="ausloggen btn btn-lg" onclick="location.href='logout.php'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Ausloggen
        </div>
    </div>


    <!-------- Hochladen ------------>
    <div class="auswahlboxen benutzer upload">
        <legend>Benutzer</legend>
        <form action="user.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="user" name="type">
            <div class="KategoryBox">
                <span class="headline">1. Benutzer eintragen</span> <i class="fa fa-pencil" aria-hidden="true"></i>
                <br><br>
                <input type="text" size="20" name="username" required="required" />
            </div>

            <div class="KategoryBox">
                <span class="headline">2. Benutzer hinzufügen <i class="fa fa-plus" aria-hidden="true"></i></span>
                <br><br>
                <input type="submit" value="Hinzufügen" name="submit" class="button btn btn-lg">
            </div>
        </form>
    </div>
    <!-------- END Hochladen ------------>



    <!----------------- Tabelle ------------------>


    <div class="auswahlboxen benutzer">

        <?php	
                $sql = "SELECT * FROM User WHERE Public = 0 ORDER BY Name ASC";
                $result = mysqli_query($con,$sql);

                echo "<table class='table-style-two'>";
                echo "<tr>
                        <th>Benutzer ID</th>
                        <th>Name</th>
                        <th>Löschen</th>
                      </tr>";
                if (!$result)
                {
                    echo "FEHLER!!!!!!!!;";
                  echo "<tr>
                        <td>1</td>
                            <td>ID</td>
                            <td>Name des Benutzers</td>
                            <td class='test'>
                                <button>
                                    <div class='delLink'>
                                        <i class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                                    </button>
                            </div>
                            </a>
                            </td>
                    </tr>";
                }
                else{
                    while ($row = mysqli_fetch_array($result))
                    {

                      echo "<tr>";
                        echo "<td>".$row[UID]."</td>";
                        echo "<td>". $row['Name'] . "</td>";
                          echo "<td class='test'><form action='userDelete.php' method='post' onsubmit='return del()'>
                                                    <input type='hidden' name='type' value='user'>
                                                    <input type='hidden' name='ID' value='". $row[UID] ."'>
                                                    <button type='submit' name ='submit' value ='Button'>
                                                        <i class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                                                    </button>
                                                </form>
                                </td>";
                        echo "</tr>";
                    }
                } 			
                echo "</table>";
            ?>
            <!-------------- ENDE TABELLE ------------------>
    </div>



</body>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
