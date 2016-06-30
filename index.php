<?php get_header(); ?>

	<div id="page"<?php echo $homeClass ?>>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
		<?php
			if( is_front_page() ) { 
				the_content();
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
						    		if( !is_front_page() ) { ?>
						     			<h1 class="page_title"><?php the_title(); ?></h1>
						     		<?php } ?>
						    	
						    		<?php
						    		$content = the_content();
								?>
							
							</div><!--content-->
						<?php } ?>
			
		    	
					<?php
				
					// If images don't exist, output content page. If they do exist, create side-scrolling gallerys
					if(count($attachments)) {
					    
						    global $post;
						    $filter_images = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_mime_type' => 'image', 'post_status' => null, 'post_parent' => $post->ID ); 
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
							    
								<div id="page_footer">
									<p class="mobile-none"><a href="javascript:;" class="button go_back">&lsaquo;</a></p>
								</div><!--page_footer-->
								        
						<?php } ?>
					<?php } ?>
			  		
			</div><!--gallery-->

			
			<div class="work_menu">
				<h3>More Case Studies</h3>
				<ul class="clearfix">
					<?php wp_list_pages('sort_column=menu_order&depth=2&exclude=17,19&title_li='); ?>
				</ul>
			</div><!--work_menu-->
		    
		    <?php } ?>
	
			   
		<?php endwhile; else: ?> 
	   
	     	<h1>I think we're lost...</h1>
	     	<p>This page seems to be missing</p>
	   
	     <?php endif; ?>
		
		
	</div><!--page-->

  
<?php get_footer(); ?>  