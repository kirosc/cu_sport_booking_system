<div class="wrapper">
    <!-- Modal HTML -->
    <div id="login-failure-modal" class="modal fade">
        <div class="modal-dialog modal-confirm modaldia text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box bg-danger">
                        <i class="material-icons">clear</i>
                    </div>
                    <h4 class="modal-title col">Register Failure!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Account has already be created with this username!</p>
                </div>
                <div class="modal-footer row">
                    <form action='<?php echo $page_url; ?>login/register_main' method='post' id="confirm-form"></form>
                    <a class="btn col btn-primary btn-block d-flex justify-content-center align-items-center"
                       href="<?php echo $page_url ?>" role="button"><span>Home</span></a>
                    <button value="Return" class="btn col btn-primary btn-block" form="confirm-form">Retry</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Disable other dismissing methods
            $('.modal').modal({backdrop: 'static', keyboard: false});
            // Pop out the modal right away
            $('.modal').modal('show');
        });
    </script>
</div>
