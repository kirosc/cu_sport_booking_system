<div class="wrapper">
    <!-- Modal HTML -->
    <div id="login-success-modal" class="modal fade">
        <div class="modal-dialog modal-confirm modaldia text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box bg-success">
                        <i class="material-icons">check</i>
                    </div>
                    <h4 class="modal-title col">Register Success!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">New Account Created!</p>
                </div>
                <div class="modal-footer">
                    <form action='<?php echo $page_url; ?>login/login_main' method='post' id="confirm-form"></form>
                    <button value="Confirm" class="btn btn-success btn-block bg-success" form="confirm-form">Login</button>

                    <form action='<?php echo base_url(); ?>' method='post' id="back-form"></form>
                    <button value="Confirm" class="btn btn-success btn-block bg-success" form="back-form">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            // Disable other dismissing methods
            $('.modal').modal({backdrop: 'static', keyboard: false})
            // Pop out the modal right away
            $('.modal').modal('show');
        });
    </script>
</div>
