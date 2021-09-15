<?php
$servername = "localhost";
$username = "phe4";
$password = "phe4";
$db = "phe4";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$viewID = rand(0, 10);
$sql = "SELECT * FROM Drift_Bottle where ID=".$viewID.";" ;
$results = $conn->query($sql);
//mysqli_query($conn, $sql);
$uid = $_SERVER["REMOTE_ADDR"];
?>



<!DOCTYPE HTML>
<html lang="en">
	<head>
    <meta charset="utf-8"/>
		<title>Index Page </title>
		<style>
			body {
        border: solid lightblue;
        text-align: center;
        width: 600px;
        height: 300px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        }
	    .back{
	      position: absolute;
	      padding-top: 50px;
	    }
      </style>
	<body>
    <h3 > Drift Bottle </h3>
	  <p> <h2> View some secrets</h2> </p>
    <br>
    <table border="1" cellspacing="0" align="center">
		  <tr>
			  <th>Nick name</th>
			  <th>Message</th>
			  <th>Contact</th>
		  </tr>
<?php  
		  foreach($results as $row){
	if ($row['STATUS'] == 0){
	  $sql1 = "UPDATE Drift_Bottle SET STATUS= '$uid' where ID=$viewID;" ;
	  if ($conn->query($sql1) === TRUE) {
    		echo "";
	  } else {
    		echo "Error: " . $sql1 . "<br>" . $conn->error;
	  }
        }else {
	  echo '<script>alert("Seems like there is nothing, try again...");location.href="../index.php"</script>';
	}
        ?>
	<td style="width: 80px"><?php echo $row['N_NAME']?></td><td style="width: 200px"><?php echo $row['MESSAGE']?></td><td style="width: 150px"><?php echo $row['SOCIAL']?></td></tr> 
        <?php
        }
	$conn->close(); 
    ?>

    </table>
    <a href="../index.php" target="_self" class="back" > Back </a>
  </body>
</html>