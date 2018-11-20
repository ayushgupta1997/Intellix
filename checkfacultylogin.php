<?php
//print_r($_POST);
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
//echo $_POST['username'];
	$username1 = $_POST['username'];
	$password1 = $_POST["password"];
	$dbname = "attendance_db";
	//echo $username." ".$password;
	
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		//echo "Connected successfully";
		$sql = "SELECT * FROM faculty where username='$username1' and password='$password1' ";
		echo $sql;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
			header('Location: facultydashboard.html');
			

		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["department"]. "<br>";
		    }
		} 
		else {
			echo "<script>
			alert('Please type correct username and password');
			window.location.href='facultylogin.html';
			</script>";

	    	// header('Location: facultylogin.html');

		}

	
 ?>
 <html>
<head>
	<title></title>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Attendance System</title>
  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style >
	body{
    margin: 0;
    padding: 0;
    background: url(https://cdn.pixabay.com/photo/2016/03/26/13/09/cup-of-coffee-1280537__340.jpg);
    background-size: cover;
    background-position: cover;
    font-family: sans-serif;
}
	.c {
		background-color: black;
		width: 30%;
		height :80%;
		text-align: center;
		padding:10px

		border: 3px solid green;
		margin: 0 auto;
	}
	.button {
		border-radius: 8px;
		padding: 12px 28px;
		font-size: 10px;
		background-color: #008CBA;
		border: 2px solid #4CAF50;
		 -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	}
	.button:hover {
    background-color: #4CAF50; /* Green */
    color: white;
}
</style>
	
</head>
<!-- jQuery library -->
<body class="body">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.html">Attendance Portal</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right"> 
	      <li><a href="logout.php">Logout</a></li>
	    </ul>

	  </div>
	</nav>
	 <div class="c" style="font-color: white"> \
	    	<button class="button" style="margin-top: 40%"><a href="viewattendance.php"><h1> View Attendance<h1> </a></button>
	    	
	 </div>


	

</body>
</html>
