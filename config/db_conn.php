<?php
if($conn = mysqli_connect('localhost', 'root' ,'', 'task_manager')){
            // echo "db connected";
      }else{
          mysqli_error($conn);
      }
?>