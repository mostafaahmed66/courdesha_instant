<?php



include_once '../../vendor/functions.php';
include_once '../../vendor/env.php';
include_once '../../shared/head.php';
auth();
if(isset($_GET['id']))
{

    $id=$_GET['id'];
    $delete="DELETE FROM courses WHERE id=$id";
    $del=mysqli_query($connect,$delete);

    redirect('index.php');
}






?>