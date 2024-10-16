<?php
include_once '../../shared/head.php';
include_once '../../vendor/env.php';
auth(4);


$user_id = $_COOKIE['auth_user'];

if(isset($_GET['view']))

{
  $id=$_GET['view'];
}

$select = "SELECT * FROM `repliy_project` WHERE  id  = $id";
$d = mysqli_query($connect, $select);

$data = mysqli_fetch_assoc($d);

if (isset($_POST['update'])) {
    $title = trim($_POST['rep_title']);
    $description = $_POST['demo_link'];
    $demo_link = $_POST['title'];

   
  
    $update = "UPDATE `repliy_project` SET `rep_title` = '$title' , `demo_link` = '$description',`title`='$demo_link' where  id = $id   ";
    $u = mysqli_query($connect, $update);
  
  
    redirect("index.php");
  }

  ?>



<form method="post" enctype="multipart/form-data">
                   
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="rep_title" type="text" class="form-control" value="<?= $data['rep_title'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">desription</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="demo_link" type="text" class="form-control"  value="<?= $data['demo_link'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title"  class="form-control" value="<?= $data['title'] ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>