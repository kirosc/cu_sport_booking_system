<h1>Booking Confirm</h1>
<p>Date: <?php echo $date;?></p>
<p>Time: <?php echo $start_time." - ".$end_time;?></p>
<?php if ($is_share == 0):?>
  <p>Sharing to Other: No</p>
<?php else:?>
  <p>Sharing to Other: Yes</p>
  <p>Available Seats: <?php echo $seats;?></p>
  <p>Description: <?php echo $description;?></p>
<?php endif;?>
<p>Total price: $<?php echo $price;?></p>


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
        var s = '<?php echo $sessions_time;?>';
        var sessions = JSON.parse(s);
        $.ajax({
            type: 'POST',
            url: '<?php echo $page_url."court_booking/payment_finish";?>',
            data: {
              venue_id: <?php echo $venue_id;?>,
              sessions_time: sessions,
              <?php if ($is_share == 1):?>
                seats: <?php echo $seats;?>,
                description: "<?php echo $description;?>",
              <?php endif;?>
            },
            success: function(data) {
              console.log('success');
              console.log(data);
              window.location.href='<?php echo base_url();?>';
            }
        });

        // Show a success message to your buyer
        alert('Transaction completed by ' + details.payer.name.given_name);

      });
    }
  }).render('#paypal-button-container');
</script>
