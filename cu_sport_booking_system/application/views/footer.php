        <footer>
            <div class="link-container">
                <div class="about">
                    <a href="<?php echo base_url(); ?>/about_us">About us</a>
                </div>
            </div>
            <div class="copy-right">
                &copy; <?php echo date("Y");?> CU Sport Booking System. All Rights Reserved.
            </div>
        </footer>
        <!--    A mini script to prevent non-numeric character input on class number on all pages   -->
        <script>
            $(".number").keydown( function(e) {
                // prevent: "e", "=", ",", "-", "."
                if ([69, 187, 188, 189, 190].includes(e.keyCode)) {
                    e.preventDefault();
                }
            })
                .on("paste keyup",function(e){
                    $(this).val(this.value.replace(/[^\d]/g,''))
                })
        </script>
    </body>
</html>
