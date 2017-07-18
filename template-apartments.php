<?php
/*
*   Template Name: Apartments
*/
get_header();
wp_enqueue_script(
                    'google-map-info-box',
                    esc_url_raw( $js_directory_uri . 'infobox.js' ),
                    array( 'google-map-api' ),
                    '1.1.9'
                );
?>


<!-- Page Head -->
 <?php get_template_part("template-parts/separate-slider"); ?>

    <!-- Content -->
    <?php
    

    
        get_template_part("template-parts/grid-listing-4");
   
    ?>
    <!-- End Content -->

<?php get_footer(); ?>