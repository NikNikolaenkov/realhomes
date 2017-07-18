<!-- Content -->
<div class="container contents listing-grid-layout">
    <div class="row">
        <div class="span9 main-wrap">

            <!-- Main Content -->
            <div class="main">
                <section class="listing-layout property-grid">

                    <?php


                    // listing view type
                   
                    ?>

                    <div id="br-grey" class="list-container clearfix">
                        <?php
                        get_template_part('template-parts/sort-controls');
                         echo '<div id="listin-grid-50">';
                        $compare_properties_module  = get_option( 'theme_compare_properties_module' );
                        $inspiry_compare_page       = get_option( 'inspiry_compare_page' );
                        if ( ( 'enable' == $compare_properties_module ) && ( $inspiry_compare_page ) ) {
                            get_template_part( 'template-parts/compare-properties' );
                        }

                        $number_of_properties = '4';
                    

                        global $paged;
                        if ( is_front_page()  ) {
                            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        }

                        $property_listing_args = array(
                            'post_type' => 'property',
                            'posts_per_page' => $number_of_properties,
                            'paged' => $paged
                        );

                        // Apply properties filter
                       

                        $property_listing_args = sort_properties( $property_listing_args );

                        $property_listing_query = new WP_Query( $property_listing_args );

                        if ( $property_listing_query->have_posts() ) :
                            $post_count = 0;
                            while ( $property_listing_query->have_posts() ) :
                                $property_listing_query->the_post();

                                // Display Property in grid layout
                                get_template_part('template-parts/property-for-apartments');
                                $post_count++;
                                            if( 0 == ( $post_count % 2 ) ){
                                                echo '<div class="clearfix"></div>';
                                            }

                            endwhile;
                            wp_reset_query();
                        else:
                            ?>
                            <div class="alert-wrapper">
                                <h4><?php _e('Sorry No Results Found', 'framework') ?></h4>
                            </div>
                        <?php
                        endif;
                        ?> 
                        </div><!-- End listin-grid-50 -->
                        <div id="listin-map-50">
                           <?php get_template_part("banners/map_apartments"); ?> 
                        </div>
                        <?php theme_pagination( $property_listing_query->max_num_pages); ?>
                    </div>
                </section>

            </div><!-- End Main Content -->
        </div> <!-- End span9 -->

        <?php get_sidebar('property-listing'); ?>

    </div><!-- End contents row -->
</div><!-- End Content -->