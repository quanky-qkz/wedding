<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

    <?php if (isset($page_js) && $page_js != '') : ?>
    <script src="<?php echo base_url();?>assets/admin/js/pages/<?php echo $page_js;?>.js"></script>
    <?php endif; ?>
  </body>
</html>