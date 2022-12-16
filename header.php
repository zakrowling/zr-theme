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

<title><?php if( !is_front_page() ) { ?><?php wp_title('&mdash;', true, 'right'); ?> <?php bloginfo('name'); ?><?php } else { ?><?php bloginfo('name'); ?> &mdash; <?php bloginfo('description'); ?><?php } ?></title>


<?php
	$meta_description = get_bloginfo('description');
	if (is_single() || is_page() ) : if (have_posts() ) : while (have_posts() ) : the_post();
	    $page_excerpt = strip_tags(get_the_excerpt());
	    if (!empty($page_excerpt)) {
		$meta_description = $page_excerpt;
	    }
?>
<?php if( !is_front_page() ) { ?>
	<meta name="description" content="<?php echo $meta_description ?>">
<?php } else { ?>
	<meta name="description" content="Zak Rowling is a digital product and experience designer working in Brisbane and the Gold Coast.">
<?php } ?>

<?php endwhile; endif; ?>
<?php endif; ?>

<meta name="viewport" content="width=device-width, initial-scale=0.8” />
<meta name="google-site-verification" content="3PEHVdP3L0jA-xYbC_QStT3SMz3OtMbVinT0jVZr3AI" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="robots" content="index,follow">
<meta property="og:type" content="Website" />
<meta property="og:url" content="https://www.zakrowling.com" />
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/work/ux-feedback-mobile.jpg" />
<meta property="og:site_name" content="Zak Rowling - Digital Product and Experience Designer" />
<meta property="og:title" content="Zak Rowling - Digital Product and Experience Designer" />


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen,projection" /> 
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive/base.css" type="text/css" media="screen,projection" /> 

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v3" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive/media-queries.css?v2" type="text/css" media="screen,projection" />

<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Jost:400,500,700" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/smoke.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/common.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/chat.js" type="text/javascript"></script>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />

<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-N2QQW8L':true});</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-59754842-1', 'auto');
  ga('require', 'GTM-N2QQW8L');
  ga('send', 'pageview');
</script>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "e7ua85ax11");
</script>

<!-- Hotjar Tracking Code for www.zakrowling.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:438668,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
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
		
		<h1 class="logo mobile-none"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">Zak Rowling</a></h1>
		
		<div id="header-i">
			<ul id="header_menu" class="<?php echo $active_item ?>">
			<?php wp_nav_menu( array( 'menu' => 'Header Menu', 'depth' => 1 ) ); ?>	
			</ul>
															
			<div id="footer" class="mobile-none">
				<div class="social">
					<a title="LinkedIn" href="https://au.linkedin.com/in/zakrowling" target="_blank"><img width="30" src="<?php bloginfo('template_url'); ?>/images/icons/linkedin.png" alt="LI" /></a>
					<a title="Instagram" href="http://www.instagram.com/zakrowling" target="_blank"><img width="30" src="<?php bloginfo('template_url'); ?>/images/icons/instagram.png" alt="IG" /></a>
                    <a title="Dribbble" href="http://www.dribbble.com/zakrowling" target="_blank"><img width="30" src="<?php bloginfo('template_url'); ?>/images/icons/dribbble.png" alt="DR" /></a>
				</div><!--social-->	
			</div><!--footer-->
			
		</div><!--header-i-->
			
	</div><!--header-->