<?php
include_once '../../vendor/env.php';
include_once '../../vendor/functions.php';
include_once '../../shared/head.php' ;

auth(2);
$errors=[];
$user_id = $_COOKIE['auth_user'];
$select = "SELECT * FROM `rules`";
$res =  mysqli_query($connect, $select);


if (isset($_POST['register'])) {
    $name = textvald($_POST['name']) ;
    $email = textvald($_POST['email']);
    $rule=$_POST['rule_name'];
    $password =  htmlspecialchars($_POST['password']);
    $select = "SELECT * FROM `users` where `email` = '$email' ";
    $data =  mysqli_query($connect, $select);
    $numRows =  mysqli_num_rows($data);
    if(stringvald($name,40))
    {
        $errors[]="enter vaild name";
    }
    if(emailvald($email,40))
    {
        $errors[]="enter vaild email";
    }
    if ($numRows > 0) {
        $errors[]= "using anther mail";
    } else {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
       
        $full_path =  'image.jpg';
        //$result =  move_uploaded_file($tmp_name, $location);
        $insert = "INSERT INTO admins VALUES (NULL , '$name','$email','$hash_password', '$full_path' ,'$user_id','$rule')";
        $i = mysqli_query($connect, $insert);
        redirect("index.php");
    }
}

 
?>







    <main>
        <div class="container">
        <?php  if (!empty($errors)):?>
                                  <div class="alert alert-danger">
                                   <?php foreach($errors as $errors):?>
                                      <ul><?= $errors?></ul>
                                       <?php endforeach;?>
                                 </div>
                                        <?php endif; ?>

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">ADD ADMIN</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">
                               

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an New Admin</h5>
                                        <p class="text-center small">Enter l details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="yourName">
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="text" name="email" class="form-control" id="yourEmail" >
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="rulectSelect">rule Name</label>
                                            <select name="rule_name" class="form-control" required>
                                            <option value="" disabled selected>Select a rule</option>
                                             <?php foreach ($res as $item): ?>
                                             <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                          <?php endforeach; ?>
                                            </select>
                                         </div>


                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <button name="register" class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <?php
    include_once '../../shared/script.php';
    ?>

