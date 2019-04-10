<div class="wrapper">
    <div class="container-fluid">
        <div class="summary-container">
            <h3 class="text-center">Booking Summary</h3>
            <hr/>

            <div class="summary-row">
                <div>
                    <i class="material-icons">location_on</i>
                    <span class="key" class="key">Venue:</span>
                </div>
                <div><?php echo $venue; ?></div>
            </div>
            <div class="summary-row">
                <div>
                    <i class="material-icons">date_range</i>
                    <span class="key" class="key">Date:</span>
                </div>
                <div><?php echo $date; ?></div>
            </div>
            <div class="summary-row">
                <div>
                    <i class="material-icons">access_time</i>
                    <span class="key">Time:</span>
                </div>
                <div><?php echo $start_time . " - " . $end_time; ?></div>
            </div>
            <?php if ($is_share == 0): ?>
                <div class="summary-row">
                    <div>
                        <i class="material-icons">share</i>
                        <span class="key">Sharing:</span>
                    </div>
                    <div>No</div>
                </div>
            <?php else: ?>
                <div class="summary-row">
                    <div>
                        <i class="material-icons">share</i>
                        <span class="key">Sharing:</span>
                    </div>
                    <div>Yes</div>
                </div>
                <div class="summary-row">
                    <div>
                        <i class="material-icons">person</i>
                        <span class="key">Seat(s):</span>
                    </div>
                    <div><?php echo $seats; ?></div>
                </div>
                <div class="summary-row">
                    <div>
                        <i class="material-icons">speaker_notes</i>
                        <span class="key">Description:</span>
                    </div>
                    <div><?php echo $description; ?></div>
                </div>
            <?php endif; ?>
            <div class="summary-row">
                <div></div>
                <div style="text-align: end;">
                    <br><span class="total">Total</span><br>
                    <span class="amount">$<?php echo $price; ?></span>
                </div>
            </div>
            <hr>

            <div id="paypal-button-container"></div>
            <div class="text-center mb-2">
                <small id="paypalNote" class="text-muted font-weight-bold">THIS SERVICE DOES NOT CHARGE ANY COMMISSION
                </small>
            </div>

            <!-- Modal HTML -->
            <div id="payment-success-modal" class="modal fade">
                <div class="modal-dialog modal-confirm text-dark">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box bg-success">
                                <i class="material-icons">check</i>
                            </div>
                            <h4 class="modal-title col">Successful Booking!</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center" id="booking-ref">Booking Ref. </p>
                        </div>
                        <div class="modal-footer">
                            <form action='<?php echo base_url(); ?>' method='post' id="back-form"></form>
                            <button value="Confirm" class="btn btn-success btn-block bg-success" form="back-form">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AYDQJl8dnU3Uma0Sulb7wLiBdqe55xo9GNJDuomq9BqN4Vt32ugISG_2wH_YLcDwLTOoGX2H1wbQZ1Kd"></script>

<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currencyCode: 'HKD',
                        value: '<?php echo $price;?>'
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            // Capture the funds from the transaction
            return actions.order.capture().then(function (details) {
                let s = '<?php echo $sessions_time;?>';
                let sessions = JSON.parse(s);
                let orderID = data.orderID;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $page_url . "court_booking/payment_finish";?>',
                    data: {
                        venue_id: <?php echo $venue_id;?>,
                        sessions_time: sessions,
                        <?php if ($is_share == 1):?>
                        seats: <?php echo $seats;?>,
                        description: "<?php echo $description;?>",
                        <?php endif;?>
                    },
                    success: function () {
                        console.log('Update database success');
                        // Show a success message to your buyer
                        $('#booking-ref').append(orderID);
                        $('.modal').modal('show');
                        // Disable other dismissing methods
                        $('.modal').modal({backdrop: 'static', keyboard: false})
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        console.log(textStatus);
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>