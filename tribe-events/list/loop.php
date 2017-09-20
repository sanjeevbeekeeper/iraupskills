<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>


<!-- GUIDE -->
<!-- <small class="page_guide"> list > loop.php </small> -->

<?php
global $post;
global $more;
$more = false;
?>

<div class="ribe-events-loop">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Month / Year Headers -->
	    <table class="date--header">
	        <tr>
	            <td nowrap>
	                <h2>
						<?php tribe_events_list_the_date_headers(); ?>
	                    <!-- July, 2017 -->
	                </h2>
	            </td>
	            <td class="line">
	                <!-- line -->
	            </td>
	        </tr>
	    </table>

		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>

		<div id="post-<?php the_ID() ?>" class="<?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
			<?php

				$event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';
				/**
			 	* Filters the event type used when selecting a template to render
			 	*
			 	* @param $event_type
			 	*/
				$event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );
				tribe_get_template_part( 'list/single', $event_type );
			?>
		</div>

		<!-- <?php the_meta(); ?> -->
		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>
</div><!-- .tribe-events-loop -->
