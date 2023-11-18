//// Product Logs function
$(document).ready(function() {
    $('#product-logs').click(function() {

        $("#product-logs").css('background-color', '#3B3141');
        $("#product-logs").css('color', '#F0ECE6');
        $("#plogs-header-con").show();
        $("#plogs-list").show();

        $("#transaction-logs").css('background-color', '#F0ECE6');
        $("#transaction-logs").css('color', '#3B3141');
        $("#tlogs-header-con").hide();
        $("#tlogs-list").hide();

        $("#session-logs").css('background-color', '#F0ECE6');
        $("#session-logs").css('color', '#3B3141');
        $("#slogs-header-con").hide();
        $("#slogs-list").hide();

        var action = "product-logs";
        fetch('logsEx.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=${action}`,
        })
        .then(response => response.text())
        .then(data => {
            // Update the content of the element
            $("#plogs-list").html(data);
        })
        .catch(error => console.error('Error:', error));
    });
});

//// Transaction Logs function
$(document).ready(function() {
    $('#transaction-logs').click(function() {

        $("#product-logs").css('background-color', '#F0ECE6');
        $("#product-logs").css('color', '#3B3141');
        $("#plogs-header-con").hide();
        $("#plogs-list").hide();

        $("#transaction-logs").css('background-color', '#3B3141');
        $("#transaction-logs").css('color', '#F0ECE6');
        $("#tlogs-header-con").show();
        $("#tlogs-list").show();

        $("#session-logs").css('background-color', '#F0ECE6');
        $("#session-logs").css('color', '#3B3141');
        $("#slogs-header-con").hide();
        $("#slogs-list").hide();

        var action = "transaction-logs";
        fetch('logsEx.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=${action}`,
        })
        .then(response => response.text())
        .then(data => {
            // Update the content of the element
            $("#tlogs-list").html(data);
        })
        .catch(error => console.error('Error:', error));
    });
});

//// Session Logs function
$(document).ready(function() {
    $('#session-logs').click(function() {

        $("#product-logs").css('background-color', '#F0ECE6');
        $("#product-logs").css('color', '#3B3141');
        $("#plogs-header-con").hide();
        $("#plogs-list").hide();

        $("#transaction-logs").css('background-color', '#F0ECE6');
        $("#transaction-logs").css('color', '#3B3141');
        $("#tlogs-header-con").hide();
        $("#tlogs-list").hide();

        $("#session-logs").css('background-color', '#3B3141');
        $("#session-logs").css('color', '#F0ECE6');
        $("#slogs-header-con").show();
        $("#slogs-list").show();

        var action = "session-logs";
        fetch('logsEx.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=${action}`,
        })
        .then(response => response.text())
        .then(data => {
            // Update the content of the element
            $("#slogs-list").html(data);
        })
        .catch(error => console.error('Error:', error));
    });
});