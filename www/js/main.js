function getData(objForm){
    console.log("js - getting data from register form");
    var data = {};
    console.log($(objForm).children('input textarea select'));  
    $('input, select, textarea', $(objForm)).each(function(){
        if(this.name && this.name !== ''){
            data[this.name] = this.value;
            console.log("data[" + this.name + "]=" + this.value);
        }
    });

    return data;
}

function updateUserData(){
    var userData = getData("#userData");
    console.log("userData:");
    console.log(userData);
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/update/",
        data: userData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                console.log("receivedData:");
                console.log(data);
                $("#userLink").attr('href', '/user/');
                $("#userLink").html(data['displayName']);
            }
                
            alert(data['message']);
        }
    });
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
            console.log(data);
            if(data['success']){
                console.log("Hiding register form");
                $("#registerBox").hide();
                $("#loginBox").hide();
                $("#userLink").attr('href', '/user/');
                $("#userLink").html(data['userName']);
                $("#userBox").show();
            }
            alert(data['message']);
        }        
    });
}

function login(){
    var loginData = getData("#loginBox");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/login/",
        data: loginData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $("#loginBox").hide();
                $("#registerBox").hide();
                $("#userLink").attr('href', '/user/');
                $("#userLink").html(data['displayName']);
                console.log('show user box');
                $("#userBox").show();
            } else {
                alert(data['message']);
            }
        }
    });
}

function logout(){
    var datos = {};
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/logout/",
        data: datos,
        dataType: 'json',
        success: function(data){
            
        }
    });
}

function toggleRegisterBox(){
    if($("#registerBoxHidden").is(":hidden")){
        $("#registerBoxHidden").show();
    } else if($("#registerBoxHidden").is(":visible")){
        $("#registerBoxHidden").hide();
    }   
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


