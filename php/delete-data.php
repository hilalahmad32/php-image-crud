<?php 

include "connection.php";
session_start();

if(isset($_GET["id"])){
    $id=$_GET["id"];

    $sql="SELECT * FROM student_image WHERE id={$id}";
    $run_sql=mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($run_sql);

    unlink("../upload/".$result["images"]);

    $sql1="DELETE FROM student_image WHERE id={$id}";
    $run_sql1=mysqli_query($conn,$sql1);
    if($run_sql){
        $_SESSION["success"]="Image Delete Successfully";
        header("location:../index.php");
    }
}
