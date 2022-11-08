<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];
$login_id = $_SESSION['login_id'];
?>

<html>
    <head>
        <title>Tasks Manager System</title>
       <link rel="stylesheet" href="css/general_style.css">
       <!-- CSS only -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
       <link rel="stylesheet" href="css/home_style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
    <?php 
  
      include('sidebar.php');
    ?>

    <div class="wrapper1" style=" position: relative;top: 0%;">
       

        <div class="all-tasks">
           
            <table style="color:white ;">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Tasks Name</th>
                    <th>Assigned To</th>
                    <th>priority</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

                    <?php 
                          if($login_id == 1){
                            $sql = "SELECT a.*, b.*
                                FROM task_tbl a
                                INNER JOIN tbl_admin b ON(a.employee_id=b.employee_id)
                                ";
    
                            }else{
                                $sql = "SELECT a.*, b.*
                                FROM task_tbl a
                                INNER JOIN tbl_admin b ON(a.employee_id=b.employee_id) 
                                WHERE a.employee_id = $employee_id
                                ";
                                
                            }
                       $res = mysqli_query($conn, $sql);
                        $serial = 1;
                        $count_rows = mysqli_num_rows($res);
                        if($count_rows==0){
                          echo '<tr><td colspan="7">No Data found</td></tr>';
                        }
                                while($row = mysqli_fetch_assoc($res)){   
                                    $task_id = $row['id'];                          
                                ?>
                                <tr class="content" style="color:white ;">
                                    <td><?php echo $serial; $serial++;?></td>
                                    <td><?php echo $row['task_name']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['priority']; ?></td>
                                    <td><?php echo $row['start_time']; ?></td>
                                    <td><?php echo  $row['end_time'];  ?></td>
                                    <td>
                                    <?php  if($row['status'] == 1){
                                        echo "Ongoing <i class='bi bi-arrow-repeat' style='color:#d4ab3a;' width:30px;></i>";
                                    }elseif($row['status'] == 2){
                                    echo "Finished <i class='bi bi-check-lg' style='color:#00af16;'></i>";
                                    }elseif($row['status'] == 3){
                                    echo "Canceled <i class='bi bi-x-lg' style='color:red;'></i>";
                                    }else{
                                    echo "Started <i class='bi bi-chevron-double-right' style='color:chartreuse;'></i>";
                                    } ?>
                                    </td>
                                <div>
                                    <td>   
                                    <a href="update-task.php?id=<?php echo $task_id; ?>" class="update_delete"><i class="bi bi-pencil-square"></i></a>
                                  
                                     <a href="task-details.php?id=<?php echo $task_id; ?>" class="update_delete"><i class="bi bi-folder-fill"></i></a>
                                  <?php if($login_id == 1){ ?>
                                     <a href="delete-task.php?id=<?php echo $task_id; ?>" class="update_delete"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg></a> 
                                   <?php  }?>
                                   
                                    </td>
                                </div>
                                </tr>
                                <?php } ?>

            </table>
        </div>
        <!-- tasks ends here -->
    </div>
    </body>
</html>