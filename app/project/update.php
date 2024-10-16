<?php
include_once '../../shared/head.php';
include_once '../../vendor/env.php';
auth(4);
$errors=[];
$user_id = $_COOKIE['auth_user'];

if(isset($_GET['view']))

{
  $id=$_GET['view'];
}

$select = "SELECT * FROM `projects` WHERE  id  = $id";
$d = mysqli_query($connect, $select);

$data = mysqli_fetch_assoc($d);

if (isset($_POST['update'])) {
  $title=textvald($_POST['title']);
  $description= textvald($_POST['description']);
  $demo_link=$_POST['demo_link'];


  if(stringvald($title,40))
  {
      $errors[]="enter vaild title";
  }
  if(stringvald($description,100))
  {
      $errors[]="enter vaild description";
  }

   
  
    $update = "UPDATE `projects` SET `title` = '$title' , `description` = '$description',`demo_link`='$demo_link' where  id = $id   ";
    $u = mysqli_query($connect, $update);
  
  
    redirect("index.php");
  }

  ?>

<?php  if (!empty($errors)):?>
    <div class="alert alert-danger">
        <?php foreach($errors as $errors):?>
            <ul><?= $errors?></ul>
            <?php endforeach;?>
    </div>
    <?php endif; ?>


<form method="post" enctype="multipart/form-data">
                   
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" value="<?= $data['title'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">desription</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="description" type="text" class="form-control"  value="<?= $data['description'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">link</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="demo_link"  class="form-control" value="<?= $data['demo_link'] ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>