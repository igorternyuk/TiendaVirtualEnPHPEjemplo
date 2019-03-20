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
