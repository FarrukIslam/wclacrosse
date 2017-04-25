<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wclacrosse
 */

?>

	</div><!-- #content -->		<!--footer section -->
		<footer id="footer_section">
			<div class="footer_top_section" style="background: url('<?php echo get_template_directory_uri(); ?>/img/underground-city-64833_1280-1.jpg') no-repeat center center fixed;"">
				<div class="footer_top">
					<div class="container">
						<div class="col-md-6 text-center white padding_top_30 padding_bottom_30">
							<h3>Thank you to <br>our sponsors!</h3>
							<div class="sponsors_logo">
								<div class="row">
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/01.png" class="img-responsive">
									</div>
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/02.png" class="img-responsive">
									</div>
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/03.png" class="img-responsive">
									</div>
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/05.png" class="img-responsive">
									</div>
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/footer_logo.png" class="img-responsive">
									</div>
									<div class="col-md-6">
										<img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.png" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 text-center white padding_top_30 padding_bottom_30">
							<h3>CONTACT US</h3>
							<p>LEAVE YOUR CONTACT INFO BELLOW</p>
							<div class="contact_US">
								<form class="contact_form">
									<input type="text" name="MERGE1" placeholder="Name" class="input_box">
									<input type="text" name="MERGE1" placeholder="Email" class="input_box">
									<input type="text" name="MERGE1" placeholder="Phone" class="input_box">
									<input type="text" name="MERGE1" placeholder="Subject" class="input_box">
									<textarea class="input_box" rows="7" cols="30"></textarea>
									<input type="submit" value="SUBMIT" class="submit_button_contact">
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
				<!--footer bottom -->
			<div class="footer_bottom_section site_bgcolor white">
	<div class="container">
		<!-- <div class="col-md-3">
			<div class="footer_widget padding_top_60 padding_bottom_60">
				<ul class="quick_links">
					<li><a href="#">Behavior and Abuse Policy</a></li>
					<li><a href="#">Refund Policy</a></li>
					<li><a href="#">Code of Conduct</a></li>
					<li><a href="#">Concussion Awareness Education</a></li>
					<li><a href="#">Master Schedule</a></li>
					<li><a href="#">Kelly Field Schedule</a></li>
					<li><a href="#">All Fields</a></li>
				</ul> 
			</div>
		</div> -->
		<?php dynamic_sidebar( 'footer_quick_link_colum_3' ); ?>
		<!-- <div class="col-md-2">
			<div class="footer_widget padding_top_60 padding_bottom_60">
				<ul class="quick_links">
					<li><a href="#">Boys Lacrosse</a></li>
					<li><a href="#">Girls Lacrosse</a></li>
					<li><a href="#">Skills & Drills</a></li>
					<li><a href="#">Lacrosse Speed & Training</a></li>
					<li><a href="#">Documents</a></li>
					<li><a href="#">Links</a></li>
				</ul>
			</div>
		</div> -->

		<?php dynamic_sidebar( 'footer_quick_link_colum_2' ); ?>


		<!-- <div class="col-md-3">
			<div class="footer_widget padding_top_60 padding_bottom_60">
				<div class="footer_logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="img-responsive">
				</div>
			</div>
		</div> -->

		<?php dynamic_sidebar( 'footer-logo-sidebar' ); ?>

		<?php// dynamic_sidebar( 'footer_right_about' ); ?>

		<div class="col-md-4">
			<div class="footer_widget padding_top_60 padding_bottom_60">
				<div class="footer_content">
					<h6>General questions</h6>
					<p> (Registration, website, payment, etc):</p>
					<p>contact Mike Bauer at <a href="#">m bauerwclax@gmail.com</a></p>
					<p>(NOTE: program specific questions sent to 
						Mike Bauer will be forwarded to the program administrators)</p>
				</div>
			</div>
		</div>

	</div>
	
</div>
			<!-- </div> -->
		</footer>
	<?php wp_footer(); ?>
	</body>
</html>





