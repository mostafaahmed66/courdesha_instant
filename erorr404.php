<?php
include_once './shared/head.php';
//include_once './shared/header.php';
//include_once './shared/aside.php';
auth(2,3,4);
?>
  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>403</h1>
        <h2>The page you are looking for isnot for you.</h2>

       
        <a class="btn" href="login.php">Back to home</a>
        <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <?php
include_once "./shared/footer.php";
include_once './shared/script.php';
?>