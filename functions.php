<?php
/**
 * The functions file to contain theme setup and custom functions.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

define( 'FICTIONAL_UNIVERSITY_THEME_VERSION', '1.0.0' );
define( 'FICTIONAL_UNIVERSITY_THEME_DIR', get_template_directory() );

require get_theme_file_path( '/inc/search-route.php' );

/**
 * Custom REST API fields for posts.
 *
 * This function registers a custom field 'authorName' for the 'post' post type.
 *
 * @since 1.0.0
 * @return void
 */
function university_custom_rest() {
    register_rest_field(
        'post',
        'authorName',
        array(
            'get_callback' => function () {
                return get_the_author();
            },
        )
    );
}

add_action( 'rest_api_init', 'university_custom_rest' );

/**
 * Page banner function.
 *
 * This function outputs the page banner with a background image and title.
 *
 * @param array $args Optional arguments for the page banner.
 *
 * @since 1.0.0
 * @return void
 */
function page_banner( $args = null ): void {
    if ( ! isset( $args['title'] ) ) {
        $args['title'] = get_the_title();
    }
    if ( ! isset( $args['subtitle'] ) ) {
        $args['subtitle'] = get_field( 'page_banner_subtitle' );
    }
    if ( ! isset( $args['background_image'] ) ) {
        if ( get_field( 'page_banner_background_image' ) && ! is_archive() && ! is_home() ) {
            $args['background_image'] = get_field( 'page_banner_background_image' )['sizes']['pageBanner'];
        } else {
            $args['background_image'] = get_theme_file_uri( '/images/ocean.jpg' );
        }
    }
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( $args['background_image'] ); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
            <div class="page-banner__intro">
                <p><?php echo wp_kses_post( $args['subtitle'] ); ?></p>
            </div>
        </div>
    </div>

    <?php
}

/**
 * Enqueue theme styles and scripts.
 *
 * This function is hooked to 'wp_enqueue_scripts' to ensure that styles and scripts are loaded properly.
 *
 * @since 1.0.0
 * @return void
 */
function load_fictional_university_assets(): void {
    wp_enqueue_style(
        'fictional-university-style',
        get_theme_file_uri( '/build/style-index.css' ),
        array(),
        FICTIONAL_UNIVERSITY_THEME_VERSION,
    );

    wp_enqueue_style(
        'fictional-university-extra-style',
        get_theme_file_uri( '/build/index.css' ),
        array(),
        FICTIONAL_UNIVERSITY_THEME_VERSION,
    );

    wp_enqueue_style(
        'font-awesome',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        array(),
        FICTIONAL_UNIVERSITY_THEME_VERSION,
    );

    wp_enqueue_style(
        'custom-google-fonts',
        '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i',
        array(),
        FICTIONAL_UNIVERSITY_THEME_VERSION,
    );

    wp_enqueue_script(
        'fictional-university-scripts',
        get_theme_file_uri( '/build/index.js' ),
        array( 'jquery' ),
        FICTIONAL_UNIVERSITY_THEME_VERSION,
        true
    );

    wp_localize_script(
        'fictional-university-scripts',
        'universityData',
        array(
	    	'root_url' => get_site_url(),
	    	'nonce'    => wp_create_nonce( 'wp_rest' ),
        )
    );
}

add_action( 'wp_enqueue_scripts', 'load_fictional_university_assets' );

/**
 * Theme setup function.
 *
 * This function adds theme support for various features and registers navigation menus.
 *
 * @since 1.0.0
 * @return void
 */
function university_features(): void {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'professorLandscape', 400, 260, true );
    add_image_size( 'professorPortrait', 480, 650, true );
    add_image_size( 'pageBanner', 1500, 350, true );
    register_nav_menu( 'header_menu_location', 'Header Menu Location' );
    register_nav_menu( 'footer_menu_location_one', 'Footer Menu Location 1' );
    register_nav_menu( 'footer_menu_location_two', 'Footer Menu Location 2' );
}

add_action( 'after_setup_theme', 'university_features' );

/**
 * Custom query for events.
 *
 * This function modifies the main query to filter events based on specific criteria.
 *
 * @param WP_Query $query The current query object.
 *
 * @since 1.0.0
 * @return void
 */
function university_event_queries( $query ): void {
    if ( ! is_admin() && is_post_type_archive( 'campus' ) && $query->is_main_query() ) {
        $query->set( 'posts_per_page', -1 );
    }

    if ( ! is_admin() && is_post_type_archive( 'program' ) && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', -1 );
    }

    if ( ! is_admin() && $query->is_main_query() && ( is_post_type_archive( 'event' ) || is_page( 'events' ) ) ) {
        $today = gmdate( 'Ymd' );
        $query->set( 'posts_per_page', -1 );
        $query->set( 'post_type', 'event' );
        $query->set( 'meta_key', 'event_date' );
        $query->set( 'orderby', 'meta_value_num' );
        $query->set( 'order', 'ASC' );
        $query->set(
            'meta_query',
            array(
                array(
                    'key'     => 'event_date',
                    'compare' => '>=',
                    'value'   => $today,
                    'type'    => 'DATE',
                ),
            )
        );
    }
}

add_action( 'pre_get_posts', 'university_event_queries' );
