
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
			    // You can also use "$(window).load(function() {"
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
	<!--registry-->
	     <div class="registry-section">
		     <h3 class="tittle">Registry</h3>
			  <div class="registry">
				   <div class="col-md-6 registry-left">

					<div class="registry-text">
					<h4>Nhà riêng nhà trai</h4>
					<h6>137 đường Ngư Hải - P. Lê Mao - TP, Vinh</h6>
					<p>Đám vui sẽ diễn ra từ 8 h đến hết đêm</p>
					</div>
					 <a href="single.html" class="mask"><img src="<?php echo base_url();?>assets/images/r1.jpg" alt="image" class="img-responsive zoom-img"></a>
				   </div>
				    <div class="col-md-6 registry-right">
					 <a href="single.html" class="mask"><img src="<?php echo base_url();?>assets/images/r2.jpg" alt="image" class="img-responsive zoom-img"></a>
					<div class="registry-text">
					<h4>Nhà khách Nghệ An</h4>
					<h5>04 Phan Đăng Lưu - TP. Vinh</h5>
					<h6>11:00 AM</h6>
					<p>Đám cuới sẽ diễn ra vào hồi 11h</p>
					</div>

					</div>
					<div class="clearfix"> </div>
			  </div>
		 </div>
	<!--//registry-->

 <!--/program-->


 <!--
			   <div class="program">
		           <div class="container">
				     <h3 class="tittle"> Program of the Day</h3>
					   <div class="col-md-6 program-img">
					    <a href="single.html" class="mask"><img src="<?php echo base_url();?>assets/images/menu.jpg" alt="image" class="img-responsive zoom-img"></a>
						<h4>Wedding Menu</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat purus sed tempus ornare. Sed convallis eu orci ut sodales. Nam rhoncus laoreet elit, a condimentum augue tempor vitae in faucib.</p>
					   </div>
					    <div class="col-md-6 program-text">
						<div class="scrollbar" id="style-2">
								   <div class="force-overflow">

								    <div class="popular-post-grids">
										<div class="popular-post-grid">
											<div class="post-time">
												<a href="single.html">11 : 30 </a>
											</div>
											<div class="post-text">
											<h4><a class="pp-title" href="single.html">Wedding Ceremony</a></h4>
						                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat purus sed tempus ornare. Sed convallis eu orci ut sodales. Nam rhoncus laoreet elit, a condimentum augue tempor vitae in faucib.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-time">
												<a href="single.html">12 : 30 </a>
											</div>
											<div class="post-text">
												<h4><a class="pp-title" href="single.html">Photo Shoot with all</a></h4>
						                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat purus sed tempus ornare. Sed convallis eu orci ut sodales. Nam rhoncus laoreet elit, a condimentum augue tempor vitae in faucib.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-time">
												<a href="single.html">01 : 30 </a>
											</div>
											<div class="post-text">
											<h4><a class="pp-title" href="single.html">Lunch Time</a></h4>
						                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat purus sed tempus ornare. Sed convallis eu orci ut sodales. Nam rhoncus laoreet elit, a condimentum augue tempor vitae in faucib.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-time">
												<a href="single.html">11 : 30 </a>
											</div>
											<div class="post-text">
												<h4><a class="pp-title" href="single.html">Wedding Ceremony</a></h4>
						                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat purus sed tempus ornare. Sed convallis eu orci ut sodales. Nam rhoncus laoreet elit, a condimentum augue tempor vitae in faucib.</p>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
					   </div>
					   </div>
									</div>
					   <div class="clearfix"> </div>
			       </div>
			    </div>
-->
