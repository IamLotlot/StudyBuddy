//// Back button function in rate button
$(document).ready(function() {
    $("#back-btn").click(function() {
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
    $("#send-btn").click(function() {
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