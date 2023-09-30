//// Paypal payment gateway buttons
paypal.Buttons({
    style: {
        shape: 'pill',
        color: 'gold',
        layout: 'vertical',
        label: 'subscribe'
    },
    createSubscription: function(data, actions) {
    return actions.subscription.create({
        /* Creates the subscription */
        plan_id: 'P-1NX82174NM094511MMUJOJGY'
    });
    },
    onApprove: function(data, actions) {
    alert(data.subscriptionID); // You can add optional success message for the subscriber here
    }
}).render('#paypal-button-container-P-1NX82174NM094511MMUJOJGY'); // Renders the PayPal button