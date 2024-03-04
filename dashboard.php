<?php
// echo 'Walcome to dashboard'
require 'database_con.php';
session_start();
echo $_SESSION['studentid'];
$student_id=$_SESSION['studentid'];
$query="SELECT * FROM students_table WHERE student_id=$student_id";
$con=$database_con-> query($query);
// print_r($con);
$user=$con->fetch_assoc();
$profile_pic=$user['profile_pic'];
// print_r($profile_pic);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/js/bootstrap.js">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="col-6 mx-auto shadow p-3">
            <div class="text-center p-3 shadow">
                welcome, <?php echo $user['firstname']?>
            </div>
        

            <form action="process.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <input name="submit" type="submit" value="upload profile pic" class="btn btn-primary">
            </form>
<?php
        if(isset($_SESSION['uploadpic'])){
            echo '<div class="alert alert-primary text-center text-light">'.$_SESSION['uploadpic'].'</div>';
        };
        unset($_SESSION['uploadpic']);
?>
        </div>
        <div>
            <img src=<?php  echo "image/".$profile_pic ?>  alt="profile_pic" width="100" height="100" class="border rounded-3  ">
        </div>
    </div>
</body>
</html>