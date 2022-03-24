<?php 
    // Connection files
    require("connect.php");
    session_start();
    
    // For loop to find the clicked item in the session array
    for($i=0;$i < count($_SESSION['cart']);$i++){
        if($_SESSION['cart'][$i]['Food_ID'] == $_POST['foodID']){
            unset($_SESSION['cart'][$i]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    // For loop to re render the whole cart after removing the item
    for($i=0;$i < count($_SESSION['cart']);$i++){
        $foodPic = base64_encode( $_SESSION['cart'][$i]['Food_pic']);
        echo('
        <div class="checkout-item">
            <img src="data:images/jpeg;base64,'. $foodPic .'" alt="">
            <div class="item-text">
                <h2>'. $_SESSION['cart'][$i]['Food_Name'] .'</h2>
                <p id="itemPrice">RM'. $_SESSION['cart'][$i]['Food_Price'] .'</p>
                <p id="itemCount">'. $_SESSION['cart'][$i]['count'] .'</p>
                <button onclick="handleRemoveCart('. $_SESSION['cart'][$i]['Food_ID'] .')">Remove</button>
            </div>
        </div>
        ');
    }
?>