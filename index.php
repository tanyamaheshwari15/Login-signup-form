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
  $login = false;
  $Showerror = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "sql.php";
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE email='$email' and pass='$pass'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['pass'] = $pass;
      header("location: navbar.php");
      echo "Login Successful";
    } else
      echo $Showerror = "Login failed";
  }
  ?>


  <form class="container" method="post">
    <h1>LOGIN FORM</h1>
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
    <button type="submit" name="submit" value="submit" class="btn btn-primary" id="exampleInputEmail1">Login</button>
    <br> <br>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label" id="field">Don't have an account?
        <a href="signup.php" class="btn-primary">Signup</a></label>
    </div>
  </form>
  <br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>