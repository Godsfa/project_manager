<?php 
      // connection to database
      include('config/db_conn.php');
      
    $email = $fullname = $username = $gender = $password = '';
    $errors = array('email' => '','fullname' => '','username' => '','gender' => '','password' => '');

    if(isset($_POST['submit'])){
        
        if(empty($_POST['fullname'])){
            $errors['fullname'] = 'Fullname is required <br />';
        }
        
        if(empty($_POST['email'])){
            $errors['email'] = 'an email is required <br />';
        }

        if(empty($_POST['username'])){
            $errors['username'] = 'Add Username <br />';
        }

        if(empty($_POST['gender'])){
            $errors['gender'] = 'Add Gender <br />';
        }
        
        if(empty($_POST['password'])){
            $errors['password'] = 'Add Password <br />';
        }

        if(array_filter($errors)){
            // echo 'errors in the form';
        }else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

         
        }
    }

?>
<html>
    <head>
        <title>User And Registration</title>
        <link rel="stylesheet" type="text/css">
                <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .login-box{
    max-width: 900px;
    float: none;
    margin: 200px auto;
}
.login-right{

    padding: 30px;
}
.btn{
    position: relative;
    top: 10px;
}
.form-control{
    background-color: transparent !important;
}   
.container{
    position: relative;
    left: 270px !important;
}
.login{
    background:rgb(0, 0, 0);
}
@media screen and (max-width:1000px) {
    .container{
        width: 200% !important;
    }
    .login{
        width: 200% !important;
       position: relative;
       top: 150px;
       border: 10px groove green;
        border-radius: 10px !important;
    }
    form{
        width: 200% !important;
    }
    .form-control{
        width: 100%;
        border-radius: 5px;
        padding: 60px;
        margin: 8px;
        font-size: 80px;
        color: #fff;
    }
    .btn{
        padding: 30px;
        margin: 10px;
        font-size: 30px;
    }
    label{
        font-size: 60px;
    }
    h2{
        font-size: 70px;
    }
}
</style>
    </head>
    <body>
       
            <div class="container container-fluid" style="color:#fff;">
            <div class="login"> 
            <div class="row">
                <div class="col-md-6 login-right">
                    <h2>Register Here</h2>
                <form action="add_employee.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname) ?>"  placeholder="Enter Your Fullname" required>
                    <div class="red-text"><?php  echo $errors['fullname']; ?></div>
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username) ?>"  placeholder="Enter Username" required>
                    <div class="red-text"><?php  echo $errors['username']; ?></div>
                    </div>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>"  placeholder="Enter Email" required>
                    <div class="red-text"><?php  echo $errors['email']; ?></div>
                    </div>
                    <div class="form-group">
                    <label for="">Gender</label>
                    <input type="text" name="gender" placeholder="Gender" value="<?php echo htmlspecialchars($gender) ?>"  class="form-control" required>
                    <div class="red-text"><?php  echo $errors['gender']; ?></div>
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo htmlspecialchars($password) ?>"  placeholder="Enter Password" required>
                    <div class="red-text"><?php  echo $errors['password']; ?></div>
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="login_id" class="form-control" value="2" placeholder="Enter 2" required>
                    </div>
                    <!-- <div class="form-group">
                    <label for="">Picture</label>
                    <input type="file" name="photo" class="form-control" placeholder="UPload Picture" required>
                    </div> -->
                   
                   
                    <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
                </form>
           </div>
        </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>


<?php
       if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $gender = $_POST['gender'];
        $login_id = $_POST['login_id'];
        // $photo = $_POST['photo'];

       
        $sqlq = "SELECT * FROM tbl_admin WHERE username = '$username'";

        $result = mysqli_query($conn, $sqlq);
        
        $num = mysqli_num_rows($result);
        
        if($num==1){
            echo '<script>
            alert("User Name Already Taken")
            window.location.href = "add_employee.php"
            </script>';
        }else{
        $sql = "INSERT INTO tbl_admin (fullname,username, email, password, gender,login_id) 
        VALUES ('$fullname','$username','$email','$password','$gender',2)";

        $res = mysqli_query($conn, $sql);

         if($res==true){
            echo '<script>
        alert("Successfully Assigned")
        window.location.href="manage-user.php"
        </script>';
        }else{
            echo '<script>
        alert("Fail To Assign Tasks")
        window.location.href="add_employee.php"
        </script>';
        }
                }        
     }

?>