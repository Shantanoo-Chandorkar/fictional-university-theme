<?php
/**
 * The header template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fictional_University
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="site-header">
            <div class="container">
                <h1 class="school-logo-text float-left">
                <a href="<?php echo esc_url( site_url() ); ?>">
                    <strong>
                        <?php
                        esc_html_e(
                            'Fictional',
                            'fictional-university-theme'
                        );
                        ?>
                    </strong> 
                    <?php
                        esc_html_e(
                            'University',
                            'fictional-university-theme'
                        );
                        ?>
                </a>
                </h1>
                <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
                <div class="site-header__menu group">
                <nav class="main-navigation">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header_menu_location',
                            )
                        );
                        ?>
                    <!-- <ul>
                    <li><a href="<?php echo esc_url( site_url( '/about-us' ) ); ?>">
                        <?php
                            esc_html_e(
                                'About Us',
                                'fictional-university-theme'
                            );
                            ?>
                        </a></li>
                    <li <?php echo get_post_type() === 'program' ? esc_attr( 'class=current-menu-item' ) : esc_attr( '' ); ?>><a href="<?php echo esc_url( site_url( '/programs' ) ); ?>">
                        <?php
                            esc_html_e(
                                'Programs',
                                'fictional-university-theme'
                            );
                            ?>
                    </a></li>
                    <li><a href="<?php echo esc_url( site_url( '/events' ) ); ?>">
                        <?php
                            esc_html_e(
                                'Events',
                                'fictional-university-theme'
                            );
                            ?>
                    </a></li>
                    <li><a href="<?php echo esc_url( site_url( '/campuses' ) ); ?>">
                        <?php
                            esc_html_e(
                                'Campuses',
                                'fictional-university-theme'
                            );
                            ?>
                    </a></li>
                    <li><a href="<?php echo esc_url( site_url( '/blog' ) ); ?>">
                        <?php
                            esc_html_e(
                                'Blog',
                                'fictional-university-theme'
                            );
                            ?>
                    </a></li>
                    </ul> -->
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">
                        <?php
                            esc_html_e(
                                'Login',
                                'fictional-university-theme'
                            );
                            ?>
                    </a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">
                        <?php
                            esc_html_e(
                                'Sign Up',
                                'fictional-university-theme'
                            );
                            ?>
                    </a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                </div>
            </div>
            </header>
