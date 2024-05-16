<?php

session_start();
include './src/DB/conn.php';



$sql = "SELECT * FROM `Item` as i, `Cart` as c 
WHERE i.item_ID = c.item_ID AND c.user_ID = " . $_SESSION['userID'];
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

$removeBtn = $_POST['removeBtn'];
if (isset($removeBtn)) {
  $sql = "DELETE FROM `Cart` WHERE user_ID = " . $_SESSION['userID'] . " AND item_ID = " . $removeBtn;
  $result = mysqli_query($conn, $sql);
  header("Location:Cart.php");
}


$pay = $_POST['pay'];

if (isset($pay)) {
  $sql = "DELETE FROM `Cart` WHERE user_ID = " . $_SESSION['userID'];
  $result = mysqli_query($conn, $sql);
  header("Location:Cart.php");
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Cart</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="src/assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="src/css/styles.css" rel="stylesheet" />

  <!-- cart style link-->
  <link rel="stylesheet" href="src/css/cartStyle.css" />
</head>

<?php include './part/header.php'; ?>


<body>
  <!-- Header-->
  <header class="bg-color py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">cart</h1>
        <p class="lead fw-normal text-white-50 mb-0"></p>
      </div>
    </div>
  </header>


  <div class="container">
    <!--The header of the table-->
    <div class="cart-page">
      <table class="tabel-cart">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th></th>
        </tr>
        <?php foreach ($items as $item) : ?>
          <tr>
            <td>
              <!--The products info image, its name, and its price -->
              <div class="cart-info">
                <img src="src/imgs/<?php echo $item['item_img']; ?>" />
                <div>
                  <p><?php echo $item['item_name']; ?></p>
                </div>
              </div>
              <!--- end of div cart-page-->
            </td>
            <!--the input of quantity-->
            <td>$<?php echo $item['item_price']; ?></td>
            <td>
              <form action="" method="post"><button type="submit" name="removeBtn" value="<?php echo $item['item_ID']; ?>" class="btn btn-outline-dark ">X</button></form>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>

      <form method="post"><input type="submit" value="pay" class="btn btn-outline-dark container" name="pay"></form>



    </div>
  </div>
  <?php include './part/footer.php' ?>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>