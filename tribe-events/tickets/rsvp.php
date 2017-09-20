<?php
/**
 * This template renders the RSVP ticket form
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/tickets/rsvp.php
 *
 * @version 4.5.2
 *
 * @var bool $must_login
 */

$is_there_any_product         = false;
$is_there_any_product_to_sell = false;
$are_products_available       = false;

ob_start();
$messages = Tribe__Tickets__RSVP::get_instance()->get_messages();
$messages_class = $messages ? 'tribe-rsvp-message-display' : '';
$now = current_time( 'timestamp' );
?>

<form id="rsvp-now" action="" class="tribe-tickets-rsvp cart <?php echo esc_attr( $messages_class ); ?>" method="post" enctype='multipart/form-data'>

	<div class="event--ticket">

		<!-- NOTIFICATION MESSAGES CONTAINER -->
		<div class="tribe-rsvp-messages">
			<!-- NOTIFICATION MESSAGE 1 -->
			<?php
			if ( $messages ) {
				foreach ( $messages as $message ) {
				?>
				<!-- NOTIFICATION MESSAGE 1 -->
				<!-- <small class="page_guide"> tickets > tickets > rsvp.php > notification message 1 (to see the message, click the confirm rsvp) </small> -->
				<div class="tribe-rsvp-message tribe-rsvp-message-<?php echo esc_attr( $message->type ); ?>">
					<?php echo esc_html( $message->message ); ?>
				</div>
			<?php
				}//end foreach
			}//end if
			?>
			<!-- end NOTIFICATION MESSAGE 1 -->

			<!-- NOTIFICATION MESSAGE 2 -->
			<div class="alert alert-danger tribe-rsvp-message-confirmation-error" style="display:none;">
				<?php esc_html_e( 'Select the seat and Please fill in the RSVP confirmation name and email fields.', 'event-tickets' ); ?>
			</div>
		</div> <!-- tribe-rsvp-messages -->
		<!-- end NOTIFICATION MESSAGE 2 -->


		<div class="tribe-events-tickets-rsvp">
			<div class="row">
				<div class="col-sm-5 col-xs-12">

					<!-- <div class="tribe-events-tickets tribe-events-tickets-rsvp"> -->
						<?php foreach ( $tickets as $ticket ) {
							// if the ticket isn't an RSVP ticket, then let's skip it
							if ( 'Tribe__Tickets__RSVP' !== $ticket->provider_class ) {
								continue;
								}
							if ( ! $ticket->date_in_range( $now ) ) {
								continue;
								}
						$is_there_any_product = true;
						$is_there_any_product_to_sell = $ticket->is_in_stock();
						?>

						<div class="tribe-ticket quantity" data-product-id="<?php echo esc_attr( $ticket->ID ); ?>">
							<!-- Input field -->
							<input type="hidden" name="product_id[]" value="<?php echo absint( $ticket->ID ); ?>">

							<?php if ( $is_there_any_product_to_sell ) : ?>
								<input type="number" class="tribe-ticket-quantity" min="0" max="<?php echo esc_attr( $ticket->remaining() ); ?>" name="quantity_<?php echo absint( $ticket->ID ); ?>"
								value="0" <?php disabled( $must_login ); ?>>

							<?php if ( $ticket->managing_stock() ) : ?>
							<!-- Stock count -->
							<div>
								<span class="tribe-tickets-remaining">
									<?php echo sprintf( esc_html__( '%1$s out of %2$s available', 'event-tickets' ), $ticket->remaining(), $ticket->original_stock() ); ?>
								</span>
							</div>
							<?php endif; ?>

							<?php else: ?>
							<!-- Out of stock count -->
							<div class="label label-warning tickets_nostock">
								<!-- <span class="label label-warning"> -->
									<?php esc_html_e( 'Out of stock!', 'event-tickets' ); ?>
								<!-- </span> -->
							</div>
							<?php endif; ?>
						</div> <!-- //.tribe-ticket -->
					</div> <!-- //.tribe-ticket -->
				<!-- </div> <!-- //.col -->
				<!-- ticket name -->
				<div class="col-sm-7 col-xs-12 text-left">
					<div class="tickets_name">
						<!-- ticket name -->
						<h3>
							<?php echo esc_html( $ticket->name ); ?>
						</h3>
					</div>
				</div> <!-- //.row closing -->
			</div> <!-- //.row closing -->


			<?php
				/**
				 * Allows injection of HTML after an RSVP ticket table row
				 *
				 * @var Event ID
				 * @var Tribe__Tickets__Ticket_Object
				 */
				do_action( 'event_tickets_rsvp_after_ticket_row', tribe_events_get_ticket_event( $ticket->id ), $ticket );
				} // foreach
			?>

			<?php if ( $is_there_any_product_to_sell ) : ?>
			<div class="tribe-tickets-meta-row">
				<div class="tribe-tickets-attendees">
					<!-- title -->
					<header>
							<?php esc_html_e( 'Send RSVP confirmation to:', 'event-tickets' ); ?>
					</header>
					<?php
					/**
					 * Allows injection of HTML before RSVP ticket confirmation fields
					 *
					 * @var array of Tribe__Tickets__Ticket_Object
					 */
					do_action( 'event_tickets_rsvp_before_confirmation_fields', $tickets );
					?>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="tribe-tickets-full-name-row">
									<!-- namefield label -->
									<label for="tribe-tickets-full-name">
										<?php esc_html_e( 'Full Name', 'event-tickets' ); ?>:
									</label>
									<!-- namefield -->
									<input class="form-control" type="text" name="attendee[full_name]" id="tribe-tickets-full-name">
								</div> <!-- //.tribe-tickets-full-name-row -->
							</div> <!-- //.form-group -->

							<div class="form-group">
								<div class="tribe-tickets-email-row">
									<!-- email label -->
									<label for="tribe-tickets-email">
										<?php esc_html_e( 'Email', 'event-tickets' ); ?>:
									</label>
									<!-- email -->
									<input class="form-control" type="email" name="attendee[email]" id="tribe-tickets-email">
								</div> <!-- //.tribe-tickets-email-row -->
							</div> <!-- //.form-group -->

							<div class="tribe-tickets-order_status-row">
								<!-- rsvp status label -->
								<label for="tribe-tickets-order_status">
									<?php echo esc_html_x( 'RSVP', 'order status label', 'event-tickets' ); ?>:
								</label>
								<!-- rsvp status dropdown -->
								<?php Tribe__Tickets__Tickets_View::instance()->render_rsvp_selector( 'attendee[order_status]', '' ); ?>
							</div> <!-- //.tribe-tickets-order_status-row -->

							<?php
							/**
							 * Use this filter to hide the Attendees List Optout
							 *
							 * @since 4.5.2
							 *
							 * @param bool
							 */
							$hide_attendee_list_optout = apply_filters( 'tribe_tickets_hide_attendees_list_optout', false );
							if ( ! $hide_attendee_list_optout
								 && class_exists( 'Tribe__Tickets_Plus__Attendees_List' )
								 && ! Tribe__Tickets_Plus__Attendees_List::is_hidden_on( get_the_ID() )
								 ) : ?>
							<div class="tribe-tickets-attendees-list-optout">
								<input type="checkbox" name="attendee[optout]" id="tribe-tickets-attendees-list-optout">
								<label for="tribe-tickets-attendees-list-optout">
									<?php esc_html_e( 'Don\'t list me on the public attendee list', 'event-tickets' ); ?>
								</label>
							</div> <!-- //.tribe-tickets-attendees-list-optout -->
							<?php endif; ?>
						</div> <!-- //.col -->
					</div> <!-- //.row -->







				</div> <!-- //.tribe-tickets-attendees -->
			</div> <!-- //.tribe-tickets-meta-row -->

		</div> <!-- //.tribe-events-tickets tribe-events-tickets-rsvp -->
	</div> <!-- //.tribe-events-tickets tribe-events-tickets-rsvp -->

		<div class="event--ticket__rsvp">
			<div colspan="4" class="add-to-cart">
				<?php if ( $must_login ) : ?>
					<!-- login to rsvp -->
					<a href="<?php echo esc_url( Tribe__Tickets__Tickets::get_login_url() ); ?>">
						<?php esc_html_e( 'Login to RSVP', 'event-tickets' );?>
					</a>
				<?php else: ?>
					<!-- Confirm rsvp btn -->
					<button type="submit" name="tickets_process" value="1" class="btn btn-success">
						<?php esc_html_e( 'Confirm RSVP', 'event-tickets' );?>
					</button>
				<?php endif; ?>
			</div> <!-- //.add-to-cart -->

			<?php endif; ?>
			<noscript>
			<div class="alert alert-info tribe-link-tickets-message">
				<div class="no-javascript-msg"><?php esc_html_e( 'You must have JavaScript activated to purchase tickets. Please enable JavaScript in your browser.', 'event-tickets' ); ?></div>
			</div> <!-- //.tribe-link-tickets-message -->
			</noscript>
		</div> <!-- //.event-ticket__rsvp -->

</form>











<?php
$content = ob_get_clean();
if ( $is_there_any_product ) {
	echo $content;

	// If we have rendered tickets there is generally no need to display a 'tickets unavailable' message
	// for this post
	$this->do_not_show_tickets_unavailable_message();
} else {
	// Indicate that we did not render any tickets, so a 'tickets unavailable' message may be
	// appropriate (depending on whether other ticket providers are active and have a similar
	// result)
	$this->maybe_show_tickets_unavailable_message( $tickets );
}
?>
