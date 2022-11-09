<?php

//development database

if($conn = mysqli_connect('localhost', 'root' ,'', 'task_manager')){
            // echo "db connected";
      }else{
          mysqli_error($conn);
      }

//remote database

// $servername = "remotemysql.com";
// $username = "gvD1EMFgyT";
// $password = "HdzyThMyaE";
// $dbname = "gvD1EMFgyT";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed please refresh page");
// }
?>