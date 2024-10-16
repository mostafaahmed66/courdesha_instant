<?php

include_once '../../shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';
auth(2,3);




$select=" SELECT * FROM `round_course`";

$data=mysqli_query($connect,$select);






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
              
              <a  class="btn btn-info" href="./create.php">create new round</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">round_number</th>
                    <th scope="col">course_name</th>
                    <th scope="col">instractor_name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>

                  
                  </tr>
                </thead>
                <tbody>
                  
                  
                  
                  <?php foreach($data as $item):?>
                  <tr>
                  <td><?= $item['id']?></td>
                    <td><?= $item['round_number']?></td>
                    <td><?= $item['course_name']?></td>
                    <td><?= $item['user_name']?></td>
                    <td><a class="btn btn-success" href="./update.php?id=<?= $item['id']?>">update</a></td>
                    <td><a class="btn btn-danger" href="./delete.php?id=<?= $item['id']?>">delete</a></td>

                   
                       
                
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