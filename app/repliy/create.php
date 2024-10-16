<?php
include_once '../../shared/head.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';



auth(4);
$errors=[];

$user_id=$_COOKIE['auth_user'];

$select=" SELECT * FROM `projects`";

$res=mysqli_query($connect,$select);

if(isset($_POST['submit']))
{
    

    $title=$_POST['title'];
   
    $link=$_POST['link'];
    $projectid=$_POST['project_title'];


    $insert="INSERT INTO `replies` VALUES (NULL,'$title','$link',NULL,'$projectid','$user_id',DEFAULT,DEFAULT)";
    $result=mysqli_query($connect,$insert);
    redirect('index.php');
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Form</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="" method="post">
<div class="container mt-5">
    <h2 class="text-center">Insert your repliy</h2>
    <form>
        <div class="form-group">
            <label for="courseTitle">repliy Title</label>
            <input type="text" class="form-control" id="prjectTitle" placeholder="Enter course title" name="title" required>
        </div>
     


<div class="form-group">
            <label for="courseDescription">repliy link</label>
            <input class="form-control" id="projectlink" rows="3" placeholder="Enter course description" name="link" required></input>
        </div>


        <div class="form-group">
        <label for="rulectSelect">project Name</label>
                  <select name="project_title" class="form-control" required>
                   <option value="" disabled selected>Select a name</option>
                 <?php foreach ($res as $item): ?>
                 <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
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

