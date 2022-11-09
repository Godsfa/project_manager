<?php 
      // connection to database
      include('config/db_conn.php');
      include('verify.php');
    
$employee_id = $_SESSION['employee_id'];

$login_id = $_SESSION['login_id'];
?>
<html>
    <head>
        <title>ADMINISTRATION</title>
        <link rel="stylesheet" href="css/user_style.css">
        <style>
        .list2{
        background-color: #695210 ;
        width: 50%;
        height: 47px;
        position: relative;
        left: 75px;
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
      
      @media screen and (max-width:992px) {
        .list2{
          background-color: #695210 ;
        width: 50%;
        height: 120px;
        position: relative;
        right: 80px;
        bottom: 10px;
        text-align: center;
        list-style: none;
        font-size: 0px;
        padding: 10px;
        margin: 10px;
      }
      .list1{
        position: relative;
        left: 100px;
        bottom: 10px;
        list-style: none;
        padding: 10px;
      }
      .nav-content{
        font-size: 70px;
      }
      .wrapper{
     width: 300%;
     position: relative;
    } 
 table{
     border-radius: 3px solid  #0C3B4A;
     height: 50%;
 }
 table tr th{
     text-align: left;
     border-bottom:1px solid black ;
     padding: 1%;
     padding-top: 5%;
     font-size: 70px;
 }
 table tr td{
     padding: 1%;
     font-size: 70px;
 }
 i{
     font-size: 70px;
 }
 .add{
  font-size: 70px;
 }
 .add-ls{
  padding: 20px;
 }
      }
        </style>
    </head>
    <body>
        <?php 
            include('sidebar copy.php');
          ?>
        <div class="wrapper">
        <li class="add-ls" style="list-style:none ;"><a class="add" style="color:Black; background-color: transparent; text-decoration:none; position:relative; left: 5%; bottom:70px; padding:12px;border: 3px groove #695210;" onMouseOver="this.style.background='#695210', transition='0.7s'" onMouseOut="this.style.background='transparent'"  href="add_employee.php">Add New Employee</a></li>
            <nav class="contain1">
              <li class="list1"><a class="nav-content" href="administation.php">Manage Admin</a></li>
              <hr> 
              <li class="list2"><a class="nav-content" href="manage-user.php">Manage Employee</a></li> 
          </nav>
          <div class="gaps"></div>
          <div class="responsives">
            <table class="table" style="color:#fff;">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>username</th>
                  <th>Gender</th>
                  <th>ID</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM tbl_admin WHERE employee_id > 1";

                $res = mysqli_query($conn,$sql);

                if($res==true){
                  $count_rows = mysqli_num_rows($res);
                  $sn = 1;
                if($count_rows>0){
                  while($row = mysqli_fetch_assoc($res)){
                    $employee_id = $row['employee_id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $fullname = $row['fullname'];
                    $gender = $row['gender'];
                    // $photo = $row['photo'];
                    
                    ?>
                     <tr class="content">
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $fullname;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $username;?></td>
                      <td><?php echo $gender;?></td>
                      <td><?php echo $employee_id;?></td>
                    <td>
                    <a href="update_user.php?id=<?php echo $employee_id; ?>" class="update_delete"><i class="bi bi-pencil-square"></i></a>
                     
                      <a href="delete-user.php?employee_id=<?php echo $employee_id; ?>" class="update_delete"><i class="bi bi-trash3-fill"></i></a> 
                    </td>
                    </tr>
                    <?php
                        }
                      }
                    }
                    ?>
          
              </tbody>
            </table>
          </div>
        </div>
    </body>
</html>

