<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-plus
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<div class="main-footer">
					<h1>
						<?php the_custom_logo(); ?>
					</h1>
					<div class="footer-nav">
						<h2>Navigation</h2>
						<?php wp_nav_menu(['theme_location' => 'foot-nav', 'menu_class' => 'nav nav-pills']); ?>
					</div>
					<?php $recent = new WP_Query("pagename=footer-form"); while($recent->have_posts()) : $recent->the_post();?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
