<?php



include_once '../../vendor/functions.php';
include_once '../../vendor/env.php';
include_once '../../shared/head.php';

auth(2);
if(isset($_GET['view']))
{

    $id=$_GET['view'];
    $delete="DELETE FROM `student_info` WHERE id=$id";
    $del=mysqli_query($connect,$delete);


}


redirect('index.php');



?>