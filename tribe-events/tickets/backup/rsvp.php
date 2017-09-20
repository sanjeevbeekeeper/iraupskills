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

<!-- GUIDE -->
<small class="page_guide"> tickets > tickets > rsvp.php </small>
<!-- GUIDE -->



<form id="rsvp-now" action="" class="tribe-tickets-rsvp cart <?php echo esc_attr( $messages_class ); ?>" method="post" enctype='multipart/form-data'>

	<!-- GUIDE: ticket heading -->
	<small class="page_guide"> tickets > tickets > rsvp.php > ticket heading </small>
	<h2 class="tribe-events-tickets-title tribe--rsvp">
		<?php // echo esc_html_x( 'RSVP', 'form heading', 'event-tickets' ) ?>
	</h2>

	<!-- NOTIFICATION MESSAGES CONTAINER -->
	<div class="tribe-rsvp-messages">
		<!-- NOTIFICATION MESSAGE 1 -->
		<?php
		if ( $messages ) {
			foreach ( $messages as $message ) {
			?>
			<!-- GUIDE -->
			<small class="page_guide"> tickets > tickets > rsvp.php > notification message 1 (to see the message, click the confirm rsvp) </small>
			<div class="alert alert-danger tribe-rsvp-message tribe-rsvp-message-<?php echo esc_attr( $message->type ); ?>">
				<?php echo esc_html( $message->message ); ?>
			</div>
		<?php
			}//end foreach
		}//end if
		?>
		<!-- end NOTIFICATION MESSAGE 1 -->

		<!-- NOTIFICATION MESSAGE 2 -->
		<!-- GUIDE -->
		<small class="page_guide"> tickets > tickets > rsvp.php > notification message 2 (select the ticket quantity and click confirm rsvp) </small>
		<!-- <div class="alert alert-danger tribe-rsvp-message tribe-rsvp-message-error tribe-rsvp-message-confirmation-error" style="display:none;"> -->
		<div class="alert alert-danger tribe-rsvp-message-confirmation-error" style="display:none;">
			<?php esc_html_e( 'Please fill in the RSVP confirmation name and email fields.', 'event-tickets' ); ?>
		</div>
		<!-- end NOTIFICATION MESSAGE 1 -->
	</div>
	<!-- end NOTIFICATION MESSAGES CONTAINER -->


	<div class="bor1"> <!-- ticket container -->
	<!-- <table class="table-bordered tribe-events-tickets tribe-events-tickets-rsvp"> -->
	<div class="table-bordered tribe-events-tickets tribe-events-tickets-rsvp">
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

			<!-- <tr> -->
			<!-- <div> -->
				<!-- <td class="tribe-ticket quantity" data-product-id="<?php echo esc_attr( $ticket->ID ); ?>"> -->
				<div class="tribe-ticket quantity" data-product-id="<?php echo esc_attr( $ticket->ID ); ?>">
					<!-- GUIDE -->
					<small class="page_guide"> tickets > tickets > rsvp.php > input field </small>
					<input type="hidden" name="product_id[]" value="<?php echo absint( $ticket->ID ); ?>">

					<?php if ( $is_there_any_product_to_sell ) : ?>
						<input type="number" class="tribe-ticket-quantity" min="0" max="<?php echo esc_attr( $ticket->remaining() ); ?>" name="quantity_<?php echo absint( $ticket->ID ); ?>"
						value="0" <?php disabled( $must_login ); ?>>
						<?php if ( $ticket->managing_stock() ) : ?>

						<!-- GUIDE -->
						<small class="page_guide"> tickets > tickets > rsvp.php > stock count </small>
						<span class="tribe-tickets-remaining">
							<?php echo sprintf( esc_html__( '%1$s out of %2$s available', 'event-tickets' ), $ticket->remaining(), $ticket->original_stock() ); ?>
						</span>
					<?php endif; ?>

					<?php else: ?>
					<!-- GUIDE -->
					<small class="page_guide"> tickets > tickets > rsvp.php > out of stock count </small>
					<span class="tickets_nostock"><?php esc_html_e( 'Out of stock!', 'event-tickets' ); ?></span>
					<?php endif; ?>
				<!-- </td> -->
				</div>

				<!-- <td class="tickets_name"> -->
				<div class="tickets_name">
					<!-- GUIDE -->
					<small class="page_guide"> tickets > tickets > rsvp.php > ticket name </small>
					<?php echo esc_html( $ticket->name ); ?>
					<!-- </td> -->
				</div>
				<!-- <td class="tickets_description" colspan="2"> -->
				<!-- <div class="tickets_description" colspan="2"> -->
				<!-- GUIDE -->
				<!-- <small class="page_guide"> tickets > tickets > rsvp.php > ticket description </small> -->
				<?php // echo esc_html( $ticket->description ); ?>
				<!-- </td> -->
				<!-- </div> -->
				<!-- </tr> -->
			<!-- </div> -->
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
			<!-- <tr class="tribe-tickets-meta-row"> -->
			<div class="tribe-tickets-meta-row">
				<!-- <td colspan="4" class="tribe-tickets-attendees"> -->
				<div colspan="4" class="tribe-tickets-attendees">
					<!-- GUIDE -->
					<small class="page_guide"> tickets > tickets > rsvp.php > title </small>
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
					<!-- <table class="tribe-tickets-table"> -->
					<div class="tribe-tickets-table">

						<!-- <tr class="tribe-tickets-full-name-row"> -->
						<div class="tribe-tickets-full-name-row">
							<!-- <td> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > namefield label </small>
								<label for="tribe-tickets-full-name">
									<?php esc_html_e( 'Full Name', 'event-tickets' ); ?>:
								</label>
							<!-- </td> -->
							<!-- </div> -->
							<!-- <td colspan="3"> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > namefield </small>
								<input type="text" name="attendee[full_name]" id="tribe-tickets-full-name">
								<!-- </td> -->
							<!-- </div> -->
						<!-- </tr> -->
						</div> <!-- //.tribe-tickets-full-name-row -->

						<!-- <tr class="tribe-tickets-email-row"> -->
						<div class="tribe-tickets-email-row">
							<!-- <td> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > email label </small>
								<label for="tribe-tickets-email">
									<?php esc_html_e( 'Email', 'event-tickets' ); ?>:
								</label>
							<!-- </td> -->
							<!-- </div> -->
							<!-- <td colspan="3"> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > email </small>
								<input type="email" name="attendee[email]" id="tribe-tickets-email">
							<!-- </td> -->
							<!-- </div> -->
						<!-- </tr> -->
						</div> <!-- //.tribe-tickets-email-row -->

						<!-- <tr class="tribe-tickets-order_status-row"> -->
						<div class="tribe-tickets-order_status-row">
							<!-- <td> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > rsvp status label </small>
								<label for="tribe-tickets-order_status">
									<?php echo esc_html_x( 'RSVP', 'order status label', 'event-tickets' ); ?>:
								</label>
							<!-- </td> -->
							<!-- </div> -->
							<!-- <td colspan="3"> -->
							<!-- <div> -->
								<!-- GUIDE -->
								<small class="page_guide"> tickets > tickets > rsvp.php > rsvp status dropdown </small>
								<?php Tribe__Tickets__Tickets_View::instance()->render_rsvp_selector( 'attendee[order_status]', '' ); ?>
							<!-- </td> -->
							<!-- </div> -->
						<!-- </tr> -->
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
						<!-- <tr class="tribe-tickets-attendees-list-optout"> -->
						<div class="tribe-tickets-attendees-list-optout">
							<!-- <td colspan="4"> -->
							<!-- <div> -->
								<input type="checkbox" name="attendee[optout]" id="tribe-tickets-attendees-list-optout">
								<label for="tribe-tickets-attendees-list-optout">
									<?php esc_html_e( 'Don\'t list me on the public attendee list', 'event-tickets' ); ?>
								</label>
							<!-- </td> -->
							<!-- </div> -->
						<!-- </tr> -->
						</div> <!-- //.tribe-tickets-attendees-list-optout -->

						<?php endif; ?>
					<!-- </table> -->
					</div> <!-- //.tribe-tickets-table -->
				<!-- </td> -->
				</div> <!-- //.tribe-tickets-attendees -->
			<!-- </tr> -->
			</div> <!-- //.tribe-tickets-meta-row -->

			<!-- <tr> -->
			<div>
				<!-- <td colspan="4" class="add-to-cart"> -->
				<div colspan="4" class="add-to-cart">
					<?php if ( $must_login ) : ?>
						<!-- GUIDE -->
						<small class="page_guide"> tickets > tickets > rsvp.php > login to rsvp </small>
						<a href="<?php echo esc_url( Tribe__Tickets__Tickets::get_login_url() ); ?>">
							<?php esc_html_e( 'Login to RSVP', 'event-tickets' );?>
						</a>
					<?php else: ?>
						<!-- GUIDE -->
						<small class="page_guide"> tickets > tickets > rsvp.php > Confirm rsvp btn </small>
						<button type="submit" name="tickets_process" value="1" class="tribe-button tribe-button--rsvp"
						>
							<?php esc_html_e( 'Confirm RSVP', 'event-tickets' );?>
						</button>
					<?php endif; ?>
				<!-- </td> -->
				</div> <!-- //.add-to-cart -->
			<!-- </tr> -->
			</div>
			<?php endif; ?>
			<noscript>
				<!-- <tr> -->
				<div>
					<!-- <td class="tribe-link-tickets-message"> -->
					<div class="tribe-link-tickets-message">
						<div class="no-javascript-msg"><?php esc_html_e( 'You must have JavaScript activated to purchase tickets. Please enable JavaScript in your browser.', 'event-tickets' ); ?></div>
					<!-- </td> -->
					</div> <!-- //.tribe-link-tickets-message -->
				<!-- </tr> -->
				</div>
			</noscript>
		<!-- </table> -->
		</div>
	</div> <!-- end bor1 -->

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
