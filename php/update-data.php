<?php 

include "connection.php";

session_start();
if(isset($_POST["upload"])){
    $id=$_POST["id"];
    $username=$_POST["username"];
    $old_image=$_POST["old_image"];
    $new_file=$_FILES["new_image"]["name"];
    $temp_file=$_FILES["new_image"]["tmp_name"];
    $new_name=rand()."-".$new_file;
    $extention=array("jpg","png","jpeg");
    if($new_file == ""){
        $filename=$old_image;
    }else{
        $filename=$new_name;
    }
    $validation=pathinfo($filename,PATHINFO_EXTENSION);


    if(!in_array($validation,$extention)){
        $_SESSION["error"]="Please Upload jpg,png,jpeg";
        header("location:../edit-data.php?id=".$id);
    }else{

        $sql="UPDATE student_image SET username='{$username}' , images='{$filename}' WHERE id={$id}";

        $run_sql=mysqli_query($conn,$sql);
        if($run_sql){
            if($new_file != ""){
                move_uploaded_file($temp_file ,"../upload/".$filename);
                unlink("../upload/".$old_image);
            }
            $_SESSION["success"]="Image update Successfully";
            header("location:../index.php");
        }else{
            $_SESSION["error"]="Image not update successfully";
            header("location:../edit-data.php");
        }
    }
    
}
