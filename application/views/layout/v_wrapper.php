<!DOCTYPE html>
<html lang="en">
    <?php  
        include 'v_head.php';
    ?>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php  
                    include 'v_sidebar.php';
                    include 'v_top.php';
                    include 'v_content.php';
                    include 'v_footer.php';
                ?>
            </div>
        </div>
        
    <!-- jQuery -->
	<script src="<?= base_url() ?>public/gentelella/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>public/gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>public/gentelella/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= base_url() ?>public/gentelella/vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="<?= base_url() ?>public/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="<?= base_url() ?>public/gentelella/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?= base_url() ?>public/gentelella/vendors/moment/min/moment.min.js"></script>
	<script src="<?= base_url() ?>public/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="<?= base_url() ?>public/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="<?= base_url() ?>public/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="<?= base_url() ?>public/gentelella/vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="<?= base_url() ?>public/gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="<?= base_url() ?>public/gentelella/vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url() ?>public/gentelella/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="<?= base_url() ?>public/gentelella/vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="<?= base_url() ?>public/gentelella/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="<?= base_url() ?>public/gentelella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="<?= base_url() ?>public/gentelella/vendors/starrr/dist/starrr.js"></script>
	
	<!-- Custom Theme Scripts -->
	<script src="<?= base_url() ?>public/gentelella/build/js/custom.min.js"></script>



	<script type="text/javascript">
		$(".alert-dismissible").alert().delay(3000).slideUp('slow');
	</script>

    <?php
        include 'v_ajax.php';
    ?>
        
    </body>

</html>
