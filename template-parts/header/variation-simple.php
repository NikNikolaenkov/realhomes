<?php
/**
 * Header Variation: Simple
 *
 * @since 2.6.2
 */

?>

<header id="header" class="clearfix">

    <div id="header-top" class="clearfix">
        <?php
        /* WPML Language Switcher */
        if ( function_exists( 'icl_get_languages' ) ) {
            $wpml_lang_switcher = get_option( 'theme_wpml_lang_switcher' );
            if ( $wpml_lang_switcher == 'true' ) {
                do_action( 'icl_language_selector' );
            }
        }

        // Currency Switcher
        get_template_part( 'template-parts/header-currency-switcher' );


        // header email
        $header_email = get_option('theme_header_email');
        if ( ! empty( $header_email ) ) {
            ?>
            <h2 id="contact-email">
                <?php
                include( get_template_directory() . '/images/icon-mail.svg' );
                _e( 'Email us at', 'framework' ); ?> :
                <a href="mailto:<?php echo antispambot( $header_email ); ?>"><?php echo antispambot( $header_email ); ?></a>
            </h2>
            <?php
        }
        ?>

        <!-- Social Navigation -->
        <?php get_template_part( 'template-parts/social-nav' ); ?>

        <!-- User Navigation -->
        <?php get_template_part( 'template-parts/user-nav' ); ?>

    </div>

    <!-- Logo -->
    <div id="logo">

        <?php
        $logo_path = get_option('theme_sitelogo');
        if(!empty($logo_path)){
            ?>
            <a title="<?php  bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url( $logo_path ); ?>" alt="<?php  bloginfo( 'name' ); ?>">
            </a>
            <h2 class="logo-heading only-for-print">
                <a href="<?php echo home_url(); ?>"  title="<?php bloginfo( 'name' ); ?>">
                    <?php  bloginfo( 'name' ); ?>
                </a>
            </h2>
            <?php
        }else{
            ?>
            <h2 class="logo-heading">
                <a href="<?php echo home_url(); ?>"  title="<?php bloginfo( 'name' ); ?>">
                    <?php  bloginfo( 'name' ); ?>
                </a>
            </h2>
            <?php
        }

        $description = get_bloginfo ( 'description' );
        if($description){
            echo '<div class="tag-line"><span>';
            echo esc_html( $description );
            echo '</span></div>';
        }
        ?>
    </div>


    <div class="menu-and-contact-wrap">
        <?php
        $header_phone = get_option('theme_header_phone');
        if( !empty($header_phone) ){

		    $desktop_version = '<span class="desktop-version">' . $header_phone . '</span>';
            $mobile_version =  '<a class="mobile-version" href="tel://'.$header_phone.'" title="Make a Call">' .$header_phone. '</a>';

            echo '<h2  class="contact-number "><i class="fa fa-phone"></i>'.  $desktop_version . $mobile_version .  '<span class="outer-strip"></span></h2>';
		}
        ?>

        <!-- Start Main Menu-->
        <nav class="main-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'menu_class' => 'clearfix'
            ));
            ?>
        </nav>
        <!-- End Main Menu -->
    </div>

</header>
