//// Change property of the buy button
$(document).ready(function() {
    // Check the text of the button
    var buttonText = $("#buy-btn").text();
    
    if (buttonText === "Owned") {
        // Disable the button if text is "Owned"
        $("#buy-btn").prop("disabled", true);
        // Show the rating button if the product has been bought
        $("#rate-btn").css("display", "flex");
    }
});

//// Ajax for buying a product
function ConfirmPurchase() {
    var confirmation = confirm("Are you sure you want to buy this product?");
    var price = $("#buy-btn").val();
    var name = $("#name").html();
    var seller = $("#seller").html();

    if (confirmation){
        
        $.post("confirm_sc.php", { price: price, book: name, seller: seller })
        .done(function (data){

            if (data == "Sufficient"){

                alert("You just bought '"+name+"' by '"+seller+"' with a cost of '"+price+"'");
                location.reload(true);

            } else if (data == "Insufficient") {

                alert("Insufficient SC");

            } else if (data == "Owned") {

                alert("You already owned this product");

            }  else {

                console.log(data);
            }
        });
    }
}

$(document).ready(function() {
    $("#buy-btn").click(ConfirmPurchase);
    
});

//// Rate button function in rate button
$(document).ready(function() {
    $("#rate-btn").click(function() {
        $("#rate-wrapper").show();
    });
  });
  
//// Delete the rating localstorage every entry in product_view.php
function clearLocalRating(){
    localStorage.removeItem('temp_rating');
}