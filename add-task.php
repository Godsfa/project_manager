<?php 
      // connection to database
      include('config/db_conn.php');

?>
<html>
    <head>
        <title>Tasks manager</title>
       <style>
        .h1{
            color: #000;
        }
        .h2{
            color: #000;
        }
        .h3{
            color: #000;
        }
        .h4{
            color: #000;
        }
        .h5{
            color: #000;
        }
        .h{
            color: #000;
        }
       </style>
    </head>

    <body>
    </body>
    
    <script src="js/script.js"></script>
</html>

<?php 

    if(isset($_POST['submit'])){

        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $priority = $_POST['priority'];
        $assign = $_POST['employee_id'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

       $sql2 = "INSERT INTO task_tbl SET
            task_name ='$task_name',
            task_description = '$task_description',
            priority = '$priority',
            employee_id = '$assign',
            start_time = '$start_time',
            end_time = '$end_time'
            ";

        $res2 = mysqli_query($conn, $sql2);

         if($res2==true){
            header('location:index.php');
        }else{
            echo '<script>
        alert("Tasks Creation Failed")
        window.location.href="add-task.php"
        </script>';
        }
    }

?>