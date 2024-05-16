<?php
session_start();

include './src/DB/conn.php';

$username = trim($_POST['username'], '".');
$password = trim($_POST['password'], '".');

$send = $_POST['submit'];
$errorMsg = "";



$sql = "SELECT * FROM User WHERE user_username = '$username' && user_password = '$password'";
$result = mysqli_query($conn, $sql);
$userdata = mysqli_fetch_all($result, MYSQLI_ASSOC);



if (isset($send)) {
  # code...

  if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    foreach ($userdata as $data) {
      $_SESSION["userID"] = $data['user_ID'];
    }

    header("Location:index.php");
  } else {
    $errorMsg = "username or password is incorrect";
  }
}
include './src/DB/closeConn.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>login</title>
  <link href="src/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="./src/css/loginStyle.css">
</head>

<body>

  <?php include './part/header.php'; ?>


  <form action="#" class="col-sm-9 col-md-6 col-lg-5 login-form container" method="post" onsubmit="return validate()">
    <span><?php echo $errorMsg; ?></span>
    <div class="mb-3">
      <label for="username" class="form-label">username</label>
      <span id="usernameHelpInline" class="form-text">
      </span>
      <input type="text" value="" id="username" class="form-control" name="username" />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">password</label>
      <span id="passwordHelpInline" class="form-text">
      </span>
      <input type="password" id="password" class="form-control" name="password" />
    </div>
    <button type="submit" name="submit" class="btn btn btn-dark container mb-3">login</button>
    <br>
    <a href="register.php " class="link-primary">create new acount</a>

  </form>

  <?php include './part/footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/validateLogin.js"></script>
</body>

</html>