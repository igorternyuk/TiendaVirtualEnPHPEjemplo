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
    /*
     * $productId = filter_input(INPUT_POST, 'productId');
    $name = filter_input(INPUT_POST, 'name');
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $price = filter_input(INPUT_POST, 'price');
    $description = filter_input(INPUT_POST, 'description');
    $status = filter_input(INPUT_POST, 'description');
    $image = filter_input(INPUT_POST, 'status');
    */
    let postData = {};
    postData['productId'] = productId;
    postData['name'] = $("#productName_" + productId).val();
    postData['categoryId'] = $("#productCategoryId_" + productId).val();
    postData['price'] = $("#newProductDescription").val();
    postData['description'] = $("#newProductCategoryId").val();
    postData['status'] = $("#newProductPrice").val();
    postData['image'] = $("#newProductDescription").val();
}
