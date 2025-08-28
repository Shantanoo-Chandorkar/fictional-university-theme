<?php
/**
 * The custom post type - Past Event archive template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

use Fictional_University_DBHelper\DbHelper;

get_header();

page_banner(
    array(
        'title'    => __( 'Past Events', 'fictional-university-theme' ),
        'subtitle' => __( 'Recap of our awesome past events', 'fictional-university-theme' ),
    )
);


?>

<div class="container container--narrow page-section">
    <?php
    $past_events_query = DbHelper::get_past_events_for_past_events_page();

    while ( $past_events_query->have_posts() ) {
        $past_events_query->the_post();

        get_template_part( 'template-parts/content', 'event' );
    }

    wp_reset_postdata();

    echo wp_kses_post(
        paginate_links(
            array(
                'total' => $past_events_query->max_num_pages,
            )
        )
    );

    ?>
</div>

<?php
get_footer();
