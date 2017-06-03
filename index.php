<?php get_header(); ?>

	<div id="page"<?php echo $homeClass ?>>
		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
		$pageAccess = TRUE;
		if ( post_password_required() ) {
			$pageAccess = FALSE;
			if ( isset( $_COOKIE['wp-postpass_' . COOKIEHASH] ) ) {
				$pageAccess = TRUE;
			}
		}
		
		if ( is_page() && $pageAccess) { ?>
			
			<?php
				if( is_front_page() ) { ?>
					<canvas id="canvas" class="mobile-none" width="100%" height="736"></canvas>
					<script>
						var canvas = document.getElementById('canvas')
						var ctx = canvas.getContext('2d')
						canvas.width = innerWidth
						canvas.height = innerHeight
						var party = smokemachine(ctx, [255, 255, 255])
						party.start() // start animating
						setInterval(function(){
							party.addsmoke(innerWidth/2, innerHeight, 1);
						}, 200)
					</script>
					<?php the_content();
				} else { ?>
				
				<?php $attachments = get_children(
		    		array(
		        		'post_type' => 'attachment',
		        		'post_mime_type' => 'image',
		        		'post_parent' => $post->ID
		    		));
		    		
		    	?>
		    		    	
				<div id="gallery">
							
					    	<?php
					    		$thumbnail_class = '';
					    		if ($post->post_content != '') {
									$content_class = '';
									if (count($attachments)) {
										$content_class = ' has_images';
										$thumbnail_class = ' thumb';
									}
								?>
						    	<div class="content<?php echo $content_class ?>">
						    		<?php	
									$show_footer = TRUE;																	
							    		if( !is_front_page() ) {
										$show_footer = FALSE;
									} ?>
							    	
							    		<?php
							    		$content = the_content();
									?>
								
								</div><!--content-->
							<?php } ?>
				
			    	
						<?php
					
						// If images don't exist, output content page. If they do exist, create side-scrolling gallerys
						if(count($attachments)) {
						    
							    global $post;
							    $filter_images = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_mime_type' => 'image', 'post_status' => null, 'post_parent' => $post->ID, 'orderby' => 'date', 'order' => 'DESC' ); 
							    $list_images = get_posts($filter_images);
							    
							    // If images exist in the page
							    if ($list_images) { ?>
							    	
							        <?php
							        	// Loop through and output each table cell
							        	foreach ( $list_images as $post_image ) {
							        	
							        		// Get image source and other meta data
							            	$src = wp_get_attachment_image_src( $post_image->ID, 'attached-image');
							            	$image_title = $post_image->post_title;
							            	$image_caption = $post_image->post_excerpt;
							            	
							            	if ($src) { ?>
							            				
						            				<?php if ($image_title || $image_caption) { ?>
							            				<div class="image_description">
							            					<?php if ($image_title) { ?>
							            						<h3><?php echo $image_title ?></h3>
							            					<?php } ?>
							            					<?php if ($image_caption) { ?>
							            						<p><?php echo $image_caption ?></p>
							            					<?php } ?>
							            					
							            				</div>
							            			<?php } ?>
								            		
								            		<img class="item<?php echo $thumbnail_class ?>" src="<?php echo $src[0]; ?>" alt="<?php echo $image_title ?>" height="70%" />
								            		
								            		<?php  ?>
							            	<?php } ?>
								        <?php } ?>
								    
							<?php } ?>
						<?php } ?>
				  		
				</div><!--gallery-->

				<?php if (strpos($_SERVER['REQUEST_URI'],'work')) { ?>
				<p>&nbsp;</p>
				<div class="work_menu">
					<h3>Other Recent Work</h3>
					<ul class="clearfix">
					<?php wp_nav_menu( array( 'menu' => 'Work Menu', 'depth' => 1 ) ); ?>					</ul>
				</div><!--work_menu-->
				<?php } ?>
			    
			    <?php } ?>

			<?php } else { ?>

			<div id="blog">

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h6>Posted <strong><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago '; ?></strong></h6>
				<br/>
				<?php the_content(); ?>
				<?php if (is_single()) { ?>
				<p>&nbsp;</p>
				<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
				<div id="contact" class="subscribe">
					<div id="mc_embed_signup">
					<form action="//zakrowling.us14.list-manage.com/subscribe/post?u=c547b4e21d86a85103ce04940&amp;id=5a49841cf2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
							<div class="mc-field-group clearfix">
								<h3>Subscribe for updates. No spam.</h3>
								<input type="email" value="" name="EMAIL" class="left required email" placeholder="Enter your email address" id="mce-EMAIL" required>
<button name="subscribe" id="mc-embedded-subscribe" class="left button">Subscribe</button>
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_c547b4e21d86a85103ce04940_5a49841cf2" tabindex="-1" value=""></div>
					    </div>
					</form>
					</div>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

			<?php } ?>			

			</div>

			<?php } ?>
		
				   
			<?php endwhile; ?> 

			<div class="clearit">
				<div class="left pagination"><?php next_posts_link( '&laquo; Previous page' ); ?></div>
				<div class="right pagination"><?php previous_posts_link( 'Next page &raquo;' ); ?></div>
			</div>

			<?php else : ?>
		   
		     	<h1>I think we're lost...</h1>
		     	<p>This page seems to be missing</p>
		   
		     <?php endif; ?>
			
			
	</div><!--page-->

  
<?php get_footer(); ?>  
