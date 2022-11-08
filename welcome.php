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
  height: 100%;
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
  animation: mymove 5s 1;
  background: #AFB0B4;
  background-size: cover;
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
table{
    width: 100%;
    
}
td{
    margin:10px;
}
tr{
    position: relative;
    top: 40px;
}
.btn{
    position: relative;
    left: 100%;
    top: 20px;
}
        </style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    <body style="background-color:#AFB0B4 ;">
    <div class="container">
    <h2>Welcome! <span> <?php echo $row['fullname'];?> </span>Or Should I Say <span><?php echo $row['username']; ?>...</span> </h2>
    <h3>Let's Begin By Creating A Task<span><button class="modal-btn">Create Task</button> </span> Or View Already Created Tasks <span><button class="view"><a href="index.php" style="color: black; text-decoration:none ;">View Tasks</a></button></span></h3>
</div>

        <div class="modal-overlay">
            <div class="modal-container">      
            <div class="container" style="border:none; width: 40%;height:70% ;border:2px solid #20bf6b;position: relative;left: 2.5rem;top: 3.8rem;">
        
        <form action="add-task.php" method="POST">
        <div class="icon" style="color:red ;">
            <button class="close-btn"><i class="fas fa-times"></i></button>
        </div>
            <div class="whole">
            <table class="tbl-half">
                
                <tr>
                    <td>Tasks Name</td>
                    <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="task_name"  placeholder="Type Your Task Name" aria-describedby="addon-wrapping" required>
                        </div>
                </td>
                </tr>
                
                <tr>
                    <td>Task Description</td>
                    <td>
                   
                    <div class="input-group mb-3">
                <textarea class="form-control" name="task_description" placeholder="Enter Task Description" aria-label="Enter Task Description" required></textarea>
                </div>

                </td>
                </tr>

                <tr>
                    <td>Priority: </td>
                    <td>
                        <select name="priority" class="form-select" aria-label="Default select example">
                            <option value="high" style=" color: #000;">High</option>
                            <option value="medium" style=" color: #000;">Medium</option>
                            <option value="low" style=" color: #000;">Low</option>
                        </select>
                    </td>
                </tr>

                <tr>
                        <td>Start Time: </td>
			            <td>
                        <div class="input-group mb-3">
                        <input type="datetime-local" class="form-control" name="start_time" required aria-describedby="addon-wrapping">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>End Time: </td>
			            <td>
                        <div class="input-group mb-3">
                        <input type="datetime-local" class="form-control" name="end_time" required aria-describedby="addon-wrapping">
                        </div>
			            </td>
			        </tr>
                <tr>
                    <td>Assign To: </td>
                    <td>
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
                            </td>

                    </div>
                   </tr>
                <tr>
                    <td>
                      
                        <input type="submit" value="Assign Task" name="submit" class="btn btn-outline-success">
                    </td>
                </tr>
               
            </table>
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
    </body>
</html>