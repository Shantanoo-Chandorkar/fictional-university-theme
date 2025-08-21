<?php
/**
 * The single page template file.
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
            'title'            => 'Deemed! Not Doomed',
            'subtitle'         => 'Welcome to the modern era of University',
            'background_image' => 'https://plus.unsplash.com/premium_photo-1683865776032-07bf70b0add1?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        )
    );
    ?>

    <div class="container container--narrow page-section">
        <?php
            $the_parent = wp_get_post_parent_id( get_the_ID() );
        if ( $the_parent ) {
            ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <?php
                        $about_us_link = '<a class="metabox__blog-home-link" href="' . get_permalink( $the_parent ) . '"><i class="fa fa-home" aria-hidden="true"></i> ' . esc_html__( 'Back to', 'fictional-university-theme' ) . ' ' . esc_html( get_the_title( $the_parent ) ) . '</a>';
                        echo wp_kses_post( $about_us_link );
                        ?>
                        <span class="metabox__main"><?php echo esc_html( get_the_title() ); ?></span>
                    </p>
                </div>
            <?php
        }
        ?>

        <?php
            $pages_array = get_pages(
                array(
                    'child_of'    => get_the_ID(),
                    'sort_column' => 'menu_order',
                )
            );
        if ( $the_parent || $pages_array ) {
            ?>
                <div class="page-links">
                    <h2 class="page-links__title"><a href="<?php echo esc_url( get_permalink( $the_parent ) ); ?>"><?php echo esc_html( get_the_title( $the_parent ) ); ?></a></h2>
                    <ul class="min-list">
                        <?php
                            wp_list_pages(
                                array(
                                    'title_li'    => null,
                                    'child_of'    => $the_parent ? $the_parent : get_the_ID(),
                                    'sort_column' => 'menu_order',
                                )
                            );
                        ?>
                    </ul>
                </div>
            <?php
        }
        ?>

        <div class="generic-content">
            <?php
            the_content();
            ?>
        </div>
    </div>

    <?php
}

get_footer();
