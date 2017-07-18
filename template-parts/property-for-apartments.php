<article class="property-item clearfix">

    <figure>
        <a href="<?php the_permalink() ?>">
            <?php
            global $post;
            $post_meta_data = get_post_custom($post->ID);
            if( has_post_thumbnail( $post->ID ) ) {
                the_post_thumbnail( 'grid-view-image' );
            } else {
                inspiry_image_placeholder( 'grid-view-image' );
            }
            ?>
        </a>


    </figure>


<div class="meta_box">
    
    <?php
   if( !empty($post_meta_data['REAL_HOMES_property_address'][0]) ) {
                $prop_address = $post_meta_data['REAL_HOMES_property_address'][0];
                $prop_address1 = explode(",", $prop_address);
    $prop_address = explode(" ", $prop_address1[1]);
    }
    if( !empty($post_meta_data['REAL_HOMES_property_price'][0]) ) {
                $prop_price = $post_meta_data['REAL_HOMES_property_price'][0];
                    if( !empty($post_meta_data['REAL_HOMES_property_price'][0]) ){
                        $prop_price_postfix = $post_meta_data['REAL_HOMES_property_price'][0];
                    }
                  $prop_price_postfix = number_format($prop_price_postfix);
    }
    if( !empty($post_meta_data['REAL_HOMES_property_bedrooms'][0]) ) {
                $prop_bedrooms = floatval($post_meta_data['REAL_HOMES_property_bedrooms'][0]);
                $bedrooms_label = ($prop_bedrooms > 1)? __('Bedrooms','framework' ): __('Bedroom','framework');
      
                   
                
    }
       

    if( !empty($post_meta_data['REAL_HOMES_property_bathrooms'][0]) ) {
                $prop_bathrooms = floatval($post_meta_data['REAL_HOMES_property_bathrooms'][0]);
                $bathrooms_label = ($prop_bathrooms > 1)?__('Bathrooms','framework' ): __('Bathroom','framework');     
    }
            echo '<div style="position: relative;float: left;padding-right: 0px;margin: 4px;">';
            include( get_template_directory() . '/images/location.svg' );
            echo '</div><div><span>'.$prop_address1[0].'</span><br>';
            echo '<span>'.$prop_address[2].'</span></div>';
            echo '<div style="float: left;padding: 2;"><span>Rent '.$prop_price_postfix.'</span><br>';
            echo '<span>Beds </span><span>' .$prop_bedrooms.'</span>';
            echo '<span>  Baths </span><span>' .$prop_bathrooms.'</span></div>';

    ?>
    <p> <a class="more-details" href="<?php the_permalink() ?>"><?php _e('More ','framework'); ?></a></p>
    </div>
    <?php
        $compare_properties_module  = get_option( 'theme_compare_properties_module' );
        $inspiry_compare_page       = get_option( 'inspiry_compare_page' );
        if ( ( 'enable' == $compare_properties_module ) && ( $inspiry_compare_page ) ) {
            get_template_part( 'property-details/property-compare' );
        }
    ?>
</article>