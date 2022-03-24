<?php 

    //Connections
    require("connect.php");
    session_start();

    // Query for ajax passed ID
    $sql = "SELECT * FROM food WHERE FOOD_ID=".$_POST['foodID'];
    $result = $con->query($sql);
    $result = $result->fetch_assoc();

    // Check if cart session already exist
    if(isset($_SESSION['cart'])){
        // If statement to check if queried ID does exist in the current session array
        if(in_array($result['Food_ID'],array_column($_SESSION['cart'],'Food_ID'))){

            // For loop to loop through the array and get the existing item index for incrementing
            for($i=0;$i < count($_SESSION['cart']);$i++){
                $foodPic = base64_encode( $_SESSION['cart'][$i]['Food_pic']);

                if($_SESSION['cart'][$i]['Food_ID'] == $result['Food_ID']){
                    $_SESSION['cart'][$i]['count']+=1;
                }
                // Rerender each item after changes
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
        }else{
            // Add the new item into the current cart session array
            $result['count'] =1;
            array_push($_SESSION['cart'],$result);
            foreach($_SESSION['cart'] as $cartItem){
                $foodPic = base64_encode( $cartItem['Food_pic']);
                //Rerender
                echo('
                <div class="checkout-item">
                    <img src="data:images/jpeg;base64,'. $foodPic .'" alt="">
                    <div class="item-text">
                        <h2>'. $cartItem['Food_Name'] .'</h2>
                        <p id="itemPrice">RM'. $cartItem['Food_Price'] .'</p>
                        <p id="itemCount"> '. $cartItem['count'] .'</p>
                        <button onclick="handleRemoveCart('. $cartItem['Food_ID'] .')">Remove</button>
                        </div>
                    </div>
                ');
            }
        }
    }else{
        // Create the session and add the item in
        $result['count'] = 1;
        $_SESSION['cart'] = array($result);
        // for loop to echo out the cart
        foreach($_SESSION['cart'] as $cartItem){
            $foodPic = base64_encode( $cartItem['Food_pic']);
            echo('
                <div class="checkout-item">
                    <img src="data:images/jpeg;base64,'. $foodPic .'" alt="">
                    <div class="item-text">
                        <h2>'. $cartItem['Food_Name'] .'</h2>
                        <p id="itemPrice">RM'. $cartItem['Food_Price'] .'</p>
                        <p id="itemCount">'. $cartItem['count'] .'</p>
                        <button onclick="handleRemoveCart('. $cartItem['Food_ID'] .')">Remove</button>
                    </div>
                </div>
            ');
        }
        
    }
?>