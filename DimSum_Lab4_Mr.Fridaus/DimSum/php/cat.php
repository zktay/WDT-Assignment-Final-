<?php
    require "conn.php";
    // query for all category name
    $result = $mysqli-> query("SELECT * from category");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin pages</title>
    <link rel="shortcut icon" href="../assets/test.png" />
    <link rel="stylesheet" href="../css/cat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">

    <!-- font-awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>

<body class="background">
    <div class="title-text">
        <h1 class="header1">Category Pages</h1>
        <i class="fas fa-user-cog"></i>
        <hr>
    </div>
    <!-- cat1 -->
    <?php 
        
        $itemIndex = 0;


    
        // Echo for all header category
        for ($i = 0;$data = $result->fetch_assoc();$i++){
            echo(' 
        <div class="cat">
            <div class="cat-header">
                <h1 class="cat-title">' . $data['Category_Name'] . '</h1>
                <i class="fas fa-chevron-down dropdown" onclick="handleDropDown(' . $i .')"></i>
                <i class="fas fa-chevron-up dropup" style="display: none;" onclick="handleDropDown(' . $i .')"></i>
            </div>
            <div class="section1">
            ');

        // Query for food item following category
        $itemResult = $mysqli->query("SELECT * FROM food WHERE Category_ID = " . $data['Category_ID']);
        for($rowI = 0;$row  = mysqli_fetch_array($itemResult,MYSQLI_ASSOC);$rowI++){
        // Echo for all items in category
        echo ('
                <div class="edittext">
                    <div class="display-mode">
                        <h1 class="display-name">'. $row['Food_Name'] .'</h1>
                        <p class="display-price">RM'. $row['Food_Price'] .'</p>
                    </div>
                    <div class="edit-mode">
                        <input class="edit-name" type="text" value="'. $row['Food_Name'] .'" onchange="handleChangeText('.  $itemIndex .','. $row['Food_ID'] .')">
                        <input class="edit-price" type="text" value="'. $row['Food_Price'] .'" onchange="handleChangeText('. $itemIndex .','. $row['Food_ID'] .')">
                    </div>
                    <button onclick="handleEdit('. $itemIndex .')" class="save"><i class="fas fa-save"  aria-hidden="true"></i></button>
                    <button onclick="handleEdit('. $itemIndex .')" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </div>
        ');
                $itemIndex++;
        }
        echo ('
                        <div class="add-item-box">
                        <div class="add-item-field">
                            <label>Item Name</label>
                            <input type="text" class="item-name">
                            <label>Item Price</label>
                            <input type="text" class="item-price">
                        </div>
                        <button class="add-item" onclick="handleAddNewItem(' . $i .','. $data['Category_ID'] .')">Add new item <i class="fas fa-plus"></i></button>
                        <button class="save-item" onclick="handleAddNewItem(' . $i .','. $data['Category_ID'] .')">Save new item</button>
                    </div>
                </div>
            </div>');
    }
    ?>
<!-- add new cat -->
    <?php
        echo ('
        <div class="cat">
            <div class="addcat">
                <label class = "cat-title font" ><h4>New Category</h4></label>
                <input class="handlecat"type="text">
                <button class="add" onclick="handlecatname()"><i class="fas fa-save"  aria-hidden="true"></i></button>
            </div>
        </div>
            ');
    
    ?>
    <h1 class="test"></h1>
    <script src="../js/cat.js"></script>
</body>
</html>