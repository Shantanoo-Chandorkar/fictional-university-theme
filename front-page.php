<?php
/**
 * The front page template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

use Fictional_University_DBHelper\DbHelper;

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/library-hero.jpg' ) ); ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">
            <?php
                esc_html_e( 'Welcome!', 'fictional-university-theme' );
            ?>
        </h1>
        <?php
            $custom_html = '
                <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
                <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
                <a href="' . get_post_type_archive_link( 'program' ) . '" class="btn btn--large btn--blue">Find Your Major</a>
            ';

            echo wp_kses_post( $custom_html );
        ?>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">
                <?php
                    esc_html_e( 'Upcoming Events', 'fictional-university-theme' );
                ?>
            </h2>

            <?php
            $homepage_events = DbHelper::get_homepage_events_for_front_page();

            while ( $homepage_events->have_posts() ) {
                $homepage_events->the_post();

                get_template_part( 'template-parts/content', 'event' );
            }
            wp_reset_postdata();
            ?>
            <p class="t-center no-margin"><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="btn btn--blue">
                <?php esc_html_e( 'View All Events', 'fictional-university-theme' ); ?>
            </a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php

            $homepage_posts = DBHelper::get_homepage_posts_for_front_page();

            while ( $homepage_posts->have_posts() ) {
                    $homepage_posts->the_post();
                ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <span class="event-summary__month"><?php echo esc_html( get_the_time( 'M' ) ); ?></span>
                            <span class="event-summary__day"><?php echo esc_html( get_the_time( 'j' ) ); ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
                            <p>
                            <?php
                            if ( has_excerpt() ) {
                                echo esc_html( get_the_excerpt() );
                            } else {
                                echo esc_html( wp_trim_words( get_the_content(), 18 ) );
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                <?php
            }
            wp_reset_postdata();
            ?>
            <p class="t-center no-margin"><a href="<?php echo esc_url( site_url( '/blog' ) ); ?>" class="btn btn--yellow"><?php esc_html_e( 'View All Blog Posts', 'fictional-university-theme' ); ?></a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/bus.jpg' ) ); ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center"><?php esc_html_e( 'Free Transportation', 'fictional-university-theme' ); ?></h2>
                        <p class="t-center"><?php esc_html_e( 'All students have free unlimited bus fare.', 'fictional-university-theme' ); ?></p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university-theme' ); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( 'images/apples.jpg' ) ); ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center"><?php esc_html_e( 'An Apple a Day', 'fictional-university-theme' ); ?></h2>
                        <p class="t-center"><?php esc_html_e( 'Our dentistry program recommends eating apples.', 'fictional-university-theme' ); ?></p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university-theme' ); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/bread.jpg' ) ); ?>);">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center"><?php esc_html_e( 'Free Food', 'fictional-university-theme' ); ?></h2>
                        <p class="t-center"><?php esc_html_e( 'Fictional University offers lunch plans for those in need.', 'fictional-university-theme' ); ?></p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php esc_html_e( 'Learn more', 'fictional-university-theme' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>

<?php
get_footer();
