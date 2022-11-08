<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];
?>

<html>
    <head>
        <title>Project Manager System</title>
        <link rel="stylesheet" href="css/home_style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
    <div class="body" style=" background-image: url('images/back.png'); background-attachment: fixed;background-repeat: no-repeat;background-size: cover;filter: brightness(40%); height:100%;">

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav">
      <button class="btn btn-outline-warning pages" style=" width:70px; height:40px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="text-align: center; position:relative;bottom:5px; right: 12px;">Home</a>
        </li>
        </button>
         
        <button class="btn btn-outline-warning pages" style=" width:90px; height:40px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="text-align: center; position:relative;bottom:5px; right: 12px;">Explore</a>
        </li>
        </button>         
            <?php if($login_id == 1){ ?>
              <button class="btn btn-outline-warning pages" style=" width:140px; height:40px;">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="administation.php" style="text-align: center; position:relative;bottom:5px; right: 12px;">Administation</a>
                </li>
              </button>
            <?php } ?>        
        
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
    </body>
</html>