<?php
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @version 4.5.6
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

?>

<!-- GUIDE -->
<!-- <small class="page_guide"> day > single-event.php </small> -->

	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>

<div class="event--container-home">
	<!-- featured img -->
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="featured-image">
				<?php echo tribe_event_featured_image( null, 'full' ); ?>
			</div>
		</div>

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="event--container-home__content">

				<!-- event title -->
				<div class="event--title">
					<div class="row">
						<!-- <div class="col-sm-2 col-sm-push-10 col-xs-3"> -->
						<div class="col-xs-12">
							<div class="event--title__date">
								<?php echo tribe_events_event_schedule_details() ?>
								<?php do_action( 'tribe_events_after_the_event_title' ) ?>
							</div> <!-- //.event-title__date -->
						</div> <!-- //.col -->
						<div class="col-xs-12">
							<h3>
								<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
									<?php //the_title() ?>
								</a>
								<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
									<?php the_title() ?>
								</a>
							</h3>
							<div class="event--organizer">
								<?php echo tribe_get_organizer(); ?>
							</div> <!-- //.event-organizer -->
						</div> <!-- //.col -->
					</div> <!-- //.row -->
				</div> <!-- //.event-title -->

				<!-- Event Content -->
				<?php do_action( 'tribe_events_before_the_content' ) ?>

				<!-- event description -->
				<div class="event--description">

					<!-- Excerpt with limit -->
					<?php
						$excerpt = tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) );
						$excerpt = substr( $excerpt , 0, 230);
						echo $excerpt;
					?>

					<!-- Excerpt ... after the paragraph -->
					<!-- <span class="excerpt-dot"></span> -->

					<!-- Find out more link -->
					<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark">
						<?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;
					</a>
				</div> <!-- //.event-description -->
				<?php
					do_action( 'tribe_events_after_the_content' );
				?>
				<!-- event ticket -->
				<!-- <div class="event-ticket"> -->
					<!-- <a href="<?php //echo esc_url( tribe_get_event_link() ); ?>/#rsvptitle" class="btn btn-success">Confirm RSVP</a> -->
				<!-- </div> <!- //.event-ticket -->

			</div> <!-- //.event-container-home__content -->
		</div> <!-- //.col -->
	</div> <!-- //.row -->

</div> <!-- //.event-container-home -->




		<!-- <small class="page_guide"> day > single-event.php > title </small> -->
		<!-- <h2 class="tribe-events-list-event-title summary"> -->
			<!-- <a class="url" href="<?php //echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark"> -->
				<?php //the_title() ?>
			<!-- </a> -->
		<!-- </h2> -->
		<?php //do_action( 'tribe_events_after_the_event_title' ) ?>

		<!-- Event Meta -->
		<?php //do_action( 'tribe_events_before_the_meta' ) ?>
			<!-- <div class="tribe-events-event-meta <?php //echo esc_attr( $has_venue . $has_venue_address ); ?>"> -->

				<!-- Schedule & Recurrence Details -->
				<!-- <small class="page_guide"> day > single-event.php > date </small> -->
				<!-- <div class="tribe-updated published time-details"> -->
					<?php //echo tribe_events_event_schedule_details(); ?>
				<!-- </div> -->

				<?php //if ( $venue_details ) : ?>
				<!-- Venue Display Info -->
				<!-- <small class="page_guide"> day > single-event.php > address </small> -->
				<!-- <div class="tribe-events-venue-details"> -->
					<?php //echo implode( ', ', $venue_details ); ?>
				<!-- </div> <!- .tribe-events-venue-details -->
				<?php //endif; ?>

			<!-- </div><!- .tribe-events-event-meta -->

		<?php //if ( tribe_get_cost() ) : ?>
		<!-- <div class="tribe-events-event-cost"> -->
			<!-- <span class="ticket-cost"><?php //echo tribe_get_cost( null, true ); ?></span> -->
			<?php
			/** This action is documented in the-events-calendar/src/views/list/single-event.php */
			// do_action( 'tribe_events_inside_cost' )
			?>
		<!-- </div> -->
		<?php //endif; ?>

		<?php //do_action( 'tribe_events_after_the_meta' ) ?>

		<!-- Event Image -->
		<!-- <small class="page_guide"> day > single-event.php > image </small> -->
		<!-- <?php // echo tribe_event_featured_image( null, 'medium' ); ?> -->

		<!-- Event Content -->
		<?php //do_action( 'tribe_events_before_the_content' ) ?>
		<!-- <small class="page_guide"> day > single-event.php > description </small> -->
		<!-- <div class="tribe-events-list-event-description tribe-events-content description entry-summary"> -->
			<?php //echo tribe_events_get_the_excerpt(); ?>
			<!-- <a href="<?php //echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"> -->
				<!-- <?php //esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo; -->
			<!-- </a> -->
		<!-- </div><!- .tribe-events-list-event-description -->
		<?php
			//do_action( 'tribe_events_after_the_content' );
		?>
