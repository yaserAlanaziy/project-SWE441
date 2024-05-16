<?php
session_start();
include 'src/DB/conn.php';

$password = trim($_POST["password"], '".');;
$submit = $_POST['submit'];

if (isset($submit)) {

    $sql = "UPDATE `User` SET `user_password`='$password' WHERE user_ID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $sql);
    $changMsg = "the password has been change";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link href="src/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/css/changePassword.css">
</head>

<body>
    <?php include "part/header.php" ?>

    <form action="#" class="col-sm-9 col-md-6 col-lg-5 change-password-form container" method="post" onsubmit="return validate()">

        <div class="mb-3">
            <label for="password" class="form-label">new password</label>
            <span id="passwordHelpInline" class="form-text">
            </span>
            <input type="password" id="password" class="form-control" name="password" />
        </div>
        <button type="submit" name="submit" class="btn btn btn-dark container mb-3">change password</button>
        <div>
            <?php echo $changMsg;
            $changMsg = ""; ?></div>
    </form>
    <?php include "part/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/changePassword.js"></script>

</body>

</html>