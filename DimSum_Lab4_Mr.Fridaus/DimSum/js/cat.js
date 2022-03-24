modeDisplay = document.querySelectorAll(".display-mode");
modeEdit = document.querySelectorAll(".edit-mode");
textDisplay = document.querySelectorAll(".display-name");
priceDisplay = document.querySelectorAll(".display-price");
textEdit = document.querySelectorAll(".edit-name");
priceEdit = document.querySelectorAll(".edit-price");
saveButton = document.querySelectorAll(".save");
editButton = document.querySelectorAll(".edit");

function handleEdit(selected){
    if(modeDisplay[selected].style.display != "none"){
        modeEdit[selected].style.display = "flex";
        modeDisplay[selected].style.display= "none";

        saveButton[selected].style.display = "block";
        editButton[selected].style.display = "none";
    }else{
        modeEdit[selected].style.display = "none";
        modeDisplay[selected].style.display= "block";

        saveButton[selected].style.display = "none";
        editButton[selected].style.display = "block";
    }
}

// Handle the change of item name and price then send ajax request
function handleChangeText(selected,itemId){
    textDisplay[selected].innerHTML = textEdit[selected].value
    priceDisplay[selected].innerHTML = "RM" + priceEdit[selected].value

    // Ajax call to send update query
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            document.querySelector(".test").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../php/categoryHandler.php?q="+itemId+"_"+textEdit[selected].value+"_"+priceEdit[selected].value,true);
    xmlhttp.send();
}


function handleDropDown(index){
    let dropDownContent = document.querySelectorAll(".section1");
    let arrowUp = document.querySelectorAll(".dropup");
    let arrowDown = document.querySelectorAll(".dropdown");
    
    if(dropDownContent[index].style.display != "none"){
        dropDownContent[index].style.display = "none";
        arrowDown[index].style.display = "initial";
        arrowUp[index].style.display = "none";
    }else{
        dropDownContent[index].style.display = "initial";
        arrowDown[index].style.display = "none";
        arrowUp[index].style.display = "initial";
    }

}

function handleAddNewItem(index,catId){
    let saveButton = document.querySelectorAll(".save-item");
    let addButton = document.querySelectorAll(".add-item");
    let inputField = document.querySelectorAll(".add-item-field");
    let nameField = document.querySelectorAll(".item-name");
    let priceField = document.querySelectorAll(".item-price");

    if(addButton[index].style.display != "none"){
        addButton[index].style.display = "none";

        saveButton[index].style.display = "initial"
        inputField[index].style.display = "flex"
    }else{
        addButton[index].style.display = "initial";

        saveButton[index].style.display = "none"
        inputField[index].style.display = "none"

        // Ajax call to send insert query
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                document.querySelector(".test").innerHTML = this.responseText;
                location.reload();
            }
        };
        xmlhttp.open("GET","../php/categoryHandler.php?w="+catId+"_"+nameField[index].value+"_"+priceField[index].value,true);
        xmlhttp.send();

        
    }
}
function handlecatname(){
    let catname =document.querySelector(".handlecat")
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            document.querySelector(".test").innerHTML = this.responseText;
            location.reload();
        }
    };
    xmlhttp.open("GET","../php/categoryHandler.php?s="+catname.value,true);
    xmlhttp.send();
}

