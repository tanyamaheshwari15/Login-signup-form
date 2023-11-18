<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css" />
</head>
<body>
<nav class="navbar bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <form class="d-flex" role="search">
    <h2 style="color:#fff;">FORM PROJECT</h2>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <button type="submit" value="submit" class="btn btn-outline-success"><a href="index.php" style="text-decoration:none; color:#fff;">Login</a></button>
      &nbsp;&nbsp;&nbsp;
      <button type="submit" value="submit" class="btn btn-outline-success"><a href="signup.php" style="text-decoration:none; color:#fff;">Signup</a></button>
      &nbsp;&nbsp;&nbsp;
      <button type="submit" value="submit" class="btn btn-outline-success"><a href="logout.php" style="text-decoration:none; color:#fff;">Logout</a></button>
    </form>
  </div>
</nav>
 
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  include "sql.php";

$nameErr1=false;
$nameErr2=false;
$emailerr=false;
$passerr=false;
$err=false;
$fname = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

if(empty($_POST["name"])){
  $nameErr1=true;
  echo "Name is required";
}
else {
if (!preg_match("/^[a-zA-Z-']*$/",$fname)){
    $nameErr2=true;
    echo "Only letters allowed";
}
}
if(empty($_POST["email"])){
  $emailerr=true;
  echo "Email is required";     
}
if(empty($_POST["password"])){
  $passerr=true;
  echo "Password is required";
}
if(!$nameErr1 && !$nameErr2 && !$emailerr && !$passerr){
$existsql="SELECT email,fname FROM signup WHERE email='$email' and fname='$fname'";
$result=mysqli_query($con,$existsql);
$numrows=mysqli_num_rows($result);
 
if($numrows > 0){
echo "<h4>Username Already exist </h4>";
}

else{
$exist=false; 
$sql = "INSERT INTO signup(fname,email, pass)
VALUES('$fname', '$email', '$pass')";
$result=mysqli_query($con,$sql);

if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
if($result){
$err=true;
echo "<h4>Account created now you can login</h4>";
}
}
}
}
}
?>
  <form class="container" method="post">
    <h1>SIGNUP FORM</h1>
    <br>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" id="field">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <br>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" id="field">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <br>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" id="field">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1">
  </div>
  <br>
    <button type="submit" name="submit" value="submit" class="btn btn-primary" id="exampleInputEmail1">Signup</button>
  <br> <br>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" id="field">Already have an account?
    <a href="index.php" class="btn-primary">Login</a></label>
    </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>