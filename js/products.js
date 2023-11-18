//// Verified search button function
$(document).ready(function(){
    $("#verified-search-btn").click(function(){
        
        action = "verified";
        productSearch();
    });
});

//// NOT Verified search button function
$(document).ready(function(){
    $("#notverified-search-btn").click(function(){
        
        action = "not-verified";
        productSearch();
    });
});

//// Reported search button function
$(document).ready(function(){
    $("#reported-search-btn").click(function(){

        action = "reported";
        productSearch();
    });
});

//// Function for fetching api to reduce repetition
function productSearch(){

    search = $("#search-input").val();
    
    fetch('products_search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `search=${search}&action=${action}`,
    })
    .then(response => response.text())
    .then(data => {
        // Update the content of the element
        $("#products-con").html(data);
    })
    .catch(error => console.error('Error:', error));
}

//// When a product is clicked it will be displayed
function showProduct(productid, rate, state, name, description, price, seller, date, category, image, file){
    $("#product-id").val(productid);
    $("#rate").val(rate);
    $("#state").val(state);
    $("#name").val(name);
    $("#des-text-area").text(description);
    $("#price").val(price);
    $("#seller").val(seller);
    $("#date").val(date);
    $("#category").val(category);

    $("#profile-img").attr('src', "documents/product/"+image);
    $("#view-btn").data('info', file);

    $("#edit-btn").data('info', productid);
    $("#update-btn").data('info', productid);
    $("#remove-btn").data('info', productid);
    $("#verify-btn").data('info', productid);

    fetch('products_report.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `productid=${productid}`,
    })
    .then(response => response.text())
    .then(data => {
        // Update the content of the element
        $(".report-wrappers").html(data);
        $(".report-wrappers").show();
    })
    .catch(error => console.error('Error:', error));
}

//// View button function
$(document).ready(function(){
    $("#view-btn").click(function(){

        var pdf = $("#view-btn").data('info');
        var pdfFile = 'documents/pdf/'+pdf;
        var link = document.createElement('a');
        link.href = pdfFile;
        link.target = '_blank';
        link.click();
    });
});

//// Add button function
$(document).ready(function(){
    $("#add-btn").click(function(){
        var productId = $(this).data("info");

        if (productId) {
            
        } else {

            notif_message = "Select a product first";
            notification(notif_message);
        }
    });
});

//// Edit button function
$(document).ready(function(){
    $("#edit-btn").click(function(){
        var productId = $(this).data("info");

        if (productId) {
            
        } else {

            notif_message = "Select a product first";
            notification(notif_message);
        }
    });
});

//// Update button function
$(document).ready(function(){
    $("#update-btn").click(function(){
        var productId = $(this).data("info");

        if (productId) {
            
        } else {

            notif_message = "Select a product first";
            notification(notif_message);
        }
    });
});

//// Remove button function
$(document).ready(function(){
    $("#remove-btn").click(function(){
        var productId = $(this).data("info");

        if (productId) {
            
        } else {

            notif_message = "Select a product first";
            notification(notif_message);
        }
    });
});

//// Verify button function
$(document).ready(function(){
    $("#verify-btn").click(function(){
        var productId = $(this).data("info");
        var action = "verify";

        if (productId) {
            var result = confirm("Are you sure you want to verify this product?");
            if (result) {
                multiFunction(action, productId);
            }
        } else {

            notif_message = "Select a product first";
            notification(notif_message);
        }
    });
});

//// Function for the add, edit, update, remove & verify buttons
function multiFunction(){
    
    $.post("productsEx.php", { action: action, id: id })
    .done(function (data){
        if (data == "Unknown"){
            
            notif_message = "Data cannot be read!";
            notification(notif_message);

        } else if (data == "No_Verify") {

            notif_message = "No product listed or it is already verified";
            notification(notif_message);

        } else if (data == "Verify_Failed") {

            notif_message = "Failed to verify the product!";
            notification(notif_message);

        } else if (data == "Verify_Success") {

            notif_message = "Successfully verified the product!";
            notification(notif_message);

        } else {
            console.log(data);
        }
    });
}

//// Accept report function
function acceptReport(productid){
    var confirm_result = confirm("Are you sure you want to approve this concern?");
    var reason = "reason";
    var action = "accept";

    if (confirm_result){
        $.post("products_disprove.php", { productid: productid, action: action, reason: reason })
            .done(function (data){
                if (data == "ProductId"){
                    
                    notif_message = "Product report does not exist!";
                    notification(notif_message);
    
                } else if (data == "Failed") {
    
                    notif_message = "Failed";
                    notification(notif_message);
    
                } else if (data == "Success_Accepted") {
    
                    notif_message = "Action initiated successfully!";
                    notification(notif_message);
    
                } else if (data == "Success_Rejected") {
    
                    notif_message = "Action initiated successfully!";
                    notification(notif_message);
    
                } else {
                    console.log(data);
                }
            });
    }
}

//// Reject report function
function rejectReport(productid){
    var confirm_result = confirm("Are you sure you want to reject this concern?");
    var action = "reject";

    if (confirm_result){
        $.post("products_disprove.php", { productid: productid, action: action })
            .done(function (data){
                if (data == "ProductId"){
                    
                    notif_message = "Product report does not exist!";
                    notification(notif_message);
    
                } else if (data == "Failed") {
    
                    notif_message = "Failed";
                    notification(notif_message);
    
                } else if (data == "Success_Accepted") {
    
                    notif_message = "Action initiated successfully!";
                    notification(notif_message);
    
                } else if (data == "Success_Rejected") {
    
                    notif_message = "Action initiated successfully!";
                    notification(notif_message);
    
                } else {
                    console.log(data);
                }
            });
    }
}

//// Function for accepting or rejecting concerns
function disproveReport(productid, action){
    $.post("products_disprove.php", { id: productid, action: action })
        .done(function (data){
            if (data == "ProductId"){
                
                notif_message = "Product report does not exist!";
                notification(notif_message);

            } else if (data == "Failed") {

                notif_message = "Failed";
                notification(notif_message);

            } else if (data == "Success_Accepted") {

                notif_message = "Successfully ";
                notification(notif_message);

            } else if (data == "Success_Rejected") {

                notif_message = "Successfully ";
                notification(notif_message);

            } else {
            }
        });
}