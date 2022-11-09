<?php 
      // connection to database
      include('config/db_conn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_admin";

    $res = mysqli_query($conn, $sql);

    if($res==true){
        $row = mysqli_fetch_assoc($res);
            $fullname = $row['fullname'];
            $email = $row['email'];
            $username = $row['username'];
            $password = $row['password'];
    }

}else{
    header('location:administation.php');
}

?>
<html>
    <head>
        <title>administation page</title>
        <link rel="stylesheet" href="css/user_style.css">
        <style>
            .wrapper{
                height: 130% !important;
            }
        .list2{
        background-color: #695210 ;
        width: 50%;
        height: 35px;
        position: relative;
        left: 97px;
        bottom: 10px;
        text-align: center;
        list-style: none;
      }
      .list1{
        position: relative;
        left: 100px;
        bottom: 10px;
        list-style: none;
      }
      .nav-content{
        position: relative;
        top: 8px;
      }
      hr{
        bottom: 11px;
        position: relative;
        left: 224.5px;
      }
      .input1{
        color: #000;
      }
      .update{
        position: relative;
        bottom: 100px !important;
      }
      
        </style>
    </head>
    <body>
        
        <div class="wrapper" style="color:#fff;">
        <nav class="contain1">
              <li class="list1"><a class="nav-content" href="administation.php">Manage Admin</a></li>
              <hr> 
              <li class="list2"><a class="nav-content" href="manage-user.php">Manage Employee</a></li> 
          </nav>
          <div class="gap">
          <div class="responsive">
            <div class="h3">Edit Admin</div>
            <form action="update-admin.php" class="input" method="POST">
                    <label for="">Fullname</label>
                    <a href="admin_change_password.php?id=<?php echo $password; ?>" class="change">Change Password</a>
                <div>
                    <input type="text" name="fullname" class="input1" value="<?php echo $fullname; ?>">
                </div>
                    <label for="">Username</label>
                <div>
                    <input type="text" name="username" class="input1" value="<?php echo $username; ?>">
                </div>
                    <label for="">Email</label>
                <div>
                    <input type="email" name="email" class="input1" value="<?php echo $email; ?>">
                </div>
        
                <input type="submit" value="Update Now" class="update" name="submit" style="position: relative; left:40rem; bottom:60px;">
            </form>

            </div>
          </div>
        </div>
    </body>
</html>

<?php 
 
    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];

        $sql3 = "UPDATE `tbl_admin` SET `username`='$username',`fullname`='$fullname',`email`='$email' WHERE employee_id = 1";

        $res3 = mysqli_query($conn, $sql3);

        if($res3==true){
            echo '<script>
            alert("Task Successfully Assigned")
            window.location.href="administation.php"
            </script>';
        }else{
            echo '<script>
            alert("failed To Assign Task")
            window.location.href="update-admin.php"
            </script>';
        }
    }

?>