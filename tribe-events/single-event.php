<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<!-- <small class="page_guide"> root > single-event.php </small> -->
	<div id="tribe-events-content" class="tribe-events-single">

		<!-- Back btn - All Events -->
		<p class="tribe-events-back">
			<a class="btn btn-default" href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</p>

		<!-- Notices -->
		<?php tribe_the_notices() ?>


		<!-- event container -->
		<div class="event--container-single">

			<?php while ( have_posts() ) :  the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Event featured image, but exclude link -->
				<div class="featured-img">
					<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				</div>

				<div class="event--container-single__content">
					<!-- Event title -->
	        		<div class="event--title">
	                	<div class="event--title__date">
							<?php echo tribe_events_event_schedule_details( $event_id ); ?>
	                    </div>
						<?php the_title( '<h3 class="tribe-events-single-event-title">', '</h3>' ); ?>
						<!-- Event organizer -->
	                    <div class="event--organizer">
							<?php echo tribe_get_organizer(); ?>
	                    </div>
	        		</div> <!-- //.event-title-->

					<!-- event description -->
			        <div class="event--description">
						<!-- <div class="tribe-events-single-event-description tribe-events-content"> -->
							<?php the_content(); ?>
						<!-- </div> -->

						<!-- cost display -->
						<div class="event--meta"><?php the_meta(); ?></div>

						<!-- Google cal and iCal buttons -->
						<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
					</div> <!-- //.event-description -->

					<!-- Event Ticket section (see tickets > rsvp.php) -->
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>

				</div><!-- //.event-container-single__content -->
			</div> <!-- //.id="post-<?php the_ID(); ?>" <?php post_class(); ?> -->
		</div> <!-- //.event-container-single -->




		<div class="ticket--notification_message">
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
			<?php endwhile; ?>
		</div>




		<!-- modules/meta.php -->
		<div class="event--details__container">
			<?php tribe_get_template_part( 'modules/meta' ); ?>
		</div> <!-- //.event-details__container -->





		<?php // do_action( 'tribe_events_single_event_after_the_meta' ) ?>

		<?php //if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
		<?php //endwhile; ?>





		<!-- Event footer -->
		<div id="tribe-events-footer">
			<!-- Navigation -->
			<h3 class="tribe-events-visuallyhidden">
				<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>
			</h3>

			<!-- pagination -->
			<!-- <small class="page_guide"> root > single-event.php > pagination </small> -->
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous">
					<?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?>
				</li>
				<li class="tribe-events-nav-next">
					<?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?>
				</li>
			</ul> <!-- //.tribe-events-sub-nav -->
		</div> <!-- //.tribe-events-footer -->

	</div><!-- //.tribe-events-single -->
