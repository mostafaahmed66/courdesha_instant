<?php
include_once './vendor/env.php';
include_once './vendor/functions.php';
$errors=[];

$select=" SELECT * FROM `round_course`";

$data=mysqli_query($connect,$select);


if (isset($_POST['register'])) {
    $name = textvald($_POST['name']) ;
    $email = textvald($_POST['email']);
    $password = htmlspecialchars($_POST['password']) ;
    $role=$_POST['role'];
    $round_number=$_POST['round_number'];
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
       
        $insert = "INSERT INTO users VALUES (NULL , '$name','$email','$hash_password','$role' ,4 ,DEFAULT,DEFAULT)";
        $i = mysqli_query($connect, $insert);

        
        //redirect("login.php");
       
        $user_id = mysqli_insert_id($connect);
        $insert = "INSERT INTO `students` VALUES (NULL , '$round_number','$user_id',DEFAULT,DEFAULT)";
        $i = mysqli_query($connect, $insert);

redirect('index.php');


    }
}

 
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once './shared/head.php'  ?>

<body>



    <main>

    <?php  if (!empty($errors)):?>
    <div class="alert alert-danger">
        <?php foreach($errors as $errors):?>
            <ul><?= $errors?></ul>
            <?php endforeach;?>
    </div>
    <?php endif; ?>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Registratoin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="yourName" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>



                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                        <select id="role" name="role"  class="form-control" required>
                                                <option value="student">Student</option>
                                              
                                        </select>
                                        </div>

                                        <div class="form-group">
                <label for="roundnunmber">round number</label>
                <select name="round_number" id="" class="form-control"  required>
                    <option value="" disabled selected>Select a round</option>
                    <?php foreach ($data as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['round_number'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="course">course name</label>
                <select name="course" id="" class="form-control"  >
                    <option value="" disabled selected>Select a course</option>
                    <?php foreach ($data as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['course_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>                
                                        <div class="col-12">
                                            <button name="register" class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="<?= base_url("/login.php") ?>">Log in</a></p>
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
    include_once './shared/script.php';
    ?>

</body>

</html>