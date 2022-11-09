<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];


if(isset($_GET['id'])){
    //get the list id value
    $task_id = $_GET['id'];

    $sql2 = "SELECT * FROM task_tbl WHERE id=$task_id";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true){
        $row2 = mysqli_fetch_assoc($res2);

        $task_name = $row2['task_name'];
        $task_description = $row2['task_description'];
        $priority = $row2['priority'];
        $start_time = $row2['start_time'];
        $end_time = $row2['end_time'];
        $status = $row2['status'];

    }else{
        header('location:manage-list.php');
    }
}

?>

<?php 

// connect to batabase


//write query for all datails
$sql = "SELECT * FROM task_tbl";

$result = mysqli_query($conn, $sql);

$details = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<html>
    <head>
        <title>Details</title>
        <link rel="stylesheet" href="css/general_style.css">
        <style>
         @media screen and (max-width:1000px) {
       .wrapper1{
        width: 300% !important;
        position: relative;
         right: 70rem !important;
       } 
       .container{
        border:  none;
        border-radius: 10px;
        width: 300% !important;
        position: relative !important;
        height: 100% !important;
        width: 70% !important;
        top: 10px !important;
       
       }
       .table{
        width:300% !important;
        border-radius: 3px solid  #0C3B4A !important;
        height: 50% !important;
 }
 table tr th{
     text-align: left !important;
     border-bottom:1px solid black  !important;
     padding: 1% !important;
     padding-top: 5% !important;
     font-size: 70px !important;
 }
 table tr td{
     padding: 1%;
     font-size: 70px !important;
 }
    i{
        font-size: 70px;
    }
    svg{
        font-size: 70px;
    }
    .back{
        font-size: 80px;
        padding: 40px !important;
        border:3px solid green !important;
        background-color: transparent;
    }
    .back:hover{
        background-color: green !important;
    }
}
        </style>
    </head>

    <body>
    <?php 
      // connection to database
      include('sidebar copy.php');
    ?>
        <div class="wrapper1">
            <div class="container all">
                <div class="whole">
                               
                    <div class="edit-text">
                        <h3 class="edit">Task Details </h3>
                    </div>
                </div>

				<table class="table" style="color:white ;">
				    <tr>
				        <td>Task Title</td><td><?php echo $task_name; ?></td>
				    </tr>
				    <tr>
				        <td>Description</td><td><?php echo $task_description; ?></td>
				    </tr>
                    <tr>
				    <td>Priority</td><td><?php echo $priority; ?></td>
				    </tr>
				    <tr>
				        <td>Start Time</td><td><?php echo $start_time; ?></td>
				    </tr>
				    <tr>
				        <td>End Time</td><td><?php echo $end_time; ?></td>
				    </tr>
				                     
                    <tr>
                    <td>Status</td>
                        <td><?php  if($row2['status'] == 1){
                            echo "Ongoing";
                        }elseif($row2['status'] == 2){
                        echo "Finished";
                        }elseif($row2['status'] == 3){
                            echo "Cancelled";
                        }else{
                            echo "Started";
                        } ?>
                        </td>
                        </tr>
				        </table>
				               
                    <div>
                    <a href="index.php" class="back" style="text-decoration: none; color: white; border: 3px groove #695210;padding: 13px;background-color: transparent;position: relative;left: 18rem;top: 40px;width: 40%;cursor: pointer;">Go Back</a>
                </div>
            </div>
        </div>
    </body>
</html>