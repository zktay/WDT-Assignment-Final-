<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = mysqli_real_escape_string($con, $_POST['Admin_Email']);
        $password = mysqli_real_escape_string($con, $_POST['Admin_Password']);
        $sql = "SELECT Admin_password FROM admin WHERE Admin_Email = '$email'";
        $retval = mysqli_query($con, $sql);
        $v_pass = $retval -> fetch_assoc();
        print_r ($v_pass);
        //if(password_verify($password, $v_pass['Password'])){
        if ($password == $v_pass['Admin_password']){
            session_start();
            $_SESSION['mySession']=$email;
            $temp = $_SESSION['mySession']=$email;
            //echo ($temp);
            header("location: cat.php");
        } else {
            echo '<script>';
            echo 'alert ("Your Login Email or Password is invalid. Please re login");';  //not showing an alert box.
            echo 'window.location.href = "../adminlogin.html";';
            echo '</script>';
        }
    }
?>