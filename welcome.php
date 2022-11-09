<?php 
include('config/db_conn.php');

session_start();
$sql = "SELECT username, fullname FROM tbl_admin WHERE employee_id=1";

$res = mysqli_query($conn, $sql);

    if($res==true){
        $row = mysqli_fetch_assoc($res);
    }else{
        header('location:admin_login.php');
    }


?>

<html>
    <head>
        <title>Welcome</title>
        <style>
            span{
                color: #F0EBF8;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
            h2{
               position: relative;
               top: 15px; 
               left: 5px;
               font-family:Helvetica sans-serif Helvetica 100.0% (local);
               /* font-size:15px; */
            }
            .container{
                border-radius: 30px;
                background: #AFB0B4;
                width: 55%;
                box-shadow: 4px 7px 8px 0px rgba(0,0,0,0.75);
                -webkit-box-shadow: 7px 7px 8px 5px rgba(0,0,0,0.75);
                -moz-box-shadow: 7px 7px 8px 0px rgba(0,0,0,0.75);
                position: relative;
                top: 10rem;
                left:0rem;
                height: 40%;
            }
            h3{
                position: relative;
                top: 80px;
                left: 0px;
                
            }
            .modal-btn{
                border: none;
                border-radius: 5px;
                width: 180px;
                position: relative;
                left: 7px;
            }
            .view{
                border: none;
                border-radius: 5px;
                width: 150px;
                position: relative;
                left: 7px;
            }
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 50%;
  display: grid;
  place-items: center;
  transition: var(--transition);
  visibility: hidden;
  z-index: -10;

}
/* OPEN/CLOSE MODAL */
.open-modal {
  visibility: visible;
  z-index: 10;
}
.modal-container {
  width: 100%;
  animation: mymove 5s 1;
  background: #F0EBF8;
  background-size: cover;
  /* border: 2px #AFB0B4; */
  border-radius: var(--radius);
  width: 90%;
  height: 100%;
  max-width: var(--fixed-width);
  text-align: center;
  display: grid;
  place-items: center;
  position: relative;

}
@keyframes mymove {
  from {bottom: 100px;}
  to {bottom: 0px;}
}
.close-btn {
  position: absolute;
  top: -1rem;
  right: 1rem;
  font-size: 2rem;
  background: transparent;
  border-color: transparent;
  color: var(--clr-red-dark);
  cursor: pointer;
  transition: var(--transition);
}
.close-btn:hover {
    border: none;
  color: var(--clr-red-light);
  transform: scale(1.3);
}

.row{
    box-shadow: 3px 7px 11px -2px rgba(0,0,0,0.75);
-webkit-box-shadow: 3px 7px 11px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 7px 11px -2px rgba(0,0,0,0.75);
    width: 70% !important;
    border: 5px solid #AFB0B4 !important;
    border-radius: 10px !important;
}
select{
    width: 100% !important;
    height: 50px !important;
}

@media screen and (max-width:100px) {
  .container{
    width: 100% !important;
  }
  h2{
    font-size: 40px !important;
  }
  h3{
    font-size: 40px !important;
  }
  .row {
   width: 100% !important;
   height: 50% !important;
  }
  .form-control{
    width: 100% !important;
    padding: 20px !important;
  }
  label{
    font-size: 30px !important;
  }
  select{
    width: 100% !important;
    padding: 20px !important;
  }
  .btn{
    padding: 20px !important;
    margin: 5px !important;
    font-size: 30px !important;
    font-weight: bold !important;
  }
}
</style>

<!-- 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

    </head>
    <?php include('sidebar.php') ?>
    <body style="background-color:#AFB0B4 ;">
    <div class="container">
    <h2>Welcome! <span> <?php echo $row['fullname'];?> </span>Or Should I Say <span><?php echo $row['username']; ?>...</span> </h2>
    <h3>Let's Begin By Creating A Task<span><button class="modal-btn" style="background-color: #fff;">Create Task</button> </span> Or View Already Created Tasks <span><button class="view"><a href="index.php" style="color: black; text-decoration:none; background-color: #fff;">View Tasks</a></button></span></h3>
</div>

        <div class="modal-overlay">
            <div class="modal-container">      
    
<form action="add-task.php" method="POST" class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Task Name</label>
    <input type="text" class="form-control" id="validationCustom01"  name="task_name"  placeholder="Type Your Task Name"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Task Description</label>
    <input type="text" class="form-control" id="validationCustom02" name="task_description"  placeholder="Type Your Task Description"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Start Time</label>
    <div class="input-group has-validation">
      <input type="datetime-local" class="form-control" name="start_time" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">End Time</label>
    <div class="input-group has-validation">
      <input type="datetime-local" class="form-control" name="end_time" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
  </div>
  <div class="col-md-6">
  <label for="validationCustom02" class="form-label">Priority</label>
  <select name="priority" class="form-select" aria-label="Default select example">
        <option value="high" style=" color: #000;">High</option>
        <option value="medium" style=" color: #000;">Medium</option>
        <option value="low" style=" color: #000;">Low</option>
    </select>
  </div>

  <div class="col-md-6">
  <label for="validationCustom02" class="form-label">Assign To</label>
  <select name="employee_id" required class="form-select" aria-label="Default select example">
        <?php
        $sql2 = "SELECT * FROM tbl_admin WHERE employee_id != 1";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==true){
        while($row2 = mysqli_fetch_assoc($res2)){
        $user_id = $row2['employee_id'];
        $user_name = $row2['username'];
        ?> 
        <option value="<?php echo $user_id; ?>" style=" color: #000;"><?php echo $user_name; ?></option>
        <?php
        }
        }else{

        }
        ?>
        </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" name="submit" type="submit">Add</button>
  </div>
</form>
        </div>
    </div>
    <script>
        const modalBtn = document.querySelector('.modal-btn');
const modalOverlay = document.querySelector('.modal-overlay');
const closeBtn = document.querySelector('.close-btn');

modalBtn.addEventListener('click', function(){
        modalOverlay.classList.add('open-modal');
})

closeBtn.addEventListener('click', function(){
        modalOverlay.classList.remove('open-modal');
});
    </script>

    
  <!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    </body>
</html>