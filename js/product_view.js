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



/////////////////////////////////////////////////
//// Product Rate php
/////////////////////////////////////////////////



//// Back button function in rate button
$(document).ready(function() {
    $("#back-rate-btn").click(function() {
        $("#rate-wrapper").hide();
    });
  });

////
function rate(id){
    var star1 = document.getElementById("star1");
    var star2 = document.getElementById("star2");
    var star3 = document.getElementById("star3");
    var star4 = document.getElementById("star4");
    var star5 = document.getElementById("star5");

    if (id === 1){
        star1.style.color = "#72EF36";
        star2.style.color = "black";
        star3.style.color = "black";
        star4.style.color = "black";
        star5.style.color = "black";
        localStorage.setItem('temp_rating', "1");
    } else if (id === 2){
        star1.style.color = "#72EF36";
        star2.style.color = "#72EF36";
        star3.style.color = "black";
        star4.style.color = "black";
        star5.style.color = "black";
        localStorage.setItem('temp_rating', "2");
    } else if (id === 3){
        star1.style.color = "#72EF36";
        star2.style.color = "#72EF36";
        star3.style.color = "#72EF36";
        star4.style.color = "black";
        star5.style.color = "black";
        localStorage.setItem('temp_rating', "3");
    } else if (id === 4){
        star1.style.color = "#72EF36";
        star2.style.color = "#72EF36";
        star3.style.color = "#72EF36";
        star4.style.color = "#72EF36";
        star5.style.color = "black";
        localStorage.setItem('temp_rating', "4");
    } else if (id === 5){
        star1.style.color = "#72EF36";
        star2.style.color = "#72EF36";
        star3.style.color = "#72EF36";
        star4.style.color = "#72EF36";
        star5.style.color = "#72EF36";
        localStorage.setItem('temp_rating', "5");
    }
}

//// Send button function in rate button
$(document).ready(function() {
    $("#send-rate-btn").click(function() {
        var product = $("#name").html();
        var seller = $("#seller").html();
        var comment = $("#comment").val();
        var rate = localStorage.getItem("temp_rating");

        if (!comment) {
            var comment = "N/A";
        }

        if (rate) {
            $.post("product_rateEx.php", { product: product, user: global_online_username, seller: seller, comment: comment, rate: rate })
              .done(function (data){
                  if (data == "Unknown"){
                    alert("Ewan ko ano problema");

                  } else if (data == "Existing") {
                    alert("You already rate this product!");

                  } else if (data == "Failed") {
                    alert("Couldn't insert the data into the database!");

                  } else if (data == "Success") {
                    alert("You have rate a product.");
                    window.location.reload();

                  } else {
                    console.log(data);
                  }
              });
        } else {
            alert("You didn't choose a rate for the product yet!");
        }
    });
  });



/////////////////////////////////////////////////
//// Product Report php
/////////////////////////////////////////////////



//// Report icon function
$(document).ready(function() {
    $("#report-btn").click(function() {
        $("#report-wrapper").show();
    });
  });

//// Checkbox others function
$(document).ready(function() {
    $("#cb1").click(function() {
        $('#cb4').prop('checked', false);
    });
    
    $("#cb2").click(function() {
        $('#cb4').prop('checked', false);
    });
    
    $("#cb3").click(function() {
        $('#cb4').prop('checked', false);
    });

    $("#cb4").click(function() {
        $('#cb1').prop('checked', false);
        $('#cb2').prop('checked', false);
        $('#cb3').prop('checked', false);
    });
  });

//// Back button function in report button
$(document).ready(function() {
    $("#back-report-btn").click(function() {
        $("#report-wrapper").hide();
    });
  });

//// Send button function in report button
$(document).ready(function() {
    $("#send-report-btn").click(function() {

        var checked = [];
        var issue;
        var statement = $("#statement").val();
        var product = $("#name").html();
        var seller = $("#seller").html();

        $(".checkboxes").each(function() {
          if ($(this).prop('checked')) {
            checked.push($(this).attr('id'));
          }
        });

        if (checked.join(' ') === "cb1") {
            issue = "Inappropriate Content";
        } else if (checked.join(' ') === "cb1 cb2") {
            issue = "Inappropriate Content & Copyright Concerns";
        } else if (checked.join(' ') === "cb1 cb2 cb3") {
            issue = "Inappropriate Content, Copyright Concerns & Billing Problems";
        } else if (checked.join(' ') === "cb2") {
            issue = "Copyright Concerns";
        } else if (checked.join(' ') === "cb2 cb3") {
            issue = "Copyright Concerns & Billing Problems";
        } else if (checked.join(' ') === "cb3") {
            issue = "Billing Problems";
        } else if (checked.join(' ') === "cb4") {
            issue = "Others";
        }

        if (!statement) {
            var statement = "N/A";
        }

        if (issue) {
            $.post("product_reportEx.php", { product: product, user: global_online_username, seller: seller, issue: issue, statement: statement })
            .done(function (data){
                if (data == "Unknown"){
                    alert("Ewan ko ano problema");

                } else if (data == "Failed") {
                    alert("Couldn't insert the data into the database!");

                } else if (data == "Success") {
                    alert("You have report a product.");
                    window.location.reload();

                } else {
                    console.log(data);
                }
            });
        } else {
            alert("You didn't choose a concern yet!");
        }
    });
});