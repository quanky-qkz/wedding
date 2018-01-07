<div class="copy">
    <p>&copy; Đám cuới Phạm Quang - Phạm Quỳnh </p>
</div>
<!--//footer-->
  <!--start-smooth-scrolling-->
        <script type="text/javascript">
              $(document).ready(function() {
                /*
                var defaults = {
                    containerID: 'toTop', // fading element id
                  containerHoverID: 'toTopHover', // fading element hover id
                  scrollSpeed: 1200,
                  easingType: 'linear'
                };
                */

                $().UItoTop({ easingType: 'easeOutQuart' });

              });
            </script>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<?php if (isset($page_js) && $page_js != '') : ?>
<script src="<?php echo base_url();?>assets/js/pages/<?php echo $page_js;?>.js"></script>
<?php endif; ?>

</body>
</html>
