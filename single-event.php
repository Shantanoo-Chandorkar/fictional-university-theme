<?php
/**
 * The custom post type - event single template file.
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
                $about_us_link = '<a class="metabox__blog-home-link" href="' . esc_url( get_post_type_archive_link( 'event' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i> ' . esc_html__( 'Event Home', 'fictional-university-theme' ) . '</a>';
                echo wp_kses_post( $about_us_link );
                ?>
                <span class="metabox__main">
                    <?php esc_html( the_title() ); ?>
                </span>
            </p>
        </div>

        <div class="generic-content"><?php the_content(); ?></div>

        <?php
        $related_programs = get_field( 'related_programs' );

        if ( $related_programs ) {
            echo wp_kses_post( '<hr class="section-break">' );
            echo wp_kses_post( '<h2 class="headline headline--medium">' . esc_html__( 'Related Program(s)', 'fictional-university-theme' ) . '</h2>' );
            echo wp_kses_post( '<ul class="link-list min-list">' );
            foreach ( $related_programs as $program ) {
                ?>
                <li>
                    <a href="<?php echo esc_url( get_the_permalink( $program ) ); ?>">
                        <?php echo esc_html( get_the_title( $program ) ); ?>
                    </a>
                </li>
                <?php
            }
        }
        echo wp_kses_post( '</ul>' );
        ?>
    </div>

    <?php
}

get_footer();
