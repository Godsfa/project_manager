<?php 
session_start();
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
        <title>Admin Registration</title>
        <link rel="stylesheet" type="text/css">
                <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .login-box{
    max-width: 900px;
    float: none;
    position: relative;
    bottom: 90px;
    left: 200px;
    margin: 200px auto;
   
}
.login-left{
    background: rgba(211, 211, 211, 0.5);
    padding: 60px;
}
.login-right{
    background:rgb(0, 0, 0);
    padding: 30px;
}
.btn{
    position: relative;
    top: 10px;
    left: 140px;
}
.form-control{
    background-color: transparent !important;
     padding: 15px;
     margin: 10px;
}
</style>
    </head>
    <body>
            <div class="container" style="color:#fff;">
            <div class="login-box"> 
            <div class="row">
                <div class="col-md-6 login-right">
                    <h2>Administator Registration</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    
                    <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname) ?>"  placeholder="Enter Your Fullname" required>
                    <div class="red-text"><?php  echo $errors['fullname']; ?></div>
                    </div>
                    <div class="form-group">
                    
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username) ?>"  placeholder="Enter Username" required>
                    <div class="red-text"><?php  echo $errors['username']; ?></div>
                    </div>
                    <div class="form-group">
                  
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>"  placeholder="Enter Email" required>
                    <div class="red-text"><?php  echo $errors['email']; ?></div>
                    </div>
                    <div class="form-group">
                
                    <input type="text" name="gender" placeholder="Gender" value="<?php echo htmlspecialchars($gender) ?>"  class="form-control" required>
                    <div class="red-text"><?php  echo $errors['gender']; ?></div>
                    </div>
                    <div class="form-group">
                   
                    <input type="password" name="password" class="form-control" value="<?php echo htmlspecialchars($password) ?>"  placeholder="Enter Password" required>
                    <div class="red-text"><?php  echo $errors['password']; ?></div>
                    </div>
                   
                   
                    <button type="submit" name="submit" class="btn btn-primary">Add Employee</button>
                </form>
           </div>
        </div>
        </div>
    </div>
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

       
$sqlq = "SELECT * FROM tbl_admin WHERE username = '$username'";

$result = mysqli_query($conn, $sqlq);

$num = mysqli_num_rows($result);

        if($num==1){
            echo '<script>
            alert("User Name Already Taken")
            window.location.href = "admin_login.php"
            </script>';
        }else{
              $sql = "INSERT INTO tbl_admin (fullname,username, email, password, gender,login_id) 
      VALUES ('$fullname','$username','$email','$password','$gender',1)";

        $res = mysqli_query($conn, $sql);

         if($res==true){
            $_SESSION['username'] = $username;
           header('location:welcome.php');
        }else{
            echo '<script>
        alert("Registration Failed")
        window.location.href="admin_login.php"
        </script>';
        }
     }
        }

    

?>