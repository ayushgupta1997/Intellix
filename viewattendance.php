<?php

// session_start();
//print_r($_POST);
//echo $_POST['username'];
   // $username1 = $_POST['username'];
   // $password1 = $_POST["password"];
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
      $sessionid=$_SESSION['id'];
      $sql ="SELECT * FROM attendance where student_id=$sessionid and subject_code='5CS105'";
     // echo $sql;
      $result = $conn->query($sql);

      $sql1 = "SELECT * FROM attendance where student_id=$sessionid and subject_code='5IT103';";
      //echo $sql;
      $result2 = $conn->query($sql1);

   


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
   
    background-size: cover;
    background-position: cover;
    font-family: sans-serif;
}
.btn2{
   margin-left: 300;
   margin-top: 140;

}

   


 .split {

  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 50;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
/
  left: 0;
  background-color: #03DAC6;
}

/* Control the right side */
.right {
  right: 0;
  background-color: #018786;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

/* Style the image inside the centered container, if needed */

</style>
   
</head>
<!-- jQuery library -->
<body class="body"  onload="javascript:hideTable1();hideTable2();">
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
  <script>
         function showTable1(){
            document.getElementById('table1').style.visibility = "visible";
         }
         function hideTable1(){
            document.getElementById('table1').style.visibility = "hidden";
         }
         function showTable2(){
            document.getElementById('table2').style.visibility = "visible";
         }
         function hideTable2(){
            document.getElementById('table2').style.visibility = "hidden";
         }
</script>



<div class="split left"  >
   <div class="" style="padding-top: 19.2%;text-align: center;">

       <input type='button' onClick='javascript:showTable1();' value='5CS105' style="margin-bottom: 30px;">  <br>
      <table id='table1' class="tbl table table-striped table-bordered table-default" style="background-color: white;width: 90%;margin-left: 5%;">
      <tr><th>Month</th><th>Present</th><th>Total Class</th></tr>
      <?php 
      while($row=mysqli_fetch_assoc($result)){
      ?>
      <tr class="info">
         <td> <?php echo $row['month'];?></td>
         <td> <?php echo $row['present'];?></td>
         <td> <?php echo $row['total'];?> </td></tr>
      <?php   
      }
      ?>
      </table>
   </div>
</div>

<div class="split right" >
   <div class-"centered">
      <input type='button' onClick='javascript:showTable2();' value='5IT103' class="btn2">
      <table id='table2' class="tbl table table-striped table-bordered table-default" style="margin:25px; width:90%;">
      <tr><th>Month</th><th>Present</th><th>Total Class</th></tr>
         <?php 
         while($row1=mysqli_fetch_assoc($result2)){
         ?>
         <tr class="info">
            <td> <?php echo $row1['month'];?></td>
            <td> <?php echo $row1['present'];?></td>
            <td> <?php echo $row1['total'];?> </td>
         </tr>
         <?php   
         }
         ?>
      </table>
   </div>
</div>
   

</body>
</html>