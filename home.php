<?php 
      // connection to database
      include('config/db_conn.php');

?>

<html>
  <head>
    <style>
@media screen and (max-width:1000px) {
 i{
     font-size: 40px !important;
 }
 .h3{
  position: relative !important;
  right: 100px;
  font-size: 55px !important;
  width: 100% !important;
  margin-bottom: 20px !important;
 }
 .h4{
  position: relative !important;
  right: 100px;
  font-size: 40px !important;
  font-weight: bold !important;
  width: 100% !important;
  margin-bottom: 60px !important;
}
.h5{
  position: relative !important;
  right: 100px;
  font-size: 45px !important;
  width: 100% !important;
  margin-bottom: 60px !important;
}
.container{
  width: 100% !important;
}
.row{
  width: 100% !important;
}
.col{
  width: 100% !important;
}
.btn{
  padding: 20px !important;
  position: relative !important;
  right: 100px;
  background-color: #fff !important;
}
.a{
  color: black;
  font-size: 40px !important;
}
      }
    </style>
    <title></title>

    <link rel="stylesheet" href="css/home_style.css">

  </head>
  <body style="background-image: url('images/back102.jpeg'); background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

  <?php include('sidebar.php') ?>
<div class="image">
<div class="container container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="h3 text" style="color:black; font-family: Times New Roman", Times, serif;">PROJECT MANAGEMENT SYSTEM</div>
            <div class="h4 text" style="color:black;">Making Collaborative Work Esay</div>
            <div class="h5" style="position: relative; top: 90px; color: black;font-family: 'Copperplate, Papyrus, fantasy';">Collaborate, plan projects and manage resources with powerful features that your whole team Successful...</div>
            <?php if($login_id == 1){ ?>
                 <button style="color:#000 ;" type="button" class="btn btn-outline-warning get_started"><a href="admin_login.php" class="a" style=" font-weight:bold; color: #000;" >Get Sarted For Free</a></button>
             <?php } ?>  
        </div>
    </div>
</div>
</div>
        <!-- JavaScript Bundle with Popper -->
    
    </div>

  </body>
</html>