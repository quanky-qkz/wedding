
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
					 <?php for ($i = 1; $i <= 50; $i++) { ?>
				 <div class="col-md-4 cate-grid grid">
					<figure>
						<img src="<?php echo base_url();?>assets/images/album/<?php echo "wedding_album_" . $i ?>.JPG" alt="">
						<figcaption>
							<h3>Our wedding</h3>
							<!-- <span>Accusantium Dolor</span> -->
							<a class="example-image-link" href="<?php echo base_url();?>assets/images/album/<?php echo "wedding_album_" . $i ?>.JPG" data-lightbox="example-1" data-title="">VIEW</a>
						</figcaption>
					</figure>
				 </div>
			 <?php } ?>
			 <script src="<?php echo base_url();?>assets/js/lightbox.js"></script>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
	<!--/attend-->
       <div class="attend">
	           <h3 class="tittle atd">Are You Attending? rsvp here!</h3>
	         <div class="rsvp">
                      <form>
					    	<div>
						    	<span><label>Your Name</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Your Email</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Ceremony & Party</label></span>
						    	<span><select name="event"><option value="All Events">All Events</option><option value="Ceremony">Ceremony</option><option value="Party">Party</option></select></span>
						    </div>
							<div>
						    	<span><label>Guest</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
							 <div class="sub">
						   		<input type="submit" value="I am attending" />
						  </div>

					    </form>
			       </div>
			    </div>
