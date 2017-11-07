<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>


<!--
* Beekeeper Design Studio
* 31 Aug 2017
* Do not add .row, it is in the meta.php
-->
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="event-meta__organizer">
			<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
				<!-- GUIDE -->
				<!-- <small class="page_guide"> modules > meta > organizer.php > heading </small> -->
				<h3 class="tribe-events-single-section-title">
					<!--
						* Beekeeper Design Studio
						* Note: The text below is changed from 'Organier' to 'Resource Paersons' on request from the client.
						* Changed on 13th Sep 2017
					-->
					Resource Persons
					<?php // echo tribe_get_organizer_label( ! $multiple ); ?>
				</h3>
				<dl>
					<?php
					do_action( 'tribe_events_single_meta_organizer_section_start' );

					foreach ( $organizer_ids as $organizer ) {
						if ( ! $organizer ) {
							continue;
						}

						?>
						<dt style="display:none;"><?php // This element is just to make sure we have a valid HTML ?></dt>
						<dd class="tribe-organizer">
							<!-- GUIDE -->
							<!-- <small class="page_guide"> modules > meta > organizer.php > name </small> -->
							<?php echo tribe_get_organizer_link( $organizer ) ?>
						</dd>
						<?php
					}

					if ( ! $multiple ) { // only show organizer details if there is one
						if ( ! empty( $phone ) ) {
							?>
							<dt>
								<?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?>
							</dt>
							<dd class="tribe-organizer-tel">
								<?php echo esc_html( $phone ); ?>
							</dd>
							<?php
						}//end if

						if ( ! empty( $email ) ) {
							?>
							<dt>
								<!-- GUIDE -->
								<!-- <small class="page_guide"> modules > meta > organizer.php > email label </small> -->
								<?php esc_html_e( 'Email:', 'the-events-calendar' ) ?>
							</dt>
							<dd class="tribe-organizer-email">
								<!-- GUIDE -->
								<!-- <small class="page_guide"> modules > meta > organizer.php > email </small> -->
								<?php echo esc_html( $email ); ?>
							</dd>
							<?php
						}//end if

						if ( ! empty( $website ) ) {
							?>
							<dt>
								<!-- GUIDE -->
								<!-- <small class="page_guide"> modules > meta > organizer.php > website label </small> -->
								<?php esc_html_e( 'Website:', 'the-events-calendar' ) ?>
							</dt>
							<dd class="tribe-organizer-url">
								<!-- GUIDE -->
								<!-- <small class="page_guide"> modules > meta > organizer.php > website </small> -->
								<?php echo $website; ?>
							</dd>
							<?php
						}//end if
					}//end if

					do_action( 'tribe_events_single_meta_organizer_section_end' );
					?>
				</dl>
			</div>
		</div>
	</div>
