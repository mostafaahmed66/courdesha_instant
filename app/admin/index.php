<?php
include_once '../../shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';
auth(2,3);
$count=1;

$select="SELECT `id`, `name`,`email`,`createc_by`,`rule_id` FROM user_admin";
$data = mysqli_query($connect, $select);






?>

<?php 



?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
              <a  class="btn btn-info" href="create.php">create admin</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">created_by</th>
                    <th scope="col">Action</th>
                    <th scope="col">rule_id</th>

                    


                  
                  
                  </tr>
                </thead>
                <tbody>
                  
                  
                  
                  <?php foreach($data as $item):?>
                  <tr>
                    <th scope="row"><?= $count++?></th>
                    <td><?= $item['name']?></td>
                    <td><?= $item['email']?></td>
                    <?php if($item['createc_by']==NULL): ?>
                    <td>owner</td>
                    <?php else:?>
                        <td><?= $item['createc_by']?></td>

                        <?php endif;?>
                        <th><a  class="text-info" href="view.php?view=<?= $item['id']?>">view</a></th>
                        <th><?= $item['rule_id']?></th>
                
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
include_once "../../shared/footer.php";
include_once '../../shared/script.php';
?>