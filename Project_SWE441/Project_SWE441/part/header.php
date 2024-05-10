  <?php
    session_start();


    $logout = $_POST['logout'];

    if (isset($logout)) {
        # code...
        session_destroy();
        header("Location:index.php");
    }

    ?>


  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5" >
          <a class="navbar-brand" href="index.php">Online Store </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="register.php">Register</a>
                  </li>
              </ul>
              <?php if (isset($_SESSION["username"])) { ?>
                  <a class="btn btn-outline-dark mx-2" href="changePassword.php">
                      <i class="bi bi-emoji-smile-upside-down-fill"></i>
                      <?php echo htmlspecialchars($_SESSION["username"]); ?>
                  </a>
                  <a class="btn btn-outline-dark" href="cart.php">
                      <i class="bi-cart-fill me-1"></i>
                      Cart
                  </a>
                  <form action="#" method="post">
                      <input type="submit" class="btn btn-outline-dark mx-2" href="index.php" value="logout" name="logout">
                  </form>
              <?php } else { ?>
                  <a class="btn btn-outline-dark mx-2" href="login.php">
                      <i class="bi bi-arrow-bar-right"></i> Login
                  </a>
              <?php }  ?>


          </div>
      </div>
  </nav>