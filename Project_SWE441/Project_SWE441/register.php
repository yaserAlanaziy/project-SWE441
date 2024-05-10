<?php
$conn = new mysqli("localhost", "root", "", "online_store");

if ($conn->connect_error) {
    echo "error";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO `User`(`user_username`, `user_password`, `user_email`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    // Execute the statement
    $stmt->execute();

    // Redirect to index.php
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Account</title>
  <link href="src/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="src/css/registerStyle.css">

</head>

<body>

  <?php include './part/header.php'; ?>
  <form action="register.php" class="col-sm-9 col-md-6 col-lg-5 reg-form container" method="post" onsubmit="return validate()">
    <label class="form-label" for="uasername">User Name</label>
    <input class="form-control" type="text" id="username" name="username" required /><br />
    <span id="message_name"></span><br />

    <label class="form-label" for="password">Password</label>
    <input class="form-control" type="password" id="password" name="password" required /><br />
    <span id="message_pass"></span><br />

    <label class="form-label" for="repetpassword">Repeat Password</label>
    <input class="form-control" type="password" id="repetpassword" name="repetpassword" required /><br />
    <span id="message_repetpass"></span><br />

    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="email" id="email" name="email" required /><br />

    <input class="btn btn btn-dark container mb-3" type="submit" value="Register" />
  </form>
  <?php include '../part/footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/validateRegister.js"></script>
</body>

</html>
<?php 
mysqli_free_result($result);
mysqli_close($conn);

?>