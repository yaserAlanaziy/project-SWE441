<?php
session_start();

include './src/DB/conn.php';

$itemID = $_GET['itemID'];

$sql = "SELECT * FROM `Item` WHERE `item_ID`= " . $itemID;
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>



<?php



$addToCart = $_POST['addToCart'];

if (isset($addToCart)) {
  if (isset($_SESSION["username"])) {

    $sql = "INSERT INTO `Cart`(`item_ID`, `user_ID`) VALUES ( " . $itemID . " , " . $_SESSION["userID"] . " )";
    $result = mysqli_query($conn, $sql);
    header("Location:Cart.php");
  } else {
    header("Location:login.php");
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Online Store</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="src/assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="src/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="src/css/itemDetailsStyle.css" />
</head>

<body>
  <?php include './part/header.php'; ?>

  <!-- Product section-->
  <section class="py-5">
    <?php foreach ($items as $item) : ?>

      <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6">
            <img class="card-img-top mb-5 mb-md-0" src="src/imgs/<?php echo $item['item_img']; ?>" alt="..." />
          </div>
          <div class="col-md-6">
            <div class="small mb-1"></div>
            <h1 class="display-5 fw-bolder"><?php echo htmlspecialchars($item['item_name']); ?></h1>
            <div class="fs-5 mb-5">
              <span>$<?php echo htmlspecialchars($item['item_price']); ?></span>
            </div>
            <p class="lead">
              <?php echo htmlspecialchars($item['item_description']); ?>
            </p>
            <div class="d-flex">
              <form method="post">

                <button class="btn btn-outline-dark flex-shrink-0 form-control mt-3" name="addToCart">
                  <i class="bi-cart-fill me-1"></i>
                  Add to cart
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </section>
  <!-- Related items section-->
  <section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
      <h2 class="fw-bolder mb-4">Related products</h2>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php
        $itemID = $_GET['itemID'];

        $sql = "SELECT * FROM `Item` WHERE `item_ID`!=$itemID AND`item_type`= 
        (SELECT `item_type` FROM `Item` WHERE `item_ID`= '" . $itemID . "')
        ORDER BY RAND() LIMIT 8 ";
        $result = mysqli_query($conn, $sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

        include './src/DB/closeConn.php';

        ?>

        <?php foreach ($items as $item) : ?>
          <!--start card!-->
          <div class="col mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img class="card-img-top" src="src/imgs/<?php echo $item['item_img']; ?>" alt="..." />
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder"><?php echo htmlspecialchars($item['item_name']); ?></h5>
                  <!-- Product price-->
                  $<?php echo htmlspecialchars($item['item_price']); ?>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-outline-dark mt-auto" href="itemDetails.php?itemID=<?php echo $item['item_ID']; ?>">View options</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


      </div>
    </div>
  </section>
  <?php include './part/footer.php' ?>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>