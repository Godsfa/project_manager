<?php
if(isset($_GET['id'])){
    $task_id = $_GET['id'];


    $servername = "remotemysql.com";
    $username = "gvD1EMFgyT";
    $password = "HdzyThMyaE";
    $dbname = "gvD1EMFgyT";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM task_tbl WHERE id = $task_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($rows = $result->fetch_assoc()) {

?>

<html>
    <head>
        <title>Tasks Manager</title>
        <link rel="stylesheet" href="css/general_style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
         @media screen and (max-width:1000px) {      
           .container{
        border:  none;
        border-radius: 10px;
        position: relative !important;
        height: 100% !important;
        width: 70% !important;
        top: 10px !important;
       
       }
       .table{
        width:300% !important;
        border-radius: 3px solid  #0C3B4A !important;
        height: 30% !important;
 }
 table tr th{
     text-align: left !important;
     border-bottom:1px solid black  !important;
     padding: 1% !important;
     padding-top: 5% !important;
     font-size: 70px !important;
 }
 table tr td{
     padding: 3%;
     padding-left: 3%;
     font-size: 50px !important;
     font-weight: bold !important;
 }
    i{
        font-size: 70px;
    }
    svg{
        font-size: 70px;
    }
form{
  width: 400% !important;
  position: relative;
  right: 50% !important;
}
.form-control{
  padding: 30px !important;
  border: 2px solid black;
  font-size: 60px !important;
}
select{
  padding: 30px !important;
  border: 2px solid black;
  font-size: 60px !important;
}
option{
  font-size: 5px !important;
}
.edit-text{
  width: 200% !important;
  background-color: transparent;
}
.edit{
  position: relative;
  right: 100px !important;
  font-size: 60px !important;
  color: #000;
  font-weight: bold;
}
.btn{
  width: 100% !important;
  padding: 30px !important;
  font-size: 50px !important;
}
}
        </style>
    </head>

    <body>
     
    <?php 
      // connection to database
      include('sidebar.php');
    ?>

            <div class="container" style="border:none ;">

           <div class="edit-text" style="width:60%;position:relative;left:6.25rem; bottom:45px;">
             <h3 class="edit">EDIT TASK</h3>
           </div>

    <form action="update-task.php" method="POST">
    <div class="whole" style="width: 60%;position:relative;left:100px;top:-3rem;border:2px groove #20bf6b;">
    <table class="tbl-half">

    <tr>
    <div class="input-group flex-nowrap">
    <td><input type="hidden" name="task_id" style="color:#000 ;" class="form-control"  aria-describedby="addon-wrapping" value="<?php echo $task_id ?>" required></td>
    </div>
    </tr>

    <tr>
    <td style="color:#000 ;" >Task Name: </td>
    <div class="input-group flex-nowrap">
    <td><input type="text" name="task_name" style="color:#000 ;" class="form-control"  aria-describedby="addon-wrapping" value="<?php echo $rows['task_name']; ?>" required></td>
    </div>
    </tr>
    
    <tr>
    <td style="color:#000 ;" >Task Descripton: </td>
    <td>
    <div class="input-group">
    <textarea name="task_description" style="color:#000 ;" class="form-control" required><?php echo $rows['task_description']; ?></textarea>
    </div>
    </td>
    </tr>

    <tr>
      <td style="color:#000 ;" >Priority: </td>
        <td>
       <select name="priority"  class="form-select" aria-label="Default select example">

         <option <?php if($rows['priority']=="High"){
         echo "selected ='selected'";
          } ?> value="High" style="color:#000 ;">High</option>

        <option <?php if($rows['priority']=="Medium") {
         echo "selected='selected'";
        } ?> value="Medium" style="color:#000 ;">Medium</option>

        <option <?php if($rows['priority']=="Low") {
         echo "selected='selected'";
        } ?>  value="Low" style="color:#000 ;">Low</option>
    </select>
    </td>                
    </tr>

    <tr>
        <td style="color:#000 ;" >Start Time: </td>

        <div class="input-group flex-nowrap">
        <td><input type="datetime-local" name="start_time" style="color:#000 ;" class="form-control" value="<?php echo $rows['start_time']; ?>"></td>
        </div>
    </tr>

    <tr>
        <td style="color:#000 ;" >End Time: </td>
        <div class="input-group flex-nowrap">
        <td><input type="datetime-local" name="end_time" style="color:#000 ;" class="form-control" value="<?php echo $rows['end_time']; ?>"></td>
        </div>
    </tr>

    <tr>
		<td style="color:#000 ;" >Status: </td>
        <td>
        <select class="form-select" aria-label="Default select example" name="status">
		    <option value="0" <?php if($rows['status'] == 0){ ?>selected <?php } ?> style="color:#000 ;">Started</option>
			<option value="1" <?php if($rows['status'] == 1){ ?>selected <?php } ?> style="color:#000 ;">Ongoing</option>
            <option value="2" <?php if($rows['status'] == 2){ ?>selected <?php } ?> style="color:#000 ;">Finished</option>
            <option value="3" <?php if($rows['status'] == 3){ ?>selected <?php } ?> style="color:#000 ;">Canceled</option>               
        </select>
        </td>
    </tr>

        <tr>
            <td style="color:#000 ;" >Assigned To</td>
            <td>

            <?php
             $sql2 = "SELECT employee_id, username FROM tbl_admin WHERE login_id = 2";

            $res2 = mysqli_query($conn, $sql2);
            ?>

            <select  class="form-select" aria-label="Default select example" name="employee_id" <?php if($employee_id = 2)?>>
            <option value="">Select</option>
            
                <?php while($rows = mysqli_fetch_assoc($res2)){ ?>
                    <option value="<?php echo $rows['employee_id']; ?>" <?php
                        if($rows['employee_id'] == $rows['employee_id']){
                     ?> selected <?php } ?> style="color:#000 ;" ><?php echo $rows['username']; ?></option>
                    <?php } ?>
                    
            </select>
            </td>
        </tr>

    <tr>
       <td><input type="submit" value="Update"  class="btn btn-outline-success" style="width:8rem;position:relative;left:33rem" name="submit"></td>
    </tr>

    </table>
    </div>
    </form>
    
</div>
</div>
</body>
</html>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
}


  if(isset($_POST['submit'])){
      
      $task_id = $_POST['task_id'];
      $task_name = $_POST['task_name'];
      $task_description = $_POST['task_description'];
      $priority = $_POST['priority'];
      $start_time = $_POST['start_time'];
      $end_time = $_POST['end_time'];
      $status = $_POST['status'];
      $users = $_POST['employee_id'];

      $servername = "remotemysql.com";
      $username = "gvD1EMFgyT";
      $password = "HdzyThMyaE";
      $dbname = "gvD1EMFgyT";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE task_tbl SET task_description='$task_description',task_name='$task_name',end_time='$end_time',priority='$priority',start_time='$start_time',status='$status',employee_id='$users' WHERE id = $task_id";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() .'<script>
  alert("Update Successfully")
  window.location.href="index.php"
  </script>';;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

    }
?>