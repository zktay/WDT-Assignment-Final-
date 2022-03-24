<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = mysqli_real_escape_string($con, $_POST['Email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $sql = "SELECT Password FROM customer WHERE Email = '$email'";
        $retval = mysqli_query($con, $sql);
        $v_pass = $retval -> fetch_assoc();

        if(password_verify($password, $v_pass['Password'])){
            session_start();
            $_SESSION['mySession']=$email;
            //header("location: ../index1.php");
            header("location:../index1.php");
        } else {
            echo '<script>';
            echo 'alert ("Your Login Email or Password is invalid. Please re login");';  //not showing an alert box.
            echo 'window.location.href = "../html/login.html";';
            echo '</script>';
        }
    }
?>