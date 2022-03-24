<?php
    include("connect.php");
    include("session.php");
    if(isset($_SESSION['mySession'])){
    $email = $_SESSION['mySession'];
    $sql = "SELECT Email, Customer_ID from customer WHERE Email = '$email'";
    $get_cusID = mysqli_query($con, $sql);
    $rcus_ID = $get_cusID->fetch_all(MYSQLI_ASSOC);
    $row = $rcus_ID;
    foreach($rcus_ID as $row){
    }
    $cus_ID = $row['Customer_ID']; 
    $sql_phone = "SELECT Phone_No from customer WHERE Customer_ID = '$cus_ID'";
    $sql_add = "SELECT Delivery_Address from customer WHERE Customer_ID = '$cus_ID'";
    $get_pinfo = mysqli_query($con, $sql_phone);
    $get_dadd = mysqli_query($con, $sql_add);
    $p_nu = $get_pinfo -> fetch_array(MYSQLI_ASSOC);
    $d_add = $get_dadd -> fetch_array(MYSQLI_ASSOC);
    $d_add_strip = explode("| ", $d_add['Delivery_Address']);
    $p_nu = $p_nu["Phone_No"];
    $d_line1 = $d_add_strip[0];
    $d_line2 = $d_add_strip[1];
    $d_zipcode = $d_add_strip[2];
    $d_state = $d_add_strip[3];
    echo ($d_line1);
    echo ("| ");
    echo ($d_line2);
    echo ("| ");
    echo ($d_zipcode);
    echo ("| ");
    echo ($d_state);
    echo ("| ");
    echo ($p_nu);
}else{
    echo ("Address line 1:");
    echo ("| ");
    echo ("Address line 2:");
    echo ("| ");
    echo ("ZIP code:");
    echo ("| ");
    echo ("Default");
    echo ("| ");
    echo ("0123456789");
}
?>
