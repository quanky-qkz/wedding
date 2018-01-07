<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_public/master_header_view'); ?>

<!-- Content Header (Page header) -->
<?php echo $the_view_content; ?>


<!-- add new calendar event modal -->
<!-- <script src="<?php echo base_url();?>assets/admin/js/pages/home.js" type="text/javascript"></script> -->

<?php $this->load->view('templates/_public/master_footer_view');?>
