<?php
/**
 * The custom post type - Program archive template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

get_header();

page_banner(
    array(
        'title'    => __( 'All Programs', 'fictional-university-theme' ),
        'subtitle' => __( 'There is something for everyone. Have a look around!', 'fictional-university-theme' ),
    )
)
?>

<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php
        while ( have_posts() ) {
            the_post();
            ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
        }
        echo esc_html( paginate_links() );
        ?>
    </ul>
</div>

<?php
get_footer();
