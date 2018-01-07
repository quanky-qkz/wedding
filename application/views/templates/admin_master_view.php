<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata('adminID') || $this->session->userdata('adminID') == ''){
            redirect('login');
            exit();
}
$this->load->view('templates/_parts/admin_master_header_view'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->

    <?php $this->load->view('templates/_parts/admin_master_left_nav'); ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <?php echo $the_view_content; ?>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->
<script src="<?php echo base_url();?>assets/admin/js/pages/home.js" type="text/javascript"></script>

<?php $this->load->view('templates/_parts/admin_master_footer_view');?>