<div class="footer">
 <div class="container">
  <div class="footer-top">
     <div class="col-md-4 footer-grid">
        <h4>Wedding <span>Venue</span></h4>
           <ul class="bottom">
        <li>(888) 123-456-7890</li>
        <li>Available 24/7</li>
      </ul>
     </div>
     <div class="col-md-4 footer-grid">
        <h4>Message Us  <span>Now </span></h4>
             <ul class="bottom">
          <li><i class="glyphicon glyphicon-home"></i>Available 24/7 </li>
        <li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">mail@example.com</a></li>
        </ul>
     </div>
   <div class="col-md-4 footer-grid">
        <h4>Address  <span>Location </span></h4>
            <ul class="bottom">
          <li><i class="glyphicon glyphicon-map-marker"></i>2901 Glassgow Road, WA 98122-1090 </li>
        <li><i class="glyphicon glyphicon-earphone"></i>phone: (888) 123-456-7899 </li>
        </ul>
     </div>
   <div class="clearfix"> </div>
  </div>
</div>
</div>

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
