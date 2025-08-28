<?php
/**
 * This file is responsible for the Database functionality.
 *
 * @package Fictional_University_DBHelper
 */

namespace Fictional_University_DBHelper;

use WP_Query;

/**
 * Databse Helper class that contains the DB queries
 *
 * @since 1.0.0
 * @package Fictional_University_DBHelper
 */
class DbHelper {

    /**
     * Fetch the Homepage Events for the front page
     *
     * @since 1.0.0
     * @return \WP_Query
     */
    public static function get_homepage_events_for_front_page() {
        $today           = gmdate( 'Ymd' );
        $homepage_events = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type'      => 'event',
                'meta_key'       => 'event_date',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'event_date',
                        'compare' => '>=',
                        'value'   => $today,
                        'type'    => 'DATE',
                    ),
                ),
            )
        );

        return $homepage_events;
    }

    /**
     * Fetch the Homepage Post for the front page
     *
     * @since 1.0.0
     * @return \WP_Query
     */
    public static function get_homepage_posts_for_front_page() {
        $homepage_posts = new WP_Query(
            array(
                'posts_per_page' => 2,
                'post_type'      => 'post',
            )
        );

        return $homepage_posts;
    }

    /**
     * Fetch the Past Events for Past Events Page
     *
     * @since 1.0.0
     * @return \WP_Query
     */
    public static function get_past_events_for_past_events_page() {
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

        return $past_events_query;
    }

    /**
     * Fetch Related Professors for the Single Program
     *
     * @since 1.0.0
     * @return \WP_Query
     */
    public static function get_related_professors_for_single_program() {
        $related_professors = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type'      => 'professor',
                'orderby'        => 'title',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'related_programs',
                        'compare' => 'LIKE',
                        'value'   => '"' . get_the_ID() . '"',
                    ),
                ),
            )
        );

        return $related_professors;
    }

    /**
     * Fetch Homepage Events for the Single Program
     *
     * @since 1.0.0
     * @return \WP_Query
     */
    public static function get_homepage_events_for_single_program() {
        $today = gmdate( 'Ymd' );

        $homepage_events = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type'      => 'event',
                'meta_key'       => 'event_date',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'event_date',
                        'compare' => '>=',
                        'value'   => $today,
                        'type'    => 'DATE',
                    ),
                    array(
                        'key'     => 'related_programs',
                        'compare' => 'LIKE',
                        'value'   => '"' . get_the_ID() . '"',
                    ),
                ),
            )
        );
        return $homepage_events;
    }
}
