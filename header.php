<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @package Evolving Home
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="hdr_top">
        
        <div class="darkb_bg uprhdr">
            <div class="wrp_1320 dflex_c">
                <div class="logontag">
                    <a href="<?php echo home_url(); ?>" class="logo_hdr"><?php
                        if ( has_custom_logo() ):
                            the_custom_logo();
                        else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/logo-evolving-home.svg'?>" alt="<?php echo get_bloginfo( 'name' ); ?>"><?php
                        endif;?>

                        <div><?php

                            $site_description   = get_bloginfo( 'description', 'display' );
                            $site_name          = get_bloginfo( 'name' );

                            // for other post pages
                            if ( !( is_home() ) && ! is_404() ):

                                esc_html_e( 'Evolving', 'EvolvingHome' ); ?><span><?php esc_html_e( 'Home', 'EvolvingHome' ); ?></span><?php

                            else:

                                esc_html_e( 'Evolving', 'EvolvingHome' ); ?><span><?php esc_html_e( 'Home', 'EvolvingHome' ); ?></span><?php

                            endif; ?>

                       </div>

                    </a><?php
                    echo wp_sprintf( '<p class="logo_tagline">%s </p>', __( $site_description ) ); ?>
                </div>

                <a href="javascript:;" id="mobmenubtn" class="mobile_item opendm_">
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                </a>

                <div class="tpmenu desktop_item"><?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    ); ?>
                    
                </div>
            </div>
        </div>
        <!-- Upper Header -->

        <div class="lightb_bg lwrhdr desktop_item">
            <div class="wrp_1320 dflex_c">                
                \
            </div>
        </div>
        <!-- Lower Header -->

        <div id="mobmenu_cont" class="mobile_item" style="display:none;">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                
               /
            ?>
        </div>
        
    </header>
	
	
