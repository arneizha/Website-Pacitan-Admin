<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
//$op = $_GET['op'];

//if($op=="in"){
//if{
    $sql="SELECT * from admin where username='$username' AND password='$password'";
    $query = $conn->query($sql);
    if(mysqli_num_rows($query)==1){
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];
        header("location:dashboard.php");
    } else {
        die("password salah <a href=\"javascript:history.back()\">
        kembali</a>");
    }
?>