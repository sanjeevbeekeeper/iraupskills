<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.5.6
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();
?>

<!-- GUIDE -->
<!-- <small class="page_guide"> list > single-event.php </small> -->

<!-- Event Title -->
<?php // do_action( 'tribe_events_before_the_event_title' ) ?>

	<!-- event container -->
	<div class="event--container-home">
		<!-- featured img -->
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="featured-image">
					<?php echo tribe_event_featured_image( null, 'full' ); ?>
				</div>
			</div>

			<!-- right content -->
			<!-- <div class="col-xs-12"> -->
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<!-- event container content -->
				<div class="event--container-home__content">
					<!-- event title -->
					<div class="event--title">
						<div class="row">
							<!-- <div class="col-sm-2 col-sm-push-10 col-xs-3"> -->
							<div class="col-xs-12">
								<div class="event--title__date">
									<?php do_action( 'tribe_events_before_the_meta' ) ?>
									<?php echo tribe_events_event_schedule_details() ?>
								</div> <!-- //.event-title__date -->
							</div> <!-- //.col -->
							<div class="col-lg-12 col-xs-10">
								<h3>
									<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
										<?php the_title() ?>
									</a>
									<?php do_action( 'tribe_events_after_the_event_title' ) ?>
								</h3>
								<div class="event--organizer">
									<?php echo tribe_get_organizer(); ?>
								</div> <!-- //.event-organizer -->
							</div> <!-- //.col -->
						</div> <!-- //.row -->
					</div> <!-- //.event-title -->

					<!-- event description -->
					<div class="event--description">
							<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
						<!-- Excerpt with limit -->
						<?php
							$excerpt = tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) );
							$excerpt = substr( $excerpt , 0, 230);
							echo $excerpt;
						?>
						<?php //echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>

						<!-- Excerpt ... after the paragraph -->
						<!-- <span class="excerpt-dot"></span> -->

						<!-- Find out more link -->
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a>
					</div> <!-- //.event-description -->

					<!-- event ticket -->
					<!-- <div class="event--ticket"> -->
						<!-- <a href="<?php //echo esc_url( tribe_get_event_link() ); ?>/#rsvptitle" class="btn btn-success">Confirm RSVP</a> -->
					<!-- </div> <!-- //.event-ticket -->

				</div> <!-- //.event-container-home__content -->
			</div> <!-- right content -->
		</div> <!-- //.row -->


		<?php //echo tribe_event_featured_image( null, 'large' ); ?>
			<!-- GUIDE -->
			<!-- <small class="page_guide"> list > single-event.php > title</small> -->
			<!-- <h2 class="tribe-events-list-event-title"> -->
				<!-- <a class="tribe-event-url" href="<?php //echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark"> -->
					<?php //the_title() ?>
				<!-- </a> -->
			<!-- </h2> -->

			<?php //do_action( 'tribe_events_after_the_event_title' ) ?>

			<!-- Event Meta -->
			<?php //do_action( 'tribe_events_before_the_meta' ) ?>
			<!-- <div class="tribe-events-event-meta"> -->

				<!-- GUIDE -->
				<!-- <small class="page_guide"> list > single-event.php > date </small> -->
				<!-- Schedule & Recurrence Details -->
				<!-- <div class="tribe-event-schedule-details"> -->
					<?php //echo tribe_events_event_schedule_details() ?>
				<!-- </div> -->

				<!-- GUIDE: Organized by -->
				<!-- <small class="page_guide"> list > single-event.php > organized by </small> -->
				<!-- GUIDE -->
				<!-- <p>Organized by: <?php //echo tribe_get_organizer(); ?></p> -->
			<!-- </div> <!-- //.tribe-events-event-meta -->

			<!-- GUIDE: Featured image -->
			<!-- <small class="page_guide"> list > single-event.php > Featured image </small> -->
			<!-- Event Image -->
			<?php //echo tribe_event_featured_image( null, 'medium' ); ?>

			<!-- GUIDE: Description -->
			<!-- <small class="page_guide"> list > single-event.php > Description </small> -->
			<?php //echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>

			<!-- GUIDE: More link -->
			<!-- <small class="page_guide"> list > single-event.php > More link </small> -->
			<!-- GUIDE -->
			<!-- <a href="<?php //echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php //esc_html_e( 'Find out more', 'the-events-calendar' ) ?> &raquo;</a> -->

	</div> <!-- //.event-container-home -->
<?php
do_action( 'tribe_events_after_the_content' );
