<?php   include 'includes/header.php'  ?>

	<aside id="colorlib-hero" class="assets/js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(assets/images/img_bg_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We help to solve business law solution</h1>
									<h2>Your Legal Solution starts here!</h2>
									<p><a class="btn btn-primary btn-lg" href="lawyers.php">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(assets/images/img_bg_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Your ultimate law &amp; legal Sulution</h1>
									<h2>Visit our sites here! <a href="#" target="_blank">EliteLawyers.com</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="lawyers.php">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(assets/images/img_bg_3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Defend Your Constitutional Right with Legal Help</h1>
									<h2>Visit our sites here! <a href="#" target="_blank">EliteLawyers.com</a></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="lawyers.php">Make An Appointment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

	<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(assets/images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
			<?php
  $query = "SELECT * FROM dash_lawyers";
  $result = mysqli_query($conn, $query);
  while ($lawyer = mysqli_fetch_object($result)):
?>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-lawyer-1"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="<?php echo $lawyer-> total_lawyers ?>" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label">Qualified Lawyer</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-courthouse"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="<?php echo $lawyer-> happy_clients ?>" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label">Trusted Clients</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-libra"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="<?php echo $lawyer-> won_cases ?>" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label">Successful Case</span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-police-badge"></i></span>
					<span class="colorlib-counter js-counter" data-from="0" data-to="<?php echo $lawyer-> pending_cases ?>" data-speed="5000" data-refresh-interval="50"></span>
					<span class="colorlib-counter-label">Honor &amp; Awards</span>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
	

	<div id="colorlib-practice">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
					<h2>Practice Area</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-courthouse"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Real Estate Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-padlock"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Insurance Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-folder"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Business Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Personal Injury</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Medical Neglegence</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Criminal Defense</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<div id="colorlib-started" style="background-image:url(assets/images/img_bg_2.jpg); margin-top:50px;margin-bottom:50px;"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container mb">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading colorlib-heading2">
					<h2>See your appoinment</p>
					<p><a href="see_appoint.php" class="btn btn-primary btn-lg">GO</a></p>
				</div>
			</div>
		</div>
	</div>
	

	<div id="colorlib-testimonial" class="colorlib-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
					<h2>What are the clients says</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/images/user-1.jpg" alt="user">
									</figure>
									<span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/images/user-1.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="assets/images/user-1.jpg" alt="user">
									</figure>
									<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
									<blockquote>
										<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="colorlib-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
					<h2>Recent Post</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="blog-featured animate-box">
						<a href="blog.html"><img class="img-responsive" src="assets/images/blog-1.jpg" alt=""></a>
						<h2><a href="blog.html">Child Abuse Cases Are Our First Priority</a></h2>
						<p class="meta"><span>Jan 5, 2017</span> | <span>3 Comments</span></p>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12 animate-box">
							<div class="blog-entry">
								<a href="blog.html" class="thumb"><img class="img-responsive" src="assets/images/blog-2.jpg" alt=""></a>
								<div class="desc">
									<h3><a href="blog.html">Family Law Is Now On Court</a></h3>
									<p class="meta"><span>Jan 5, 2017</span> | <span>3 Comments</span></p>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
								</div>
							</div>
						</div>

						<div class="col-md-12 animate-box">
							<div class="blog-entry">
								<a href="blog.html" class="thumb"><img class="img-responsive" src="assets/images/blog-3.jpg" alt=""></a>
								<div class="desc">
									<h3><a href="blog.html">Family Law Is Now On Court</a></h3>
									<p class="meta"><span>Jan 5, 2017</span> | <span>3 Comments</span></p>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
								</div>
							</div>
						</div>

						<div class="col-md-12 animate-box">
							<div class="blog-entry">
								<a href="blog.html" class="thumb"><img class="img-responsive" src="assets/images/blog-1.jpg" alt=""></a>
								<div class="desc">
									<h3><a href="blog.html">Family Law Is Now On Court</a></h3>
									<p class="meta"><span>Jan 5, 2017</span> | <span>3 Comments</span></p>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="colorlib-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
					<h2>Our Attorneys</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="colorlib-staff">
						<img src="assets/images/user-2.jpg" alt="Template">
						<h3>John Simon</h3>
						<strong class="role">Counsel</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="colorlib-staff">
						<img src="assets/images/user-2.jpg" alt="Template">
						<h3>John Doe</h3>
						<strong class="role">Head of International Practice</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="colorlib-staff">
						<img src="assets/images/user-2.jpg" alt="Template">
						<h3>Peter Washington</h3>
						<strong class="role">Managing Partner, Attorney</strong>
						<p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci.</p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php







include 'includes/footer.php'




?>