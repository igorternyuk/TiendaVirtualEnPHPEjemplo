
function getData(objForm){
    console.log("js - getting data from register form");
    var data = {};
    console.log($(objForm).children('input'));  
    $('input, select, textarea', $(objForm)).each(function(){
        if(this.name && this.name !== ''){
            data[this.name] = this.value;
            console.log("data[" + this.name + "]=" + this.value);
        }
    });

    return data;
}

function registerNewUser(){
    var postData = getData("#registerBox");
    console.log(postData);
    $.ajax({
        type: 'POST',
        async: false,
        url: '/user/register/',
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                alert(data['message']);
                $("#registerBox").hide();
            } else {
                alert(data['message']);
            }
        }        
    });
}

function showRegisterBox(){
    
}

function calcTotal(){
    console.log("Calculating subtotal");
    let total = 0;
    $(".subtotal").each(function(index, element) {
        console.log("index = " + index);
        let subTotal = $(element).attr("value");
        console.log("subTotal = " + subTotal);
        total += parseInt(subTotal);
    });
    console.log("total = " + total);
    $("#totalCost").html("<b>$" + total + "</b>");
}

function updateSubtotal(itemId){
    console.log("js - updating subtotal of product with id = " + itemId);
    let itemCount = $("#itemCount_" + itemId).val();
    console.log("itemCount = " + itemCount);
    let itemPrice = $("#price_" + itemId).attr("value");
    console.log("itemPrice = " + itemPrice);
    let subTotal = itemCount * itemPrice;
    console.log("subTotal = " + subTotal);
    $("#subTotal_" + itemId).html("$" + subTotal);
    $("#subTotal_" + itemId).attr("value", subTotal);
    calcTotal();
}

function addToCart(itemId) {
    console.log("js - addToCart(" + itemId +")");
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + "/",
        dataType: 'json',
        success: function (data){
            console.log("data['itemCount'] = " + data['itemCount']);
            if(data['success']){
                $("#cartItemCount").html(data['itemCount']);
                $("#addToCart_" + itemId).hide();
                $("#removeFromCart_" + itemId).show();
            }
        }
    });
}


function removeFromCart(itemId){
    console.log("js - removeFromCart " + itemId + ")");
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/removefromcart/" + itemId + "/",
        dataType: 'json',
        success: function(data){
            console.log("data['success'] = " + data['success']);
            console.log("data['itemCount'] = " + data['itemCount']);
           if(data['success']){
                $("#cartItemCount").html(data['itemCount']);
                $("#addToCart_" + itemId).show();
                $("#removeFromCart_" + itemId).hide(); 
           } 
        }
    });
}


