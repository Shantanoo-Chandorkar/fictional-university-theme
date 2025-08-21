<?php
/**
 * The custom post type - Past Event archive template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

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
    $today             = gmdate( 'Ymd' );
    $past_events_query = new WP_Query(
        array(
            'paged'          => get_query_var( 'paged', 1 ),
            'post_type'      => 'event',
            'posts_per_page' => 1,
            'meta_key'       => 'event_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'compare' => '<',
                    'value'   => $today,
                    'type'    => 'DATE',
                ),
            ),
        )
    );
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
