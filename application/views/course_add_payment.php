<h1>Course Create Confirm</h1>
<p>Title: <?php echo $title;?></p>
<p>Level: <?php echo $level_name;?></p>
<p>Description: <?php echo $description;?></p>
<p>Venue: <?php echo $venue;?></p>
<p>Date: <?php echo $date;?></p>
<p>Time: <?php echo $start_time." - ".$end_time;?></p>
<p>Price: $<?php echo $course_price;?></p>
<p>Seat: <?php echo $course_seat;?></p>

<br><br><br>
<p>Payment: $<?php echo $court_price;?></p>


<script src="https://www.paypal.com/sdk/js?client-id=AYDQJl8dnU3Uma0Sulb7wLiBdqe55xo9GNJDuomq9BqN4Vt32ugISG_2wH_YLcDwLTOoGX2H1wbQZ1Kd"></script>
<div id="paypal-button-container"></div>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            currencyCode: 'HKD',
            value: '<?php echo $court_price;?>'
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
            url: '<?php echo $page_url."course/course_add_payment_finish";?>',
            data: {
              venue_id: <?php echo $venue_id;?>,
              title: "<?php echo $title;?>",
              description: "<?php echo $description;?>",
              level_id: <?php echo $level;?>,
              price: <?php echo $course_price;?>,
              seat: <?php echo $course_seat;?>,
              sessions_time: sessions,
              start_time: "<?php echo $start_time;?>",
              end_time: "<?php echo $end_time;?>",
              date: "<?php echo $date;?>",
            },
            success: function(data) {
              console.log('success');
              window.location.href='?php echo base_url();?>';
            }
        });

        // Show a success message to your buyer
        alert('Transaction completed by ' + details.payer.name.given_name);

      });
    }
  }).render('#paypal-button-container');
</script>
