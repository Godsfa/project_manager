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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
  @media screen and (max-width:992px) {
    .nav-link{
      font-size: 50px !important;
    }
    span{
      font-size: 60px !important;
    }
    .container-fluid{
      width: 100% !important;
      font-size: 100% !important;
    }
    .navbar {
      width: 100% !important;
    }
    .active{
      font-size: 100px !important;
    }
    .navbar-brand{
      font-size: 100px !important;
    }
    .dropdown-toggle{
      font-size: 100px !important;
    }
    .dropdown-item{
      font-size: 100px !important;
    }
    span{
      font-size: 40px;
    }
  }
</style>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg bg-light" style="position: relative;bottom:40px;">
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
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Explore</a>
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
               <li><a class="dropdown-item" href="welcome.php"><i style="color:#000 ;"  class="bi bi-plus"></i>New</a></li>
            <?php } ?>
           
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
 