<?php
    include("connect.php");
    $pwd = $_POST['password'];
    $user_email = $_POST['Email'];
    $encrypted_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $Address = $_POST['Address_1'] . "| " . $_POST['Address_2'] . "| " . $_POST['zipcode'] . "| " . $_POST['State'];
    $sql = "INSERT INTO customer (Customer_FName, Customer_LName, Email, Phone_No, DOB, Delivery_Address, Password)
    VALUES
    ('$_POST[FName]', '$_POST[LName]', '$_POST[Email]', '$_POST[Phone]', '$_POST[DOB]', '$Address', '$encrypted_pwd')"; 
    if(!mysqli_query($con, $sql)){
        echo '<script>';
        echo 'alert ("Email has been taken!");';
        echo 'window.location.href = "../html/signup.html";';
        echo '</script>';
    }
    else{
        echo ("
        <script> alert('Account Created!');
        window.location.href = '../html/login.html';
        </script>");
    }
    mysqli_close($con);
?>