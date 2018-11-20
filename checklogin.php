<?php
// session_start();
//print_r($_POST);
//echo $_POST['username'];
	$username1 = $_POST['username'];
	$password1 = $_POST["password"];
	$dbname = "attendance_db";
	//echo $username." ".$password;
	session_start();

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
		$sql = "SELECT * FROM student where username='$username1' and password='$password1' ";
		//echo $sql;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
		
			while($row = $result->fetch_assoc()) {
		        	$_SESSION["id"]=$row["id"];
		    }
			header('Location: studentdashboard.php');
		    
		} 
		else {
	    	// header('Location: studentlogin.html');
	    	echo "<script>
			alert('Please type correct username and password');
			window.location.href='facultylogin.html';
			</script>";
		}

	
 ?>
