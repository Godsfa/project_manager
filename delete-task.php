<?php 

// connection to database
include('config/db_conn.php');
include('verify.php');

$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];

    //check if the list_id is assigned or not
    if(isset($_GET['id'])){
        $task_id = $_GET['id'];
        $sql = "DELETE FROM task_tbl WHERE id=$task_id";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $_SESSION['delete'] = '';
             header('location:index.php');
        }else{
           $_SESSION['delete_fail'] = '';
           header('location:index.php');
        }
    }else{
        header('location:index.php');
    }

   

?>