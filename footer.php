<?php
/**
 * The header template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

?>

<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?php echo esc_url( site_url() ); ?>"><strong><?php esc_html_e( 'Fictional', 'fictional-university-theme' ); ?></strong> <?php esc_html_e( 'University', 'fictional-university-theme' ); ?></a>
                </h1>
                <p><a class="site-footer__link" href="#"><?php esc_html_e( '555.555.5555', 'fictional-university-theme' ); ?></a></p>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">
                    <h3 class="headline headline--small"><?php esc_html_e( 'Explore', 'fictional-university-theme' ); ?></h3>
                    <nav class="nav-list">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer_menu_location_one',
                                )
                            );
                            ?>
                        <!-- <ul>
                            <li><a href="<?php echo esc_url( site_url( '/about-us' ) ); ?>"><?php esc_html_e( 'About Us', 'fictional-university-theme' ); ?></a></li>
                            <li><a href="<?php echo esc_url( site_url( '/programs' ) ); ?>"><?php esc_html_e( 'Programs', 'fictional-university-theme' ); ?></a></li>
                            <li><a href="<?php echo esc_url( site_url( '/evevnts' ) ); ?>"><?php esc_html_e( 'Events', 'fictional-university-theme' ); ?></a></li>
                            <li><a href="<?php echo esc_url( site_url( '/campuses' ) ); ?>"><?php esc_html_e( 'Campuses', 'fictional-university-theme' ); ?></a></li>
                        </ul> -->
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small"><?php esc_html_e( 'Learn', 'fictional-university-theme' ); ?></h3>
                    <nav class="nav-list">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer_menu_location_two',
                                )
                            );
                            ?>
                        <!-- <ul>
                            <li><a href="#"><?php esc_html_e( 'Legal', 'fictional-university-theme' ); ?></a></li>
                            <li><a href="<?php echo esc_url( site_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy', 'fictional-university-theme' ); ?></a></li>
                            <li><a href="#"><?php esc_html_e( 'Careers', 'fictional-university-theme' ); ?></a></li>
                        </ul> -->
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small"><?php esc_html_e( 'Connect With Us', 'fictional-university-theme' ); ?></h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
