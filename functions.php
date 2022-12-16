<?php

	/* --------------------------------
	 * Admin style overrides
	 * -------------------------------- */
	 
	add_action('admin_head', 'admin_style_overrides');
	
	function admin_style_overrides() {
		echo '
	    <style type="text/css">
	        .media-toolbar .media-toolbar-primary a.media-button-insert:link,
	        .media-toolbar .media-toolbar-primary a.media-button-insert:visited {
	        	display:none!important;
	        }
		.media-sidebar {
			width: 520px;
		}
		.attachment-details .setting textarea {
			height: 180px;
		}
	    </style>';
	}
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	
	
	/* --------------------------------
	 * Add post thumbnails
	 * -------------------------------- */
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
	 * Register menus
	 * -------------------------------- */
	function register_my_menu() {
  		register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_my_menu' );


	/* --------------------------------
	 * Change blog read more
	 * -------------------------------- */
	function modify_read_more_link() {
		return '<a class="more-link" href="' . get_permalink() . '">Continue reading &rsaquo;</a>';
	}
	add_filter( 'the_content_more_link', 'modify_read_more_link' );


	/* --------------------------------
	 * Get latest blog posts
	 * -------------------------------- */
    function latest_post() {

        $args = array(
            'posts_per_page' => 3,
            'offset' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                <p>📓&nbsp;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?> &rsaquo;</a></p>
                <?php
            endwhile;
        endif;
    }

    add_shortcode('the-latest-posts', 'latest_post');

	/* --------------------------------
	 * Password protect page
	 * -------------------------------- */
	function my_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<div id="contact" class="password-form subscribe"><div id="mc_embed_signup"><p>The content on this page is intentionally hidden as the design project may still be in development or undergoing major updates.</p><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "" ) . '
		<label for="' . $label . '">' . __( "" ) . ' </label><input name="post_password" placeholder="Enter password to access this content page" id="' . $label . '" type="password" size="20" maxlength="20" /><button class="button" name="Submit" value="' . esc_attr__( "Submit" ) . '" />Access Content</button>
    		</form></div></div>
    	';
    	return $o;
	}
	add_filter( 'the_password_form', 'my_password_form' );
	
	
	/* --------------------------------
	 * Clean up protected / private titles
	 * -------------------------------- */
	function the_title_trim($title) {
	    $title = attribute_escape($title);
	    $findthese = array(
		    '#Protected:#',
		    '#Private:#'
	    );
	    $replacewith = array(
		    '', // What to replace "Protected:" with
		    '' // What to replace "Private:" with
	    );
	    $title = preg_replace($findthese, $replacewith, $title);
	    return $title;
    }
    add_filter('the_title', 'the_title_trim');
	
		
	/* --------------------------------
	 * Pre-select post specific attachments
	 * -------------------------------- */
	
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