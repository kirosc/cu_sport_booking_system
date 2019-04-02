<div class="wrapper"><!-- Modal HTML -->
    <div id="login-success-modal" class="modal fade">
        <div class="modal-dialog modal-confirm modaldia">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">check</i>
                    </div>
                    <h4 class="modal-title col">Login Success!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Welcome Back!</p>
                </div>
                <div class="modal-footer">
                    <form action='<?php echo base_url(); ?>' method='post' id="confirm-form"></form>
                    <button value="Confirm" class="btn btn-success btn-block" form="confirm-form">OK</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(window).on('load', function () {
            $('#login-success-modal').modal('show');
        });
    </script>
</div>