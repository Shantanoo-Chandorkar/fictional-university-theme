<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

get_header();

page_banner(
    array(
        'title'    => __( 'Welcome to our blog', 'fictional-university-theme' ),
        'subtitle' => __( 'Keep up with our latest news', 'fictional-university-theme' ),
    )
);
?>

<div class="container container--narrow page-section">
    <?php
    while ( have_posts() ) {
        the_post();
        ?>
        <div class="post-item">
            <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
            <div class="metabox">
                <p>
                    <?php esc_html_e( 'Posted By', 'fictional-university-theme' ); ?> <?php echo wp_kses_post( get_the_author_posts_link() ); ?> <?php esc_html_e( 'on', 'fictional-university-theme' ); ?> <?php echo esc_html( get_the_time( 'M j, Y' ) ); ?>
                    <?php esc_html_e( 'in', 'fictional-university-theme' ); ?> <?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?>
                </p>
            </div>
            <div class="generic-content">
                <?php the_excerpt(); ?>
                <p><a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn--blue"><?php esc_html_e( 'Continue Reading', 'fictional-university-theme' ); ?> &raquo;</a></p>
            </div>
        </div>
        <?php
    }
    echo esc_html( paginate_links() );

    ?>
</div>

<?php
get_footer();
