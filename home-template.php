<?php
/*
Template Name: Home
*/
get_header(); ?>
<!--<section class="slider">-->
<!--    <div class="container">-->
<!--        --><?php
//        $args = array(
//            'post_type' => 'slides'
//        );
//        $the_query = new WP_Query($args);
//        if ( have_posts() ):?>
<!--            <div class="owl-carousel owl-theme owl-loaded owl-drag">-->
<!--                --><?php //while ( have_posts() ) : the_post(); ?>
<!--                    <div class="item">-->
<!--                        <h4> --><?php //the_title(); ?><!--</h4>-->
<!--                        <div class="content">-->
<!--                            --><?php //the_content(); ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endwhile; ?>
<!--            </div>-->
<!--        --><?php //endif; wp_reset_postdata(); ?>
<!--    </div>-->
<!--</section>-->

<section class="about">
    <div class="container">
        <?php
        $the_slug = 'about-us-section';
        $args = array(
//          'name'           => $the_slug,
            'post_type'      => 'about-us',
            'post_status'    => 'publish',
            'posts_per_page' => 1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="title col-xs-6">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <p class="title-line">Our Short Story</p>
                </div>
                <div class="content col-xs-6">
                    <?php the_excerpt(); ?>
                    <div class="about-btn-area start-xs">
                        <a href="<?php the_permalink(); ?>" class="button button-default" data-text="Read more"><span>read more</span></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="title col-xs-12">
            <h2>Services</h2>
            <p class="title-line">What we are doing</p>
        </div>
        <?php
        $query = new WP_Query( array('post_type' => 'services-reviews', 'posts_per_page' => 100 ) );
        if ($query->have_posts()):?>
            <ul class="wc-table">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="col-xs-6 col-xs-12" <?php
                    if ( $thumbnail_id = get_post_thumbnail_id() ) {
                        if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'normal-bg' ) )
                            printf( ' style="background:  url(%s) no-repeat;"', $image_src[0] ); } ?>>
                        <div class="service-content">
                            <h3><?php the_title(); ?></h3>
                            <div class="description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; wp_reset_postdata(); ?>
        <div class="about-btn-area start-xs">
            <a href="<?php the_permalink(); ?>" class="button button-default" data-text="View more"><span>View more</span></a>
        </div>
    </div>
</section>

<section class="clients">
    <div class="container">
        <div class="title col-xs-12">
            <h2>Clients</h2>
            <p class="title-line">Whats our client says</p>
        </div>
        <div class="slider">
            <?php echo do_shortcode('[wonderplugin_carousel id="1"]'); ?>
        </div>
    </div>
</section>

<section class="news">
    <div class="container">
        <div class="title col-xs-12">
            <h2>News</h2>
            <p class="title-line">From Our Blog</p>
        </div>
        <?php
        query_posts('p=88');
        while ( have_posts() ) : the_post(); ?>
            <div class="news-content col-xs-12">
                <div class="for-news col-xs-6">
                    <div class="img-wrap">
                        <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                    </div>
                    <h3 class="tittle">
                        <?php the_title(); ?>
                    </h3>
                    <?php the_content(); ?>
                </div>
                <div class="heading col-xs-6">
                    <?php
                    $n=2;
                    $recent = new WP_Query('showposts=$n');
                    while($recent->have_posts()) : $recent->the_post();
                        ?>
                        <article class="featured">
                            <h2>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="info">
                                <div class="date start-xs">
                                    <span><?php the_time( 'F j, Y ' ); ?></span>
                                </div>
                            </div>
                            <?php the_excerpt(); ?>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div class="about-btn-area start-xs">
                    <a href="<?php the_permalink(); ?>" class="button button-default" data-text="View more"><span>View more</span></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="partners">
    <div class="container">
        <div class="partners-slider">
            <div class="title col-xs-12">
                <h2>Partners</h2>
                <p class="title-line">Our Great Partners</p>
            </div>
            <?php echo do_shortcode('[wonderplugin_carousel id="2"]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
