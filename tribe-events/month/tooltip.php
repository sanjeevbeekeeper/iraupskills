<?php
/**
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/month/tooltip.php
 * @version 4.4
 */
?>

<!-- GUIDE -->
<!-- <small class="page_guide"> month > tooltip.php </small> -->

	<script type="text/html" id="tribe_tmpl_tooltip">
		<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">

			<!-- tooltip event title -->
			<h4 class="entry-title summary">
				[[=raw title]]
			</h4>


			<div class="tribe-events-event-body">
				<!-- tooltip event date -->
				<div class="tribe-event-duration">
					<abbr class="tribe-events-abbr tribe-event-date-start">
						[[=dateDisplay]]
					</abbr>
				</div>
				[[ if(imageTooltipSrc.length) { ]]
				<!-- tooltip event image -->
				<!-- <div class="tribe-events-event-thumb"> -->
					<!-- <img src="[[=imageTooltipSrc]]" alt="[[=title]]" /> -->
				<!-- </div> -->
				[[ } ]]
				[[ if(excerpt.length) { ]]
				<!-- tooltip event excerpt -->
				<div class="tribe-event-description">[[=raw excerpt]]</div>
				[[ } ]]
				<span class="tribe-events-arrow"></span>
			</div>
		</div>
	</script>

<script type="text/html" id="tribe_tmpl_tooltip_featured">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tribe-event-featured">
		[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" />
			</div>
		[[ } ]]

		<h4 class="entry-title summary">[[=raw title]]</h4>

		<div class="tribe-events-event-body">
			<div class="tribe-event-duration">
				<abbr class="tribe-events-abbr tribe-event-date-start">[[=dateDisplay]] </abbr>
			</div>

			[[ if(excerpt.length) { ]]
			<div class="tribe-event-description">[[=raw excerpt]]</div>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>
