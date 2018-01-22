
	   <!--banner-->
	<div class="banner two">
	     	<div class="container">
				<h2 class="second-head">Our Albums</h2>
		    </div>
	</div>
	  <!--//banner-->
	<!--gallery-section-->
  <div class="gallery-section">
      <div class="container">
         <div class="categorie-grids cs-style-1">
					 <?php for ($i = 1; $i <= 15; $i++) { ?>
				 <div class="col-md-4 cate-grid grid">
					<figure>
						<img src="<?php echo base_url();?>assets/images/album/<?php echo "a" . $i ?>.jpg" alt="">
						<figcaption>
							<h3>Our wedding</h3>
							<!-- <span>Accusantium Dolor</span> -->
							<a class="example-image-link" href="<?php echo base_url();?>assets/images/album/<?php echo "a" . $i ?>.jpg" data-lightbox="example-1" data-title="">VIEW</a>
						</figcaption>
					</figure>
				 </div>
			 <?php } ?>
			 <script src="<?php echo base_url();?>assets/js/lightbox.js"></script>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
