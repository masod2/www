<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.php">dev_Masoud</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="http://localhost/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="http://localhost/#about">About</a></li>
        <li><a class="nav-link scrollto" href="http://localhost/#services">Services</a></li>
        <li><a class="nav-link scrollto " href="http://localhost/#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="http://localhost/#contact">Contact</a></li>

        <li>
          <?php session_start();
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            // User is logged in {
            echo '<a class="getstarted scrollto" href="../reqwest/logout.php">Log out</a>';
          } else {
            echo '<a class="getstarted scrollto" href="../login.html">Join us</a>';
          } ?>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
<!-- ======= Header ======= -->