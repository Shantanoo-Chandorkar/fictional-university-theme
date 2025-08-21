<?php
/**
 * The custom post type - Professor single template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

get_header();

while ( have_posts() ) {
    the_post();

    page_banner(
        array(
            'title'            => 'Mentorship in Action',
            'subtitle'         => 'Meet our dedicated professors',
            'background_image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        )
    );
    ?>

    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail( 'professorPortrait' ); ?>
                </div>

                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php
        $related_programs = get_field( 'related_programs' );

        if ( $related_programs ) {
            $professors_title_markup = '<hr class="section-break">
            <h2 class="headline headline--medium">
                ' . esc_html__( 'Subject Taught(s)', 'fictional-university-theme' ) . '
            </h2>';

            echo wp_kses_post( $professors_title_markup );

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
