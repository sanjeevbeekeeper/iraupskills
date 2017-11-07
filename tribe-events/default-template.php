<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<!-- GUIDE -->
<!-- <small class="page_guide"> root > default-template.php </small> -->

<!-- content wrapping -->
<div class="container ira-upskills_bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/resources/bg.jpg)">


	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
			<div class="brand-logo">
				<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/resources/ira-upskills_logo.png" alt="ira-upskills_logo.jpg"></a>
			</div>

<div id="tribe-events-pg-template" class="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->

<?php
get_footer();
