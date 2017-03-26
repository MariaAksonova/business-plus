<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business-plus
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="content col-xs-12">
				<div class="container">
					<div class="posts row col-sm-12">
						<div class="title col-xs-12">
							<h2>Blog post</h2>
							<p>Our featured Post</p>
						</div>
						<?php query_posts($query_string . '&cat=-3, -5, -6'); ?>
						<?php if (have_posts()):
							while (have_posts()): the_post(); ?>
								<article class="post post-single col-xs-12">
									<div class="author-img col-xs-2 center-xs">
										<?php $author_email = get_the_author_email(); echo get_avatar($author_email, 'full');?>
									</div>
									<div class="post-content col-xs-8">
										<h2>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<div class="info">
											<div class="date start-xs">
                                    <span>By
										<?php the_author(); ?> /
                                    </span>
												<span><?php the_time( 'F j, Y ' ); ?></span>
											</div>
										</div>
										<div class="img-wrap">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('full', 'class=img-responsive'); ?>
											</a>
										</div>
										<?php the_content(); ?>
									</div>
									<?php comments_template(); ?>
								</article>
							<?php endwhile; ?>

						<?php else: ?>
							<p>No posts found</p>
						<?php endif; ?>
					</div>
				</div>
			</section>

		</main>
	</div>
<?php
get_footer();
