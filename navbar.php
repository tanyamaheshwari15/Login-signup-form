<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location: index.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style=" background-image:url('bg.jpg');
     color: #fff;">
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
<h4>
  WELCOME-<?php echo $_SESSION['email'];?>
</h4>
<p>If you want to logout , Click here- <a href="logout.php" style="text-decoration:none; color:#92b3e8;">Logout</a>
</p>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>