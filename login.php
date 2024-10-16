<!DOCTYPE html>
<html lang="en">
<?php include_once './shared/head.php'  ?>

<body>
<?php
include_once './vendor/env.php';
include_once './vendor/functions.php';
 $errors=[];
 

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `users` where `email` = '$email' ";
    $data =  mysqli_query($connect, $select);

    $userData = mysqli_fetch_assoc($data);

    $numRows =  mysqli_num_rows($data);
    if ($numRows == 1 ) {
        $hashPassword = $userData['password'];

        $userPassword = password_verify($password, $hashPassword);
        if($userPassword)
        {

        setcookie('auth_user',$userData['id'],time()+86400*30,'/');

        $_SESSION['auth'] = [
         
            "name" => $userData['name'],
            "email" => $userData['email'],
            "type" => $userData['types'],
            "role"=>$userData['rule_id']


        ];

        
  
        redirect('/');
    
    } 


    $errors[]= "Wrong password ";
}
else {
    $errors[]= "Wrong  Email";
}
}

 


 if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    setcookie('auth_user',$userData['id'],time()-200,'/');

    redirect('/login.php');
 }
?>
<style>
    .alert {
    font-size: 0.8em; /* Smaller font size */
    padding: 10px; /* Reduced padding */
    margin-bottom: 15px; /* Space below the alert */
    border: 1px solid #f44336; /* Optional border for emphasis */
    background-color: #f8d7da; /* Light red background */
    color: #721c24; /* Darker text color for readability */
}
</style>



    <main>

    

        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">courdesha</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">

                                    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger" >
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control" id="yourUsername" >
                                                <div class="invalid-feedback">Please enter your Email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" >
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>


                                        <div class="col-12">
                                            <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="<?= base_url("/register.php") ?>">Create an account</a></p>
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