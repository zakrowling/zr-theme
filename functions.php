<?php

	/* --------------------------------
	 * Admin Style Overides
	 */
	 
	add_action('admin_head', 'admin_style_overrides');
	
	function admin_style_overrides() {
		echo '
	    <style type="text/css">
	        .media-toolbar .media-toolbar-primary a.media-button-insert:link,
	        .media-toolbar .media-toolbar-primary a.media-button-insert:visited {
	        	display:none!important;
	        }
	    </style>';
	}
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	
	
	/* --------------------------------
	 * Add Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/* --------------------------------
	 * Remove image tags from text page
	 */
	
	function remove_images($content) {
	   $postOutput = preg_replace('/<img[^>]+./','', $content);
	   return $postOutput;
	}
	
	add_filter('the_content', 'remove_images', 100);
	
		
	/* --------------------------------
	 * Pre-select post specific attachments
	 */
	
	add_action( 'admin_footer-post-new.php', 'wpse_76048_script' );
	add_action( 'admin_footer-post.php', 'wpse_76048_script' );
	
	function wpse_76048_script() { ?>
		<script>
		jQuery(function($) {
		    var called = 0;
		    $('#wpcontent').ajaxStop(function() {
		        if ( 0 == called ) {
		            $('[value="uploaded"]').attr( 'selected', true ).parent().trigger('change');
		            called = 1;
		        }
		    });
		});
		</script>
    <?php }
    
?>