<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business-plus
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="posts row col-sm-12">
					<div class="title col-xs-12">
						<h2>Blog page</h2>
						<p>Our featured Post</p>
					</div>
					<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<article class="post col-xs-12">
						    <div class="author-img col-xs-2 center-xs">
								<?php $author_email = get_the_author_email();
								echo get_avatar($author_email, 'full'); ?>
						    </div>
							<div class="post-content col-xs-8">
								<h2>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="info">
									<div class="date start-xs">
										<span>Posted by: <?php the_author(); ?>,</span>
										<span><?php the_time('F-j-Y '); ?></span>
								  	</div>
								</div>
								<div class="img-wrap">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('full', 'class=img-responsive'); ?>
									</a>
								</div>
								<?php the_excerpt(); ?>
								<div class="for-user row middle-xs">
								    <div class="about-btn-area">
									    <a href="<?php the_permalink(); ?>" class="button button-default" data-text="Read more"><span>read more</span></a>
								    </div>
								</div>
						    </div>
						</article>
					<?php endwhile; ?>
					<?php else: ?>
					<p>No posts found</p>
					<?php endif; ?>
					<?php the_posts_pagination(['mid_size' => 1]);?>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();
