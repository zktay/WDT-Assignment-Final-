<?php
    $con = mysqli_connect ("localhost", "root", "", "dimsum", "3306");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MYSQL:" . mysqli_connect_error();
    }
?> 