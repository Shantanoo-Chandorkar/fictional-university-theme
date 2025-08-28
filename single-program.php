<?php
/**
 * The custom post type - program single template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

use Fictional_University_DBHelper\DbHelper;

get_header();

page_banner(
    array(
        'title' => get_the_title(),
    )
);

while ( have_posts() ) {
    the_post(); ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <?php
                $about_us_link = '<a class="metabox__blog-home-link" href="' . esc_url( get_post_type_archive_link( 'program' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i> ' . esc_html__( 'All Programs', 'fictional-university-theme' ) . '</a>';
                echo wp_kses_post( $about_us_link );
                ?>
                <span class="metabox__main">
                    <?php esc_html( the_title() ); ?>
                </span>
            </p>
        </div>

        <div class="generic-content"><?php the_content(); ?></div>

        <?php

        $related_professors = DbHelper::get_related_professors_for_single_program();

        if ( $related_professors->have_posts() ) {
            $upcoming_events_title_markup = '<hr class="section-break">
            <h2 class="headline headline--medium">
                ' . esc_html( get_the_title() . ' Professors' ) . '
            </h2>';

            echo wp_kses_post( $upcoming_events_title_markup );

            echo wp_kses_post( '<ul class="professor-cards">' );

            while ( $related_professors->have_posts() ) {
                $related_professors->the_post();
                ?>
                    <li class="professor-card__list-item">
                        <a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <img class="professor-card__image" src="<?php echo esc_url( the_post_thumbnail_url( 'professorLandscape' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                            <span class="professor-card__name"><?php echo esc_html( get_the_title() ); ?></span>
                        </a>
                    </li>
                <?php
            }

            echo wp_kses_post( '</ul>' );

            wp_reset_postdata();
        }

        $homepage_events = DbHelper::get_homepage_events_for_single_program();

        if ( $homepage_events->have_posts() ) {
                $upcoming_events_markup = '<hr class="section-break">
                <h2 class="headline headline--medium">
                    ' . esc_html( 'Upcoming ' . get_the_title() . ' Events' ) . '
                </h2>';

            echo wp_kses_post( $upcoming_events_markup );
            while ( $homepage_events->have_posts() ) {
                    $homepage_events->the_post();

                get_template_part( 'template-parts/content', 'event' );
            }

            wp_reset_postdata();
        }
        ?>

    </div>

    <?php
}

get_footer();
