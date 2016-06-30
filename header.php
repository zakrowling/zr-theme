<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
	$homeClass = '';
	if( is_home() ) {
		$homeClass = ' home';
	}
	$meta_content = the_content();
?>

<title><?php if( !is_front_page() ) { ?><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?><?php } else { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } ?></title>

<meta name="description" content="UI / Interaction / UX Designer, Brisbane" />

<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=0.8, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="robots" content="index,follow">

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen,projection" /> 
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive/base.css" type="text/css" media="screen,projection" /> 

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive/media-queries.css" type="text/css" media="screen,projection" />

<link href="http://fonts.googleapis.com/css?family=Halant" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Poppins:300,600" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js" type="text/javascript"></script>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59754842-1', 'auto');
  ga('send', 'pageview');

</script>


<?php wp_head(); ?>

</head>

<?php
	$homeClass = '';
	if( is_front_page() ) {
		$homeClass = ' class="home"';
	}
?>

<body<?php echo $homeClass ?>>
	
	<div id="header">
		
		<h1 class="logo mobile-none"><a href="<?php bloginfo('url'); ?>">Zak Rowling</a></h1>
		
		<div id="header-i">

			<?php
				$active_item = 'work';
				if (strpos($_SERVER['REQUEST_URI'], 'about') !== false){
					$active_item = 'about';
				}
			?>

			<ul id="header_menu" class="<?php echo $active_item ?>">
				<li><a href="<?php echo site_url(); ?>" class="menu-item">Home</a></li>
				<li><a href="about-resume" class="menu-item about">About</a></li>
				<li><a href="javascript:;" id="show_main_menu" class="menu-item work">Work</a></li>
			</ul>

			<ul id="main_menu" class="mobile-none clearfix">
				<?php wp_list_pages('sort_column=menu_order&depth=2&exclude=17,19&title_li='); ?>
			</ul>
							
								
			<div id="footer" class="mobile-none">
			
				<div class="social">
					<a href="mailto:zakrowling@gmail.com"><img width="40" src="<?php bloginfo('template_url'); ?>/images/icons/email.png" alt="EM" /></a>
					<a href="https://au.linkedin.com/in/zakrowling" target="_blank"><img width="40" src="<?php bloginfo('template_url'); ?>/images/icons/linkedin.png" alt="LI" /></a>
					<a href="http://www.instagram.com/zakrowling" target="_blank"><img width="40" src="<?php bloginfo('template_url'); ?>/images/icons/instagram.png" alt="IG" /></a>
					<!--<a href="http://www.soundcloud.com/weakling" target="_blank"><img width="40" src="<?php bloginfo('template_url'); ?>/images/icons/soundcloud.png" alt="SC" /></a>-->
				</div><!--social-->
				
			</div><!--footer-->
			
		</div><!--header-i-->
			
	</div><!--header-->