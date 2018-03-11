<?php
    session_start();
    if(!$_SESSION['logged_in'])
        header("Location: index.php");
?>
<?php
    include 'connect_DB.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Chrono-TV_Upload</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <style>


    </style>
</head>

<body>
    <?php	
  include 'connect_DB.php';
  
		/* QUERY TABELLEN ABFRAGE */
            $q = intval($_GET['q']);
    if($q == 0){
            
            $query = "SELECT m.MID,.m.Name,Source1,Source2 FROM Media m JOIN User u ON u.UID = m.User WHERE OfType = 'Audio' AND u.Public = 0";
    
			$result = mysqli_query($con, $query);
			
			echo "<table class='table-style-three' name='ViewTable'>";
			echo "<tr>
                    <th>ID</th>
                    <th>Audio</th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Löschen</th>
                    <th>Edit</>
                  </tr>";
			if (!$result)
			{
			  echo "<tr>
                    <td>1</td>
                        <td>KEIN BILD!</td>
                        <td>Fehler!</td>
                        <td>Beschreibung und so</td>
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
                $i = 0;
				while ($row = mysqli_fetch_array($result))
				{
					$i++;
				  echo "<tr>";
                    echo "<td>". $i ."</td>";
                    echo "<td>". $row['Source1'] . "</td>";
                    echo "<td><a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a> </td>";
                    echo "<td>". $row['Source2'] . "</td>";
					  echo "<td class='test'><form action='MediaDelete.php' method='post' onsubmit='return del()'>
                                                <input type='hidden' name='type' value='Audio'>
                                                
                                                <input type='hidden' name='ID' value='". $row['MID'] ."'>
                                                <button type='submit' name ='submit' value ='Button'>
                                                    <i class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                                                </button>
                                            </form>
                            </td>";
                    //EDIT BUTTON
                      echo "<td class='test'><form action='MediaEdit.php' method='post'>
                                                    <input type='hidden' name='type' value='Audio'>
                                                    <input type='hidden' name='private' value='yes'>
                                                    <input type='hidden' name='ID' value='". $row['MID'] ."'>
                                                    <button type='submit' name ='submit' value ='Button'>
                                                        <i class='fa fa-pencil fa-2x' aria-hidden='true'></i>
                                                    </button>
                                                </form>
                                </td>";
					
					echo "</tr>";
                    
                   
				}
			} 			
			echo "</table>";
    }
    else{
			$query = "SELECT m.MID,.m.Name,Source1,Source2 FROM Media m JOIN User u ON u.UID = m.User WHERE OfType = 'Audio' AND u.Public = 0 AND m.User = '".$q."'";
    
			$result = mysqli_query($con, $query);
			
			echo "<table class='table-style-three' name='ViewTable'>";
			echo "<tr>
                    <th>ID</th>
                    <th>Audio</th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Löschen</th>
                    <th>Edit</>
                  </tr>";
			if (!$result)
			{
			  echo "<tr>
                    <td>1</td>
                        <td>Fehler!</td>
                        <td>Fehler!</td>
                        <td>Beschreibung und so</td>
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
                $i = 0;
				while ($row = mysqli_fetch_array($result))
				{
					$i++;
				  echo "<tr>";
                    echo "<td>". $i ."</td>";
                    echo "<td>". $row['Source1'] . "</td>";
                    echo "<td><a href='../upload/audio/".$row['Name']."'>".$row['Name']."</a> </td>";
                    echo "<td>". $row['Source2'] . "</td>";
					  echo "<td class='test'><form action='MediaDelete.php' method='post' onsubmit='return del()'>
                                                <input type='hidden' name='type' value='Audio'>
                                                <input type='hidden' name='ID' value='". $row['MID'] ."'>
                                                <button type='submit' name ='submit' value ='Button'>
                                                    <i class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                                                </button>
                                            </form>
                            </td>";
                    //EDIT BUTTON
                      echo "<td class='test'><form action='MediaEdit.php' method='post'>
                                                    <input type='hidden' name='type' value='Audio'>
                                                    <input type='hidden' name='private' value='yes'>
                                                    <input type='hidden' name='ID' value='". $row['MID'] ."'>
                                                    <button type='submit' name ='submit' value ='Button'>
                                                        <i class='fa fa-pencil fa-2x' aria-hidden='true'></i>
                                                    </button>
                                                </form>
                                </td>";
					
					echo "</tr>";
                    
                   
				}
			} 			
			echo "</table>";
		
    }
?>
</body>

</html>
