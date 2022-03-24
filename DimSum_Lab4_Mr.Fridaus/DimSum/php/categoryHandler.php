<?php 
    require ('conn.php');

    if($q = $_GET['q']){
        $q = explode("_",$q);
        $sql = "UPDATE food SET Food_Name = '". $q[1] ."', Food_Price = ". $q[2] ." WHERE Food_ID =". $q[0];
        if($mysqli->query($sql) === true){

        } else{
            echo("query failed");
        }
    }

    if($w = $_GET['w']){
        $w = explode("_",$w);
        $sql = "INSERT INTO food (Category_ID,Food_Name,Food_Price,Food_pic) VALUES (". $w[0] .",'". $w[1] . "',". $w[2] . "," . "'HELLO'" . ")";
        if($mysqli->query($sql) === true){
            //echo ("YES");
        } else{
            echo("query failed");
            //echo ($sql);
        }
    }
    if($s =$_GET['s']){
        $sql ="INSERT INTO category (Category_Name) VALUES ('$s')";
        if($mysqli->query($sql) === true){
    
        }else{
            echo("query failed");
        }
    }
?>