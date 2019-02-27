
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