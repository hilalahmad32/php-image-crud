<?php 

include "connection.php";
session_start();
if(isset($_POST["upload"])){
    $username=$_POST["username"];
    $filename=$_FILES["image"]["name"];
    $temp_name=$_FILES["image"]["tmp_name"];

    $extention=array("jpg","png","jpeg");
    $validation=pathinfo($filename,PATHINFO_EXTENSION);
    $new_name=rand()."-".$filename;

    if(!in_array($validation,$extention)){
        $_SESSION["error"]="Please Upload jpg,png,jpeg";
        header("location:../add-data.php");
    }else{
        $sql="INSERT INTO student_image (username,images) VALUES ('{$username}','{$new_name}') ";
        $run_sql=mysqli_query($conn,$sql);
        if($run_sql){
            move_uploaded_file($temp_name,"../upload/".$new_name); 
            $_SESSION["success"]="Image Add Successfully";
            header("location:../index.php");
        }else{
            $_SESSION["error"]="Image not add successfully";
            header("location:../add-data.php");
        }
    }
}

?>