<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];
?>

<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];
?>
<html>
  <head>
    <title></title>

    <link rel="stylesheet" href="css/home_style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body style="background-image: url('images/back.png'); background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
  
  <nav class="navbar navbar-expand-lg bg-light" style="position: relative;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Project Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <?php if($login_id == 1){ ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="administation.php">Administration</a>
          </li>
        <?php } ?>
        
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <?php if($login_id == 1){ ?>
               <li><a class="dropdown-item" href="add-task.php"><i class="bi bi-plus"></i>New</a></li>
            <?php } ?>
           
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="h2 text" style="color:black;">PROJECT MANAGEMENT SYSTEM</div>
            <div class="h4 text" style="color:black;">Making Collaborative Work Esay</div>
            <div class="h5" style="position: relative; top: 90px; color: black;">Collaborate, plan projects and manage resources with powerful features that your whole team can use</div>
            <?php if($login_id == 1){ ?>
                 <button style="color:#000 ;" type="button" class="btn btn-outline-warning get_started"><a href="admin_login.php" class="a" style=" font-weight: bold;" >Get Sarted For Free</a></button>
             <?php } ?>  
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
                     
        </div>
    </div>
</div>

        <!-- JavaScript Bundle with Popper -->
    
    </div>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>