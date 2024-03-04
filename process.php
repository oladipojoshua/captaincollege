<?php
session_start();
require 'database_con.php';
// echo $_SESSION['studentid'];
$studentid=$_SESSION['studentid'];
if(isset($_POST['submit'])){
    // print_r($_FILES['image']['name']);
    $name=$_FILES['image']['name'];
    // echo $name;
    $temp=$_FILES['image']['tmp_name'];
    $newname=time().$name;
    $move_image=move_uploaded_file($temp,'image/'.$newname);
    if($move_image){
        // echo 'moved';
        $query="UPDATE students_table set profile_pic = '$newname' WHERE student_id=$studentid";
        $con=$database_con->query($query);
        if($con){
            // echo 'uploaded successfully';
            $_SESSION['uploadpic']='uploaded successfully';
            header('location:dashboard.php');
        }
        else{
            echo 'failed';
        }
    }
    else{
        echo 'failed';
    }
    // echo $newname;
}
else{
    header('location:signin.php');
}
?>