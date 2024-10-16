<?php
include_once '../../shared/head.php';
include_once '../../vendor/env.php';
auth(2);
$errors=[];

$user_id = $_COOKIE['auth_user'];

if(isset($_GET['view']))

{
  $id=$_GET['view'];
}

$select = "SELECT * FROM users WHERE  id  = $id";
$d = mysqli_query($connect, $select);

$data = mysqli_fetch_assoc($d);

if (isset($_POST['update'])) {
  $name =  textvald($_POST['name']);
  $email =textvald($_POST['email']) ;

  if(stringvald($name,35))
  {
    $errors[]="enter valid name ";
  }
  if(stringvald($email,35))
  {
    $errors[]="enter valid email ";
  }

   
  
    $update = "UPDATE users SET `name` = '$name' , email = '$email'  where  id = $id   ";
    $u = mysqli_query($connect, $update);
    $_SESSION['auth']['name'] = $name;
    $_SESSION['auth']['email'] = $email;
    
  
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
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<?= $data['name'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= $data['email'] ?>">
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>