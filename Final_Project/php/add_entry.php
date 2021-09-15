<?php
$servername = "localhost";
$username = "phe4";
$password = "phe4";
$db = "phe4";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$nname = $_POST['Nick-name'];
$message = $_POST['Message'];
$contact = $_POST['Social#'];
$status = "0";
echo $nname.$message.$status.$contact;
 
$sql = "insert into Drift_Bottle(STATUS, N_NAME, MESSAGE, SOCIAL) values('$status', '$nname', '$message', '$contact');";
if ($conn->query($sql) === TRUE) {
   echo '<script>alert("Well done!");location.href="../index.php"</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>