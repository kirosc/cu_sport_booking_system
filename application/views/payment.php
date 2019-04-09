<p>price: <?php echo $price;?></p>

<script src="https://www.paypal.com/sdk/js?client-id=AYDQJl8dnU3Uma0Sulb7wLiBdqe55xo9GNJDuomq9BqN4Vt32ugISG_2wH_YLcDwLTOoGX2H1wbQZ1Kd"></script>
<div id="paypal-button-container"></div>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            currencyCode: 'HKD',
            value: '<?php echo $price;?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        $.ajax({
            type: 'POST',
            <?php if (isset($course_id)): ?>
              url: '<?php echo $page_url."course/payment_finish";?>',
              data: { course_id: <?php echo $course_id?> },
            <?php elseif (isset($venue_id)): ?>
              url: '<?php echo $page_url."court_booking/payment_finish";?>',
              data: { venue_id: <?php echo $venue_id?> },
            <?php endif;?>
            success: function() {
              console.log('success');
              window.location.href='<?php echo base_url();?>';
            }
        });

        // Show a success message to your buyer
        alert('Transaction completed by ' + details.payer.name.given_name);

      });
    }
  }).render('#paypal-button-container');
</script>
