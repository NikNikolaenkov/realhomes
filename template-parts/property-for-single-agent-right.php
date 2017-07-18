<div class="property-item-wrapper">
    <article class="property-item clearfix">





        <div class="detail">
          <div class="boxdetail">
            <div class="boxcontent">
              <h5 class="title"><a href="<?php the_permalink() ?>"><?php
              $tite_min = substr(the_title(), 0, 5);
              echo $tite_min;
                ?></a></h5>
            <h5 class="title">
                <?php
                // price
                property_price();
                ?>
            </h5>
            <?php get_template_part( 'property-details/property-metas-bed' ); ?>

            <a class="more-details" href="<?php the_permalink() ?>"><?php _e('More Details ','framework'); ?></a>
        </div>
        </div>
        </div>
        <figure class="figure_right">
            <a href="<?php the_permalink() ?>">
                <?php
                global $post;
                if( has_post_thumbnail( $post->ID ) ) {
                    the_post_thumbnail( array(830,460) );
                }else{
                    inspiry_image_placeholder( array(830,460) );
                }
                ?>
            </a>

            <!-- <?php display_figcaption( $post->ID ); ?> -->

        </figure>

    </article>
</div>
