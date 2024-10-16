<?php

include_once '../../shared/head.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';


auth(2);
$errors=[];


$select = "SELECT * FROM `courses`";
$res =  mysqli_query($connect, $select);

$sel="SELECT * FROM `users` WHERE types='instructor'";
$data =  mysqli_query($connect, $sel);



if(isset($_POST['submit']))
{

 $rounds_number=textvald($_POST['rounds_number']);
 $round_description= textvald($_POST['round_description']);
 $course_name=$_POST['course_name'];
 $instractor_name=$_POST['instractor_name'];

 if(stringvald($rounds_number,25))
 {
$errors[]="enter valid round_number";
 }
 if(stringvald($round_description,100))
 {
$errors[]="enter valid round_description";
 }

    $insert="INSERT INTO `rounds` VALUES (NULL,'$rounds_number','$round_description','$course_name',' $instractor_name',DEFAULT,DEFAULT)";
    $result=mysqli_query($connect,$insert);
  
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
<form action="" method="post">
<div class="container mt-5">

<?php  if (!empty($errors)):?>
                                  <div class="alert alert-danger">
                                   <?php foreach($errors as $errors):?>
                                      <ul><?= $errors?></ul>
                                       <?php endforeach;?>
                                 </div>
                                        <?php endif; ?>
    <h2 class="text-center">Insert rounds Details</h2>
    <form>
        <div class="form-group">
            <label for="courseTitle">Rounds Name or Number</label>
            <input type="text" class="form-control" id="" placeholder="Enter course title" name="rounds_number" required>
        </div>


        <div class="form-group">
            <label for="courseTitle">Rounds description</label>
            <input type="text" class="form-control" id="" placeholder="Enter course title" name="round_description" required>
        </div>
        <div class="form-group">
        <label for="rulectSelect">course Name</label>
                  <select name="course_name"  required>
                   <option value="" disabled selected>Select a course</option>
                 <?php foreach ($res as $item): ?>
                 <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                 <?php endforeach; ?>
                </select>
        </div>

        <div class="form-group">
        <label for="rulectSelect">Instractor Name</label>
                  <select name="instractor_name"  required>
                   <option value="" disabled selected>Select a instractor</option>
                 <?php foreach ($data as $item): ?>
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
