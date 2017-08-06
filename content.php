<!--
Page: content.php
Created on: 12th Jul 2017
Author: Beekeeper Design Studio
-->

<!-- LOOP -->
<?php if (have_posts()) :
    while (have_posts()) : the_post();
    ?>

    <!-- see the tribe-events folder for more customization-->
    <?php the_content(); ?>

    <?php endwhile; else : ?>
    <p class="text-center alert alert-warning">
        <?php _e( 'Sorry, no posts matches your criteria.' ); ?>
    </p>
    <br>
<?php endif; ?>
