



<?php

include_once '../../shared/head.php';
//include_once '../../shared/header.php';
//include_once '../../shared/aside.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';






auth(2);

$errors=[];
if(isset($_GET['id']))
{


    $id=$_GET['id'];

}


$select="SELECT * FROM `rounds`  WHERE id=$id";
$res=mysqli_query($connect,$select);
$data=mysqli_fetch_assoc($res);

$select=" SELECT * FROM `round_course` WHERE id=$id";

$result=mysqli_query($connect,$select);
$round_user=mysqli_fetch_assoc($result);

$sel="SELECT * FROM `users` WHERE types='instructor'";
$info =  mysqli_query($connect, $sel);


if(isset($_POST['submit']))
{

    $number= textvald($_POST['number']);
    $description= textvald($_POST['description']);
    $instractour=$_POST['instractor_name'];

 

 if(stringvald($number,25))
 {
$errors[]="enter valid round_number";
 }
 if(stringvald($description,100))
 {
$errors[]="enter valid round_description";
 }

    $update="UPDATE `rounds` SET `round_number`='$number', `description`='$description'  WHERE id=$id";
    $result=mysqli_query($connect,$update);

    redirect('index.php');
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>round Form</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php  if (!empty($errors)):?>
                                  <div class="alert alert-danger">
                                   <?php foreach($errors as $errors):?>
                                      <ul><?= $errors?></ul>
                                       <?php endforeach;?>
                                        </div>
                                        <?php endif; ?>

<form action="" method="post">
<div class="container mt-5">
    <h2 class="text-center">Update round Details</h2>
    <form>
        <div class="form-group">
            <label for="courseTitle">round number</label>
            <input type="text" class="form-control" id="courseTitle" placeholder="Enter course title" name="number" value="<?=$data['round_number']?>" required>
        </div>
        <div class="form-group">
            <label for="courseDescription">round Description</label>
            <input class="form-control" id="courseDescription" rows="3" placeholder="Enter course description" name="description" value="<?=$data['description']?>" required></input>
        </div>

        <div class="form-group">
        <label for="rulectSelect">Instractor Name</label>
                  <select name="instractor_name" class="form-control" required>
                   <option value='' disabled selected><?= $round_user['user_name']?></option>
                 <?php foreach ($info as $item): ?>
                 <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                 <?php endforeach; ?>
                </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        <a class="btn btn-info" href="./index.php">back</a>
    </form>
</div>
</form>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>








