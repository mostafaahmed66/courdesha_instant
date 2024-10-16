<?php
include_once '../../shared/head.php';
include_once '../../vendor/env.php';
require_once '../../vendor/functions.php';



auth(4);



$select=" SELECT * FROM `rounds`";

$res=mysqli_query($connect,$select);

if(isset($_POST['submit']))
{
    $title=textvald($_POST['title']);
    $description= textvald($_POST['description']);
    $link=$_POST['link'];
    $roundid=$_POST['round_name'];

    if(stringvald($title,40))
    {
        $errors[]="enter vaild title";
    }
    if(stringvald($description,100))
    {
        $errors[]="enter vaild description";
    }


    $insert="INSERT INTO `projects` VALUES (NULL,'$title','$description','$link',NULL,'$roundid',DEFAULT,DEFAULT)";
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
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .container {
            background-color: #ffffff; /* White form background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h2 {
            color: #007bff; /* Blue color for the heading */
        }
        .alert {
            margin-bottom: 20px; /* Space below alerts */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border-color: #007bff; /* Border color */
        }
        .btn-info {
            background-color: #17a2b8; /* Info button color */
            border-color: #17a2b8; /* Border color */
        }
    </style>
</head>
<body>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <h4>Error!</h4>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li> <!-- Use htmlspecialchars to prevent XSS -->
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">
    <h2 class="text-center">Insert Project Details</h2>
    <form action="" method="post"> <!-- Remove the nested <form> tag -->
        <div class="form-group">
            <label for="projectTitle">Project Title</label>
            <input type="text" class="form-control" id="projectTitle" placeholder="Enter project title" name="title" required>
        </div>
        <div class="form-group">
            <label for="projectDescription">Project Description</label>
            <textarea class="form-control" id="projectDescription" rows="3" placeholder="Enter project description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="projectLink">Project Link</label>
            <input type="text" class="form-control" id="projectLink" placeholder="Enter project link" name="link" >
        </div>
        <div class="form-group">
            <label for="roundSelect">Round Name</label>
            <select name="round_name" class="form-control" required>
                <option value="" disabled selected>Select a name</option>
                <?php foreach ($res as $item): ?>
                    <option value="<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['round_number']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <a class="btn btn-info" href="./index.php">Back</a>
    </form>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
