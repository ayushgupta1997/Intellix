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

    $month=$_POST['session1'];
    $sub=$_POST['wing'];

    for($i = 1; $i < 10; $i++) {
        if(isset($_POST['present'.$i])&&$_POST['present'.$i] != "") {
            $present = $_POST['present'.$i];
            $total=$_POST['total'];
            $absent=$total-$present;
        $sql = "Insert into attendance(`month`, `session`, `student_id`, `subject_code`, `total`, `present`, `absent`) Values('$month','July-Dec',$i,'$sub','$total','$present','$absent') ";
        //echo $sql;
        $result = $conn->query($sql);
        
        }
    }

    header('location:facultydashboard.html');
?>
