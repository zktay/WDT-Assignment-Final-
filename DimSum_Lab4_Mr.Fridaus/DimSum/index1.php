<!DOCTYPE html>
<style>

</style>
<html>
    <head>
        <link rel="shortcut icon" href="assets/test.png" />
        <link href="'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap'">
        <link href="css/mock.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="UTF-8">
        <title>Dim Sum Restaurant</title>
    
    </head>
    <body>
        <header>
            <div class="container">
                
                <img src="assets/Asset 6.png" button onclick="window.location='index1.php';" alt="logo" style="width: 200px;height: 50px;" class="logo">
                <nav>
                <ul class="main-menu">

                    <li><a href="index1.php"><b>Home</b></a></li>
                    <li><a href="php/cart.php"><b>Menu</b></a></li>
                    
                    <!--<i class='fas fa-user' style="margin-left: 70px;" >
                    </i>-->

                    <?php 
                        include("php/session.php");
                            
                        if(isset($_SESSION['mySession'])){
                            echo 
                            "<i class='fas fa-user' style=\"margin-left: 70px;\" ><ul class=\"user-dropdown\">
                            <li><i class=\"fas fa-cog\"></i><a href=\"php/accounteditted.php\"><b> ACCOUNT</b></a></li>
                            <li><i class=\"fas fa-power-off\"></i><a href=\"php/logout.php\"><b> LOGOUT</b></a></li>
    
                        </ul></i>";
                            
                            } 
                        else{
                            echo ("
                            <button onclick=\"window.location='login.php';\" class='btn-1' ><b>LOGIN</b></button>
                            ");
                            }   
                    ?>
                </ul>
                </nav>
            </div>
        </header>
        <div class="first">
            <div class="restaurant">
                <img src="assets/restaurant-cut3.png" alt="restaurant" style="width: 1000px;height: 650px;" class="restaurant">
            </div>
            <h1>
                Restaurant
            </h1>
            <p>
                <b>Dimsum Restaurant is a newly-opened dim sum restaurant in Seremban. Our main focus is to offer dishes that combine both traditions and creations that makes our dimsum dishes more than itself.
                 We offer broad range of delicious dim sum dishes that are hand-made by our chef with its own delicacy preserved using high precision method</b>
            </p>
        </div>
        <div class="second">

            <img src="assets/Asset 5.png" alt="logo-middle" style="width: 80px;height: 500px;" class="logo-middle">
            <div class="slider">
                <img src="assets/left-arrow.png" id="btn-prv" alt="arrow1">
                <img src="assets/right-arrow.png" id="btn-next" alt="arrow1">
                
                <div class="slide">
                    <img src="assets/food6.jpg" id="dupe6" alt="food6-dupe">
                    <img src="assets/food1.jpg" alt="food1">
                    <img src="assets/food2.jpg" alt="food2">
                    <img src="assets/food3.jpg" alt="food3">
                    <img src="assets/food4.jpg" alt="food4">
                    <img src="assets/food5.jpg" alt="food5">
                    <img src="assets/food6.jpg" alt="food6">
                    <img src="assets/food1.jpg" id="dupe1" alt="food1">
                </div>

                <!--<button id="btn-prv">Previous</button>
                <button id="btn-next">Next</button>-->



                <script>
                    const powerSlide = document.querySelector('.slide')
                    const powerImg = document.querySelectorAll('.slide img')

                    const prvBtn = document.querySelector('#btn-prv')
                    const nextBtn = document.querySelector('#btn-next')

                    let i = 1;
                    const size = powerImg[0].clientWidth;

                    powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';

                    nextBtn.addEventListener('click',()=>{
                        if(i >= powerImg.length - 1) return
                        powerSlide.style.transition = "transform 0.5s ease-in-out";
                        i++;
                        powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                    });

                    prvBtn.addEventListener('click',()=>{
                        if(i <= 0) return
                        powerSlide.style.transition = "transform 0.5s ease-in-out";
                        i--;
                        powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                    });

                    powerSlide.addEventListener('transitionend', ()=>{
                        if(powerImg[i].id === 'dupe6'){
                            powerSlide.style.transition = "none";
                            i = powerImg.length - 2;
                            powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                        }
                        if(powerImg[i].id === 'dupe1'){
                            powerSlide.style.transition = "none";
                            i = powerImg.length - i;
                            powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                        }
                    });
                </script>
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
                            <li><a href="index1.php">Home</a></li> 
                            <li><a href="php/cart.php">Menu</a></li> 
                            
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
                    <div class="qrcode"><img src='assets/qr.png'style="width: 70px;"> </div>
                </div>
            </div>
        </footer>
    </body>
</html>