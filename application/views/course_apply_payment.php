<div class="wrapper">
    <div class="container-fluid">
        <div class="summary-container">
            <h3 class="text-center">Course Registration</h3>
            <hr/>

            <div class="summary-row">
                <div>
                    <i class="material-icons">subject</i>
                    <span class="key" class="key">Course:</span>
                </div>
                <div><?php echo $course->course_name; ?></div>
            </div>

            <div class="summary-row">
                <div>
                    <i class="material-icons">person</i>
                    <span class="key" class="key">Coach:</span>
                </div>
                <div><?php echo $course->coach; ?></div>
            </div>

            <div class="summary-row">
                <div>
                    <i class="material-icons">location_on</i>
                    <span class="key" class="key">Venue:</span>
                </div>
                <div><?php echo $course->venue; ?></div>
            </div>
            <div class="summary-row">
                <div>
                    <i class="material-icons">date_range</i>
                    <span class="key" class="key">Date:</span>
                </div>
                <div><?php echo substr($course->start_time, 0, 10); ?></div>
            </div>
            <div class="summary-row">
                <div>
                    <i class="material-icons">access_time</i>
                    <span class="key">Time:</span>
                </div>
                <div><?php echo substr($course->start_time, 11, 5) . " - " . substr($course->end_time, 11, 5); ?></div>
            </div>
            <div class="summary-row">
                <div></div>
                <div style="text-align: end;">
                    <br><span class="total">Total</span><br>
                    <span class="amount">$<?php echo $course->price; ?></span>
                </div>
            </div>
            <hr>
            <div id="paypal-button-container"></div>
            <div class="text-center mb-2">
                <small id="paypalNote" class="text-muted font-weight-bold">THIS SERVICE DOES NOT CHARGE ANY COMMISSION
                </small>
            </div>
        </div>

        <!-- Modal HTML -->
        <div id="payment-success-modal" class="modal fade">
            <div class="modal-dialog modal-confirm text-dark">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box bg-success">
                            <i class="material-icons">check</i>
                        </div>
                        <h4 class="modal-title col">Successful Registration!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center" id="booking-ref">Registration Ref. </p>
                    </div>
                    <div class="modal-footer">
                        <form action='<?php echo base_url(); ?>' method='post' id="back-form"></form>
                        <button value="Confirm" class="btn btn-success btn-block bg-success" form="back-form">OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- PayPal script that handle the transaction -->
<script src="https://www.paypal.com/sdk/js?client-id=AYDQJl8dnU3Uma0Sulb7wLiBdqe55xo9GNJDuomq9BqN4Vt32ugISG_2wH_YLcDwLTOoGX2H1wbQZ1Kd"></script>
<div id="paypal-button-container"></div>
<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currencyCode: 'HKD',
                        value: '<?php echo $course->price;?>'
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            // Capture the funds from the transaction
            return actions.order.capture().then(function (details) {
                let orderID = data.orderID;
                // Update database using AJAX
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $page_url . "course/course_apply_payment_finish";?>',
                    data: {course_id: <?php echo $course->course_id;?> },
                    success: function () {
                        console.log('Update database success');
                        // Add the order ID
                        $('#booking-ref').append(orderID);
                        // Show a success message
                        $('.modal').modal('show');
                        // Disable other dismissing methods
                        $('.modal').modal({backdrop: 'static', keyboard: false})
                    },
                    fail: function (xhr, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>
