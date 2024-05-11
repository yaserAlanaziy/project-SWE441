<?php

include './src/DB/conn.php';

$sql = "SELECT * FROM `Item` WHERE 1 ORDER BY RAND()";
$result = mysqli_query($conn, $sql);

$items = mysqli_fetch_all($result, MYSQLI_ASSOC);



include './src/DB/closeConn.php';
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
  <link rel="stylesheet" href="src/css/indexStyle.css" />
</head>

<body>
  <?php include './part/header.php'; ?>


  <!-- Header-->
  <header class="bg-color py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Online Store</h1>
        <p class="lead fw-normal text-white-50 mb-0">
          welcome to our online store<br>
          Beta
        </p>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php foreach ($items as $item) : ?>
          <!--start card-->
          <div class="col mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img class="card-img-top max-height" src="src/imgs/<?php echo $item['item_img']; ?>" loading="lazy" />
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