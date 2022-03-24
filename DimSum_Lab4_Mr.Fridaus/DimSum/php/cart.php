<?php 
    // include needed files
    require("connect.php");
    session_start();

    // Query for category name
    $sql = "SELECT * FROM category";
    $result = $con->query($sql);
    unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../assets/test.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- google fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <div class="container">
            <img src="../assets/Asset 6.png" button onclick="window.location='../index1.php';" alt="logo" style="width: 200px;height: 50px;" class="logo">
            <nav>
            <ul class="main-menu">

                <li><a href="../index1.php"><b>Home</b></a></li>
                <li><a href="cart.php"><b>Menu</b></a></li>
                
                <!--<i class='fas fa-user' style="margin-left: 70px;" >
                </i>-->

                <?php
                        
                    if(isset($_SESSION['mySession'])){
                        echo 
                        "<i class='fas fa-user' style=\"margin-left: 70px;\" ><ul class=\"user-dropdown\">
                        <li><i class=\"fas fa-cog\"></i><a href=\"accounteditted.php\"><b> ACCOUNT</b></a></li>
                        <li><i class=\"fas fa-power-off\"></i><a href=\"logout.php\"><b> LOGOUT</b></a></li>

                    </ul></i>";
                        
                        } 
                    else{
                        echo ("
                        <button onclick=\"window.location='../html/login.html';\" class='btn-1' ><b>LOGIN</b></button>
                        ");
                        }   
                ?>
            </ul>
            </nav>
        </div>
    </header>
    <div class="menu">
        <div class="menuBox">
            <div class="menu-content">
                <div class="category-tab glass-cat">
                    <?php 
                        // Category Tab echo
                        for($i =0;$categories = mysqli_fetch_assoc($result);$i++){
                            echo(
                                '
                                <div class="category" onclick="handleTabs('. $i .')">
                                    <h1>'. $categories["Category_Name"] .'</h1>
                                </div>
                                '
                            );
                        }
                    ?>
                </div>
                <?php 
                    // Query for item in menu
                    $sql = "SELECT * FROM category";
                    $result = $con->query($sql);


                    for($i=0;$item = mysqli_fetch_assoc($result);$i++){
                        $itemResult = $con->query("SELECT * FROM food WHERE Category_ID = ". $item["Category_ID"]);
                        echo('<div class="menu-listing glass">');
                                for($itemCount=0;$foodItem = mysqli_fetch_assoc($itemResult);$itemCount++){
                                    $foodPic = base64_encode( $foodItem['Food_pic']);
                                    echo('
                                            <div class="menu-item">
                                            <img src="data:images/jpeg;base64,'. $foodPic .'" alt="">
                                            <h3>'. $foodItem['Food_Name'] .'</h1>
                                                <p>RM'. $foodItem['Food_Price'] .'</p>
                                                <button onclick="handleAddToCart('. $foodItem['Food_ID'] .')">Add to cart</button>
                                            </div>
                                        ');
                                }                
                        echo('</div>');
                    }

                ?>

            </div>
        </div>
        <div class="checkoutBox">
            <h1>Checkout</h1>
            <div class="checkout-listing glass">
                <?php 
                    if(isset($_SESSION['cart'])){
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
                    }else{
                        echo ('
                            <div class="emptycart">
                            <p>Empty Cart!</p>
                            </div>
                        ');
                    }
                ?>
            </div>
            <div class="subtotal glass">
                <span>Subtotal:</span>
                <input type="number" disabled id="subtotal">
                <?php
                if(isset($_SESSION['mySession'])){
                    echo ('<button><a href= "../html/payment.html">Checkout</a></button>');

                }else{
                    echo ('<button>Checkout</button>');
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="content">
            <div class="row">
                <div class="column">
                    <h4>Contact us</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i>  06-761 8458</li>
                        <li><i class="fas fa-phone"></i>  06-761 9717</li>
                        <li><i class="fas fa-phone"></i>  06-761 5157</li>
                        
                    </ul>
                </div>
                <div class="column">
                    <h4>Sites</h4>
                    <ul>
                        <li><a href=".../index1.php">Home</a></li> 
                        <li><a href="cart.php">Menu</a></li> 
                        
                    </ul>
                </div>

                <div class="column">
                    <h4>Operating Hour: </h4>
                    <ul>
                        <li><i class="fas fa-calendar-day"></i> Monday - Sunday</li> 
                        <li><i class="fas fa-clock"></i>  8:00am - 3.00pm</li> 
                        
                    </ul>
                </div>

                <div class="column">
                    <h4>Restaurant </h4>
                    <div class="special-row">
                        <ul id="special">
                            <li><i class="fas fa-map-marker-alt"></i></li> 
                            
                        </ul>
                        <ul id="special-2">
                            <li>7645, Lot 5990, Jalan Labu Lama, 70200 Seremban, Negeri Sembilan</li> 
                            
                        </ul>
                    </div>
                </div>
            </div>
            


            <div class="special-link">
            <div class="whatsapp"><a href="https://wa.link/0i6foq"><button><img src='https://minkokdimsum.orderla.my/img/whatsapp-logo.svg' alt="whatsapp-logo"> <p>+6012-655 6198</p></button></a></div>
                <div class="orderla"><a href="https://minkokdimsum.orderla.my/dim-sum#section-5"><img src='https://minkokdimsum.orderla.my/img/orderla-logo-form.svg' style="width: 150px;" alt="orderla-logo" ></a></div>
                <div class="orderla"><a href="https://food.grab.com/my/en/restaurant/restoran-min-kok-dim-sum-sdn-bhd-jalan-labu-lama-non-halal-delivery/1-C2XAJRKHTT6XJ2"><img src='https://food.grab.com/static/images/logo-grabfood-white2.svg' style="width: 150px;" alt="orderla-logo" ></a></div>
                <div class="qrcode"><img src='../assets/qr.png'style="width: 70px;"> </div>
            </div>
        </div>
    </footer>
    <h1 class="test"></h1>

    <script src="../js/cart.js"></script>
</body>

</html>