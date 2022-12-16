<?php wp_footer(); ?>
    <?php if (!is_front_page()) { ?>
	<?php if (!is_page('About')) { ?>
	<div id="website_footer">
      <div class="footer-content">
        <div class="work_menu">
           <h3>Work case studies</h3>
           <ul class="clearfix">
              <?php wp_nav_menu( array( 'menu' => 'Work Menu', 'depth' => 1 ) ); ?>
           </ul>
        </div><!--work_menu-->
        <div class="blog_menu">
            <h3>Latest blog posts</h3>
            <?php echo do_shortcode('[the-latest-posts]'); ?>
        </div>
        <div class="contact-info">
           <h3>Let’s work together</h3>
           <p>📮&nbsp;&nbsp;<a href="mailto:hello@zakrowling.com">hello@zakrowling.com</a></p>
           <p>👔&nbsp;&nbsp;<a href="https://www.linkedin.com/in/zakrowling" target="_blank" rel="noopener">Let's connect on LinkedIn</a></p>
           <p>🖖🏼&nbsp;&nbsp;<a href="https://linktr.ee/zakrowling" target="_blank" rel="noopener">Say hi elsewhere</a></p>
        </div><!--contact-info-->
      </div><!--footer-content-->
    </div><!--website_footer-->
    <?php } ?>
    <?php } ?>
</body>
</html>