<?php
//C:\xampp\htdocs\project_instant
define('MAIN_URL', 'http://localhost/project_instant/round31-dashboard-main');

function base_url($var = null)
{
    return MAIN_URL . $var;
}



function redirect($var = null)
{

    echo "<script> location.replace('http://localhost/project_instant/round31-dashboard-main/$var')</script>";
}



function auth($rule_2 = null, $rule_3 = null, $rule_4 = null)
{

    if ($_COOKIE['auth_user']) {


        if ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == $rule_2 || $_SESSION['auth']['role'] == $rule_3  ||  $_SESSION['auth']['role'] == $rule_4) {
        } else {
            redirect('erorr404.php');
        }
    } else {

        redirect('login.php');
    }
    //  if (!$_SESSION['auth']) {
    //    header("location:login.php");
    //}
}


function textvald($var)
{
    $var=rtrim($var);
    $var=ltrim($var);
    $var=strip_tags($var);
    $var=htmlspecialchars($var);
    $var=stripslashes($var);

    return $var;

}

function stringvald($var ,$maxlen=25,$minlen=5)
{
    
$isempty=empty($var);
$bigthan= strlen($var)>$maxlen;
$smallthan= strlen($var)<$minlen;


    if($isempty || $bigthan || $smallthan)
    {
        return true;
    } else
    {
        return false;
    }


}

function emailvald($var,$maxlen=25,$minlen=5){

    $isempty=empty($var);
    $bigthan= strlen($var)>$maxlen;
    $smallthan= strlen($var)<$minlen;
    $isnoteamil=!filter_var($var,FILTER_VALIDATE_EMAIL);
    
        if($isempty || $bigthan || $smallthan || $isnoteamil)
        {
            return true;
        } else
        {
            return false;
        }


}
