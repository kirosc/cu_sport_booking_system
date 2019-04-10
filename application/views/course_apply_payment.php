<h1>Course Apply Confirm</h1>
<p>Title: <?php echo $course->course_name;?></p>
<p>Coach: <?php echo $course->coach;?></p>
<p>Venue: <?php echo $course->venue;?></p>
<p>Date: <?php echo substr($course->start_time, 0, 10);?></p>
<p>Time: <?php echo substr($course->start_time, 11, 5)." - ".substr($course->end_time, 11, 5);?></p>

<p>Total price: <?php echo $course->price;?></p>
<p>Please click the following button to proceed payment</p>

<script src="https://www.paypal.com/sdk/js?client-id=AYDQJl8dnU3Uma0Sulb7wLiBdqe55xo9GNJDuomq9BqN4Vt32ugISG_2wH_YLcDwLTOoGX2H1wbQZ1Kd"></script>
<div id="paypal-button-container"></div>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            currencyCode: 'HKD',
            value: '<?php echo $course->price;?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $page_url."course/course_apply_payment_finish";?>',
            data: { course_id: <?php echo $course->course_id;?> },
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
