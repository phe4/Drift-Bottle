<?php
	$servername = "localhost";
	$username = "phe4";
	$password = "phe4";
	$db = "phe4";

	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
   			die("Connection failed: " . $conn->connect_error);
	} 
  	$uid = $_SERVER["REMOTE_ADDR"];
	$sql = "SELECT * FROM Drift_Bottle WHERE STATUS='{$uid}';";
	//{$uid} STATUS='108.227.70.176'
	$results = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Drift Bottle</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <script>
    function add(){
      document.getElementById('add_box').style.display = "block";
      var close = document.getElementById('close_button1');
      close.onclick = function close() {
	      document.getElementById('add_box').style.display = "none";
      }
    }
    function update(){
      window.location.href = "php/edit.php";
    }
    function view(){
      document.getElementById('view_box').style.display = "block";
      var close = document.getElementById('close_button4');
      close.onclick = function close() {
	      document.getElementById('view_box').style.display = "none";
      }
    }
  </script>
    <div id="header">
      <label>Drift Bottle</label>
    </div>
    <div id="row">
      <div id="div1">
         <button id="throw_bottle" class="menu" onClick="add()" ><img src="resources/greenbottle.png" id="bottle" style="height: 80px"/></button>
         <br>
       <label >Throw Yours </label>
      </div>
      &nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
      <div id="div2">
        <button id="get_bottle" class="menu" onClick="update()"><img src="resources/net.png" id="bottle" style="height: 80px"/></button>
        <br>
        <label >Get New One</label>
      </div>
      <div id="div3">
        <button id="view_bottle" class="menu" onClick="view()"><img src="resources/backpack.png" id="bottle" style="height: 80px"/></button>
        <br>
        <label >Backpack</label>
      </div> 
    </div>

	<div id="add_box" class="boxes">
		<div id="content1" class="content">
			<div id="close">
				<span id="close_button1" class="close_button">×</span>
				<h2>Write your message and throw it!</h2>
			</div>
			<div id="content2">
        <form method="post" action="php/add_entry.php" align="left">
          <br>
          Nick Name: <input type="text" required size="35" maxlength="30" name="Nick-name" placeholder="your nick name here"> <br><br>
          Your message: <textarea rows="5" cols="25" name="Message" placeholder="xxxx
xxxx
xxxx
xxxx
"></textarea> <br>
        Social account(if you like): <input type="text" size="35" maxlength="30" name="Social#" placeholder="Platform: xxxxxx"> <br><br><br>
        <input type="reset" value="Reset" style="margin-top: 10%; margin-left:36%">&nbsp&nbsp&nbsp;
        <input type="submit" name="submit" value="Add">
        </form>
			</div>
		</div>
	</div>

  <div id="view_box" class="boxes">
		<div id="content1" class="content">
			<div id="close">
				<span id="close_button4" class="close_button">×</span>
				<h2>Hey! Look at what you got!</h2>
			</div>
			<div id="content2">
	<br>
    <form method="post" action="php/view.php" style="width: 100%;">
        <table border="1" cellspacing="0">
		<tr>
			<td>ID</td>
			<td>Nick Name</td>
		</tr>
        <?php  
		  foreach($results as $row){
        ?>
         <tr><td style="width: 150px"><input type="submit" class="viewDetail" name="to_view" value=<?php echo $row['ID']; ?>></td><td style="width: 200px"><?php echo $row['N_NAME'] ?></td></tr> 
        <?php
        }
		$conn->close(); 
             ?>
        </table>
      </form>
			</div>
		</div>
	</div>
 
    <div>
      <br><br><br>
    </div>
  </body>
</html>