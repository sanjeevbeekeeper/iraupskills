<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
	}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();
?>


<!--
* Beekeeper Design Studio
* 31 Aug 2017
* Do not add .row, it is in the meta.php
-->
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

		<div class="event-meta__venue">
			<div class="tribe-events-meta-group tribe-events-meta-group-venue">
				<h3 class="tribe-events-single-section-title">
					<?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?>
				</h3>
				<dl>
					<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

					<!-- GUIDE -->
					<!-- <small class="page_guide"> modules > meta > venue.php > Venue name</small> -->
					<dd class="tribe-venue">
						<?php echo tribe_get_venue() ?>
					</dd>

					<?php if ( tribe_address_exists() ) : ?>

						<!-- GUIDE -->
						<!-- <small class="page_guide"> modules > meta > venue.php > Venue address (also check address.php for more details)</small> -->
						<dd class="tribe-venue-location">
							<address class="tribe-events-address">
								<?php echo tribe_get_full_address(); ?>

								<?php if ( tribe_show_google_map_link() ) : ?>
									<?php echo tribe_get_map_link_html(); ?>
								<?php endif; ?>

							</address>
						</dd>
					<?php endif; ?>

					<?php if ( ! empty( $phone ) ): ?>

						<!-- GUIDE -->
						<!-- <small class="page_guide"> modules > meta > venue.php > phone no.</small> -->
						<dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
						<dd class="tribe-venue-tel"> <?php echo $phone ?> </dd>
					<?php endif ?>

					<?php if ( ! empty( $website ) ): ?>

						<!-- GUIDE -->
						<!-- <small class="page_guide"> modules > meta > venue.php > website</small> -->
						<dt> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
						<dd class="url"> <?php echo $website ?> </dd>
					<?php endif ?>

					<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
				</dl>
			</div> <!-- //.tribe-events-meta-group tribe-events-meta-group-venue --></div>

	</div> <!-- //.col -->
