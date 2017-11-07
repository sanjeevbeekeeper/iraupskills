<!-- footer -->
<footer>
    <div class="row">
        <div class="copyright col-lg-6 col-md-6 col-sm-6 col-xs-12">
            &copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All Rights Reserved.
        </div>

        <div class="designed-by col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
            Designed by
            <a href="http://www.beekeeperstudio.com"><img src="<?php bloginfo('template_directory'); ?>/resources/beekeeper_logo.png" alt="Beekeeper_logo.png" title="Beekeeper Design Studio"></a>
        </div>
    </div>
</footer>


<script type="text/javascript">
// var featuredimg = ['.featured-img > div','.featured-image > div'];
// $(featuredimg.join()).removeClass('tribe-events-event-image');
    // $(function(){
        // $(".featured-img > div").removeClass("tribe-events-event-image");
        // });
    // $(function(){
        // $(".featured-image > div").removeClass("tribe-events-event-image");
        // });

        $(function(){
            $(".featured-img > div, .featured-image > div").removeClass("event-manager");
            $(".featured-image > div").removeClass("tribe-events-event-image");
            $("div").removeClass("tribe-events-event-image");
            });
</script>

<?php wp_footer(); ?> <!-- script location -->
</body>
</html>
