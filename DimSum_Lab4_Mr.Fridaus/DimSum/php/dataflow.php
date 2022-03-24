<?php
    session_start();
    include "conn.php";
    $customerdata = $mysqli-> query("SELECT * from customer where Email ='".$_SESSION["mySession"] . "'");
    $cusinfo = $customerdata->fetch_assoc(); 
    if(isset($_POST["fname"])){
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if(password_verify($enterpassword,$passwordhased)){
            $sql="UPDATE customer SET Customer_FName='".$fname."'where Email ='".$_SESSION['mySession'] . "'";
            $mysqli->query($sql);
            $sql2="UPDATE customer SET Customer_LName='".$lname."'where Email ='".$_SESSION['mySession'] . "'";
            $mysqli->query($sql2);
            header("location:accounteditted.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='accounteditted.php';
            </script>";
        }             
    }    

    if(isset($_POST["phone"])){
        $tel=$_POST["phone"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if(password_verify($enterpassword,$passwordhased)){
            $sql="UPDATE customer SET Phone_No='".$tel."'where Email ='".$_SESSION['mySession'] . "'";
            $mysqli->query($sql);
            header("location:accounteditted.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='accounteditted.php';
            </script>";
        }    
    }
    
    if(isset($_POST["date"])){
        $d=$_POST["date"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        $sql="UPDATE customer SET DOB='".$d."'where Email ='".$_SESSION['mySession'] . "'";
        $mysqli->query($sql);
        header("location:accounteditted.php");
    }

    if(isset($_POST["cpassword"])){
        $currentpass=$_POST["cpassword"];
        $passwordhased = $cusinfo["Password"];
        $newpass=$_POST['newpass'];
        $compass=$_POST['copass'];
        if(password_verify($currentpass,$cusinfo['Password'])){
            if($newpass===$compass){
                $t=password_hash($newpass,PASSWORD_DEFAULT);
                $sql="UPDATE customer SET Password='".$t."'where Email ='".$_SESSION['mySession'] . "'";
                $mysqli->query($sql); 
                header("location:accounteditted.php");
            }else{
                echo "<script>alert('Password or new password wrong');
                window.location.href='accounteditted.php';
                </script>";
            }
    }   }
    
    if(isset($_POST["cemail"])){
        $currentemail=$_POST["cemail"];
        $newemail=$_POST["nemail"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($currentemail===$cusinfo["Email"]){
            if(password_verify($enterpassword,$passwordhased)){
                //$_SESSION['mySession']=$newemail;
                $sql="UPDATE customer SET Email='".$newemail."'where Email ='".$_SESSION['mySession'] . "'";
                $mysqli->query($sql); 
                header("location:accounteditted.php");  
                $_SESSION['mySession']=$newemail;
                //echo ($sql);
            }
        }else{
            echo "<script>alert('email or password incorrect');
            window.location.href='accounteditted.php';
            </script>";
        }

    }

?>