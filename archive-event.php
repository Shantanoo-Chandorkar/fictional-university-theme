<?php
/**
 * The custom post type - Event archive template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

get_header();

page_banner(
    array(
        'title'    => __( 'All Events', 'fictional-university-theme' ),
        'subtitle' => __( 'See what is going on in our world!', 'fictional-university-theme' ),
    )
);
?>

<div class="container container--narrow page-section">
    <?php
    while ( have_posts() ) {
        the_post();

        get_template_part( 'template-parts/content', 'event' );
    }
    echo esc_html( paginate_links() );

    ?>

    <hr class="section-break">
    <p>
        <?php
        esc_html_e( 'Looking for past events? ', 'fictional-university-theme' );
        echo '<a href="' . esc_url( site_url( '/past-events' ) ) . '">' . esc_html( 'Check out our past events' ) . '</a>';
        ?>
    </p>
</div>

<?php
get_footer();
