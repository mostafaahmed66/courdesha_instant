

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


$select="SELECT `title`,`desciption` FROM `courses` WHERE id=$id";
$res=mysqli_query($connect,$select);
$data=mysqli_fetch_assoc($res);




if(isset($_POST['submit']))
{

    $title=textvald($_POST['title']);
    $description= textvald($_POST['description']);


    if(stringvald($title,40))
    {
        $errors[]="enter vaild title";
    }
    if(stringvald($description,100))
    {
        $errors[]="enter vaild description";
    }

    $update="UPDATE`courses` SET `title`='$title', `desciption`='$description' WHERE id=$id";
    $result=mysqli_query($connect,$update);

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

<?php  if (!empty($errors)):?>
    <div class="alert alert-danger">
        <?php foreach($errors as $errors):?>
            <ul><?= $errors?></ul>
            <?php endforeach;?>
    </div>
    <?php endif; ?>
<form action="" method="post">
<div class="container mt-5">
    <h2 class="text-center">Update Course Details</h2>
    <form>
        <div class="form-group">
            <label for="courseTitle">Course Title</label>
            <input type="text" class="form-control" id="courseTitle" placeholder="Enter course title" name="title" value="<?=$data['title']?>" required>
        </div>
        <div class="form-group">
            <label for="courseDescription">Course Description</label>
            <input class="form-control" id="courseDescription" rows="3" placeholder="Enter course description" name="description" value="<?=$data['desciption']?>" required></input>
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








