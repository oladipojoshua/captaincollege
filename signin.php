<?php
// print_r ($_POST);
require 'database_con.php';
session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $query="SELECT * FROM students_table WHERE email='$email' ";
    $con=$database_con->query($query);
    if($con->num_rows>0){
        // echo 'email exist';
        $user=$con->fetch_assoc();
        $hashed=$user['password'];
        $password_verify=password_verify($pass, $hashed);
        if($password_verify){
          // echo '<div class="text-center text-danger">Password is correct</div>';
          $student_id=$user['student_id'];
          $_SESSION['studentid']=$student_id;
          header('location:dashboard.php');
        }
        else{
          echo '<div class="text-center text-danger">Incorrect Password</div>';
        }
    }else{
        // echo 'email does not exist';
        echo '<div class="text-center text-danger">Incorrect Email</div>'; 
    }
}

    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
</head>
<body>
<div class="container">
      <div class="row">
        <div class="col-6 mx-auto px-4 shadow mt-5">
            <h4 class="text-info text-center">Sign in Here!</h4>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" class="form-control my-2" placeholder="Email" name="email" required />
            <input type="text" class="form-control my-2" placeholder="Password" name="password" required/>
            <button class="btn btn-success w-100 my-4 text-white fw-bold" name="submit" type="submit">SUBMIT</button>
            </form>
        </div>
       
      </div>
    </div>
</body>
</html>