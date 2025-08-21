<?php
/**
 * The single post template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

get_header();

page_banner();

while ( have_posts() ) {
    the_post(); ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <?php
                $about_us_link = '<a class="metabox__blog-home-link" href="' . esc_url( site_url( '/blog' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i> ' . esc_html__( 'Blog Home', 'fictional-university-theme' ) . '</a>';
                echo wp_kses_post( $about_us_link );
                ?>
                <span class="metabox__main">
                    <?php esc_html_e( 'Posted By', 'fictional-university-theme' ); ?> <?php echo wp_kses_post( get_the_author_posts_link() ); ?> <?php esc_html_e( 'on', 'fictional-university-theme' ); ?> <?php echo esc_html( get_the_time( 'M j, Y' ) ); ?>
                    <?php esc_html_e( 'in', 'fictional-university-theme' ); ?> <?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?>
                </span>
            </p>
        </div>

        <div class="generic-content"><?php the_content(); ?></div>
    </div>

    <?php
}

get_footer();
