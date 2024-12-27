<footer>
    <center>&copy;Coppy right <?php echo date('Y');
                                ?></center>
</footer>
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/materialize.js"></script>
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/materialize.min.js"></script>
<!-- data-tables -->
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/plugins/data-tables/data-tablesscript.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin
Settings-->
<script type="text/javascript" src="<?php echo
                                    base_url(); ?>assets/js/plugins.js"></script>
<script>
    $(".button-collapse").sideNav();
</script>
<script type="text/javascript">
    $('#alert_close').click(function() {
        $("#alert_box").fadeOut("slow", function() {});
    });
</script>
</body>

</html>