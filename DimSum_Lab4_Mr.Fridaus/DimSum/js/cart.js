// Tab switching handler
function handleTabs(index){
    menuList = document.querySelectorAll(".menu-listing");

    for(let i=0;i < menuList.length;i++){
        menuList[i].style.display = "none";
    }

    menuList[index].style.display = "grid";
}

function subtotalUpdate(){
    let foodPrice =document.querySelectorAll("#itemPrice");
    let foodCount =document.querySelectorAll("#itemCount");
    let total=0;

    for(let i=0;i < foodPrice.length;i++){
        total+= parseFloat(foodPrice[i].innerHTML.replace("RM","")) * parseInt(foodCount[i].innerHTML);
    }

    document.querySelector("#subtotal").value = total  
}

function handleAddToCart(id){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".checkout-listing").innerHTML = this.responseText;
        subtotalUpdate();
    }

    xhttp.open("POST", "../php/addToCart.php");
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("foodID=" + id);
}

function handleRemoveCart(id){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.querySelector(".checkout-listing").innerHTML = this.responseText;
        subtotalUpdate();
    }

    xhttp.open("POST", "../php/removeCart.php");
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("foodID=" + id);
}

// First call to kick things off
handleTabs(0);
subtotalUpdate();

function test(){
    var test = document.getElementsByName("new_pic").values;
    console.log(test)
  }