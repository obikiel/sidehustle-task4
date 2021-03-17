<?php
session_start();
//initialise
$name="";
$address="";
$id=0;
$edit_state=false;

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD","");
define("DB_DATABASE", "crud");
//connect the database
$db=mysqli_connect("localhost","root","","crud");
//send data to the database
if (isset($_POST['save'])){
    $name=$_POST['name'];
    $address=$_POST['address'];

    $query="INSERT INTO info(name,address) VALUES('$name','$address')"; 
    mysqli_query($db,$query);
    $_SESSION['msg']="your details have been entered"; 
    header('location:index.php'); 
}
//update data
if(isset($_POST['update'])){
    $name = ($_POST['name']);
    $address = ($_POST['address']);
    $id = ($_POST['id']);  

    mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id ");
    $_SESSION['msg']="address updated";
    header('location:index.php');
}
// delete from the database
if(isset($_GET['del'])){
    $id =$_GET['del'];
    mysqli_query($db, "DELETE FROM info WHERE id=$id");
    $_SESSION['msg'] = "address deleted";
    header('location:index.php');
}
//retrieve data from database
$results = mysqli_query($db, "SELECT*FROM info");

?> 