<?php
require 'database_con.php';
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    // print_r($_POST);
    $query = "SELECT * FROM students_table WHERE email= '$email' ";
    $connection = $database_con->query($query);
    if ($connection->num_rows > 0) {
        $user = $connection->fetch_assoc();
        $_SESSION['message'] = 'Email already exist';
        header('location:signin.php');
    } else {
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO students_table (`firstname`, `email`, `address`, `age`, `password`)  VALUES (?,?,?,?,?)";
        $prepare = $database_con->prepare($query);
        $prepare->bind_param('sssis', $firstname, $email, $address, $age, $hashpassword);
        $execute = $prepare->execute();
        if ($execute) {
            echo 'execute';
        } else {
            echo '
        not executed';
        }
    }
}
