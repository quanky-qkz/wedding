
	<div class="banner">
	     	<div class="container">
					<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
								<div class="banner-info">
									<h3>Getting <span>Married</span></h3>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3>Quang & <span> Quỳnh</span> </h3>
								</div>
							</li>
							<li>
								<div class="banner-info">
								    <h3>Getting <span>Married</span></h3>
								</div>
							</li>
						</ul>
					</div>
					<!--banner-->
	  			<script src="<?php echo base_url();?>assets/js/responsiveslides.min.js"></script>
			 <script>

			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });

			    });
			  </script>
			 <!--main-drop-->
			 <div class="main-drop">
			   <img src="<?php echo base_url();?>assets/images/hands.jpg" alt=""/>

				 <div class="couple">
				 <div class="bride">
				   <img src="<?php echo base_url();?>assets/images/bride.jpg" class="img-responsive" alt="">
				   <h5>Bride</h5>
				 </div>
				 <div class="groom">
				  <img src="<?php echo base_url();?>assets/images/groom.jpg" class="img-responsive" alt="">
				 <h5>Groom</h5>
				 </div>
			 </div>
			 </div>
			 <!--//main-drop-->
			</div>
		 </div>
	<!--welcome-->
	   <div class="welcome">
		    <div class="container">
				<div class="welcome-top">
				    <img src="<?php echo base_url();?>assets/images/couple.jpg" class="img-responsive" alt="">
					 <h2>Quang & Quỳnh</h2>
					 <p></p>
					   <!-- <a class="read" href="<?php echo site_url('detail');?>">Read More</a> -->
				    </div>
				</div>
			</div>
		 <!--//welcome-->
