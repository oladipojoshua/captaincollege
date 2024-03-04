<?php

echo 'THIS IS A SUBMIT PAGE';
// print_r($_POST);
echo '<br/>';
echo '<br/>';

// $_POST=[
//     'firstname'=>'jkllll',
//     'lastname'=>'jkklll',
//     // 'email'=>($_POST['email']),
//     // 'password'=>($_POST['password']),
// ];
// echo '<br/>';
// $firstame
// print_r($_POST['firstname']);
// echo '<br/>';
// echo '<br/>';
// print_r($_POST['lastname']);
// echo '<br/>';
// echo '<br/>';
// print_r($_POST['email']);
// echo '<br/>';
// echo '<br/>';
// print_r($_POST['password']);
// echo '<br/>';
// echo '<br/>';

// $firstname=$_POST['firstname'];
// $lastname=$_POST['lastname'];
// echo ('<br/>'); 

// echo $firstname;
// echo $lastname;

// echo '<br/>';
// $query="INSERT INTO students_table(firstname) VALUES ('$firstname')";
// ISSET helps us to check whether the form has been filled before submitting. it makes all our input required
require 'database_con.php';
session_start();
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $firstname=$_POST['firstname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    

    // checking for email
    $query="SELECT * FROM students_table WHERE email= '$email' ";
    $connection = $database_con->query($query);
    if($connection->num_rows>0){
       $user = $connection->fetch_assoc();
       $_SESSION['message']='Email already exist';
       header('location:signup.php');
    }
    else{
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            echo $hashpassword;
            echo '<br/>';
            echo '<br/>';
            // Note: value is coming from frontend value while d table should be how those var names are in d dashboard
            $runquery="INSERT INTO students_table (`firstname`, `address`, `email`, `age`, `password`) VALUES ('$firstname', '$address', '$email', '$age', '$hashpassword')";
           $querycon=$database_con->query($runquery);
           if($querycon){
            echo $querycon;
            header('location:signin.php');
           } else{
            echo 'query not ran';
            // if in our database the email or any of the input was set as varchar and u now make it number in the frontent, it will fail
            $_SESSION['message']='Registration failed';
       header('location:signup.php');

           };
    }
} else{
    header('location:signup.html');
};
?>