<?php include_once 'C:\xampp\htdocs\project_instant/round31-dashboard-main\vendor/functions.php'; 


?> <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 2 || $_SESSION['auth']['role'] == 3 ):?>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="<?= base_url('/app/admin/')?>">
          <i class="bi bi-menu-button-wide"></i><span> Admins</span> 
        </a>
      
      </li><!-- End Components Nav -->
      <?php endif;?>
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/profile.php')?>">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

     

      
      
     <?php if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 2 || $_SESSION['auth']['role'] == 3 ):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/users')?>">
          <i class="bi bi-book"></i>
          <span>users</span>
        </a>
      </li>

      <?php endif;?>
      
      <?php if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 2 || $_SESSION['auth']['role'] == 3 ):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/students')?>">
          <i class="bi bi-book"></i>
          <span>students</span>
        </a>
      </li>
      <?php endif;?>


      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/project')?>">
          <i class="bi bi-book"></i>
          <span>project</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/repliy')?>">
          <i class="bi bi-book"></i>
          <span>replies</span>
        </a>
      </li>



      <?php if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 2 || $_SESSION['auth']['role'] == 3 ):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/courses')?>">
          <i class="bi bi-book"></i>
          <span>Courses</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <?php endif;?>
      <?php if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 2 || $_SESSION['auth']['role'] == 3 ):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/app/rounds')?>">
          <i class="bi bi-clock"></i>
          <span>rounds</span>
        </a>
      </li>
      <?php endif;?>

    </ul>

  </aside><!-- End Sidebar-->
