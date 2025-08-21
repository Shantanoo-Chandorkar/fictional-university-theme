<?php
/**
 * Template part for displaying events on the homepage.
 *
 * @package Fictional_University
 */

?>

<div class="event-summary">
    <a class="event-summary__date t-center" href="<?php echo esc_url( get_the_permalink() ); ?>">
        <span class="event-summary__month">
        <?php
        $event_date = new DateTime( get_field( 'event_date' ) );
        if ( $event_date ) {
            echo esc_html( $event_date->format( 'M' ) );
        } else {
            echo esc_html( get_the_time( 'M' ) );
        }
        ?>
        </span>
        <span class="event-summary__day">
        <?php
        $event_date = new DateTime( get_field( 'event_date' ) );
        if ( $event_date ) {
            echo esc_html( $event_date->format( 'd' ) );
        } else {
            echo esc_html( get_the_time( 'd' ) );
        }
        ?>
        </span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
        <p><?php echo esc_html( wp_trim_words( get_the_content(), 18 ) ); ?></p>
    </div>
</div>