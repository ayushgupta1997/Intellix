<?php
    $dbname = "attendance_db";
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
    $sql = "SELECT * FROM student  ";
    //echo $sql;
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style >
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
 #wgtmsr{
   width:150px;   
 }
 #wgtmsr option{
  width:150px;   
 }
  </style>
</head>
<body>
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

<div class="container">
  <h2>Upload Attendance</h2>
  <form action="server_upload.php" method="POST">

  <br>
  Total Class <input type="number" name="total" id='total' required>     
  <br> 
  <h3>Month</h3>
<select name="session1">
  <option>July</option>
  <option>August</option>
  <option>September</option>
  <option>October</option>
  <option>November</option>
  <option>December</option>
</select>
<h3>Subject </h3>
<select name="wing" id="wgtmsr">
  <option value="5CS105">5CS105</option>
  <option value="5IT103">5IT103</option>
</select>
<br>
<br>
  <table class="table">
    <thead>
      <tr>
        <th>Roll No</th>
        <th>Present</th>
        <th>Absent</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$result->fetch_assoc()){
      echo "<tr>
        <td>".$row['rollno']." </td>
        <input type='hidden' name='id".$row['id']."' value='".$row['id']."'>
        <td><input type=\"number\" name=\"present".$row['id']."\"  id=\"present".$row['id']."\" onkeyup='func(".$row['id'].")'></td>
        <td><input type=\"number\" name='absent".$row['id']."' id='absent".$row['id']."' disabled></td>
      </tr>";
    }
      ?>

    </tbody>
  </table>
</div>
    <button class="button" style="margin-left: 40%"> Upload Attendance</button>
</form>
<script>
  function func(id){
    var total=document.getElementById('total').value;


        var pre_this=document.getElementById("present"+id).value;
        var abs_this=document.getElementById("absent"+id);
            //    console.log(total-pre_this);

        if((total-pre_this)>=0)
        abs_this.value=(total-pre_this);
        else
          alert("Enter Correct Values");

  }
</script>
</body>
</html>
