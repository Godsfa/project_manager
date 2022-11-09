<?php 
include('config/db_conn.php');
// include('verify.php');

?>

<html>
    <head>
        <title>User And Registration</title>
        <link rel="stylesheet" type="text/css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
.container{
    width: 70% !important;
    border: 2px solid #000;
    position: relative;
    top: 100px !important;
}
.btn{
    position: relative;
    top: 10px;
    font-size: 30px !important;
}
.form-control{
    background-color: transparent !important;
}
a{
    text-decoration: none;
    color: white;
}
@media screen and (max-width:1000px) {  
.container{
    width: 200% !important;
    position: relative;
    left: 50px !important;
    border: 5px solid #000 !important;
}
form{
    width: 100% !important;
   
}
.form-control{
    width: 100% !important;
    padding: 30px !important;
    margin: 10px !important;
}
label{
    font-size: 20px !important;
}
.form-check-input{
    width: 25px !important;
    height: 20px !important;
}
}

@media screen and (max-width:400px) {  
.container{
    width: 200% !important;
    position: relative;
    left: 50px !important;
    border: 5px solid #000 !important;
}
form{
    width: 100% !important;
   
}
.form-control{
    width: 100% !important;
    padding: 50px !important;
    margin: 10px !important;
}
label{
    font-size: 40px !important;
}
.form-check-input{
    width: 25px !important;
    height: 20px !important;
}
}
</style>
    </head>
    <body>
<div class="container">
<form action="verify.php" method="POST" class="row g-3 needs-validation" novalidate>
  <div class="col-lg-12 col-md-6 clo-sm-12">
    <label for="validationCustom01" class="form-label id">ID</label>
    <input type="text" class="form-control" id="validationCustom01" name="employee_id" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-lg-12 col-md-6 clo-sm-12">
    <label for="validationCustom02" class="form-label">Username</label>
    <input type="text" class="form-control" id="validationCustom02" name="username"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-lg-12 col-md-6 clo-sm-12">
    <label for="validationCustomUsername" class="form-label">Password</label>
    <div class="input-group has-validation">
      <input type="password" name="password"  class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" name="submit"  type="submit">Login</button>
  </div>
</form>
</div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>