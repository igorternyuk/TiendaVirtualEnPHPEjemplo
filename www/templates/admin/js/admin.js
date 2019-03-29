function getData(objForm){
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

function newCategory(){
    let data = getData("#blockNewCategory");
    console.log("New category data: ");
    console.log(data);
    $.ajax({
        type: 'POST',
        async: false,
        dataType: 'json',
        data: data,
        url: "/admin/addnewcat/",
        success: function(data){
            if(data['success']){
                $("#newCategoryName").val('');
            }
            alert(data['message']);
        }
    });
}

function updateCategory(categoryId){
    let data = {};
    console.log("Update category");
    data["categoryId"] = categoryId;
    data["newCategoryName"] = $("#categoryNewName_" + categoryId).val();
    data["parentCategoryNewId"] = $("#parentCategoryNewId_" + categoryId).val();
    console.log("data:");
    console.log(data);
    $.ajax({
        type: 'POST',
        async: false,
        dataType: 'json',
        data: data,
        url: "/admin/updatecat/",
        success: function(data){
           if(data['success']){ 
               alert(data['message']);
           }
        }
    });
}

function newProduct(){
    let postData = {};
    postData['newProductName'] = $("#newProductName").val();
    postData['newProductCategoryId'] = $("#newProductCategoryId").val();
    postData['newProductPrice'] = $("#newProductPrice").val();
    postData['newProductDescription'] = $("#newProductDescription").val();
    $.ajax({
        type: 'POST',
        async: false,
        dataType: 'json',
        data: postData,
        url: "/admin/addnewproduct/",
        success: function(data){
            if(data['success']){
                alert(data['message']);
            }
        }
    });
}

function updateProduct(productId){
    let postData = {};
    postData['productId'] = productId;
    postData['name'] = $("#productName_" + productId).val();
    postData['categoryId'] = $("#productCategoryId_" + productId).val();
    postData['price'] = $("#productPrice_" + productId).val();
    postData['description'] = $("#productDescription_" + productId).val();
    postData['status'] = $("#productStatus_" + productId).attr("checked") ? 0 : 1;
    console.log("updateProduct postData:");
    console.log(postData);
    $.ajax({
        type: "post",
        dataType: 'json',
        data: postData,
        url: "/admin/updateproduct/",
        success: function(data){
            if(data['success']){
                alert(data['message']);
            }
        }
    });
}

function updateOrderStatus(orderId){
    let postData = {};
    postData['orderId'] = orderId;
    $status = $("#orderStatus_" + orderId).is(":checked");
    postData['orderStatus'] = $status ? 1 : 0;
    if($status){
        postData['orderStatus'] = 1;
        $("#orderStatusLabel_" + orderId).html("Закрыт");
    } else {
        postData['orderStatus'] = 0;
        $("#orderStatusLabel_" + orderId).html("Не оплачен");
    }

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: postData,
        url: "/admin/updateorderstatus/",
        success: function(data){
            if(data['success']){
                alert(data['message']);
            }
        }
    });
}

function updateOrderPaymentDate(orderId){
    let postData = {};
    postData['orderId'] = orderId;
    postData['orderPaymentDate'] = $("#orderPaymentDate_" + orderId).val();
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: postData,
        url: "/admin/updateorderpaymentdate/",
        success: function(data){
            if(data['success']){
                alert(data['message']);
            }
        }
    });
}

function toggleProductsView(orderId){
    let toggledOrderId = "#orderProducts_" + orderId;
    if($(toggledOrderId).is(":hidden")){
        $(toggledOrderId).show();
        $("#toggleProducts_" + orderId).html("<strong>Скрыть товары заказа</strong>");
    } else if($(toggledOrderId).is(":visible")){
        $(toggledOrderId).hide();
        $("#toggleProducts_" + orderId).html("<strong>Показать товары заказа</strong>");
    }
}

function createXML(){
    $.ajax({
        type: 'post',
        async: false,
        dataType: 'html',
        url: '/admin/createxml/',
        success: function(data){
            $("#xml-place").html(data);
            window.open('http://myshop.local/xml/products.xml', '_blank');
        }
    });
}
